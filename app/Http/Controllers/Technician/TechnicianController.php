<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use App\Models\TechnicianProfile;
use App\Models\BookingStatus;
use App\Helpers\BookingStatusHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class TechnicianController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $technician = TechnicianProfile::where('user_id', $user->id)->first();
        
        // Get all reviews for this technician from bookings where technician_id matches
        // Since reviews only have booking_id, we get reviews where the booking has this technician_id
        $allReviews = \App\Models\Review::with(['booking.user', 'booking.product'])
            ->whereHas('booking', function($query) use ($user) {
                $query->where('technician_id', $user->id);
            })
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Calculate overall rating statistics from all reviews
        $ratingStats = [
            'total_reviews' => $allReviews->count(),
            'average_rating' => $allReviews->count() > 0 ? round($allReviews->avg('rating'), 2) : 0,
            'rating_5' => $allReviews->where('rating', 5)->count(),
            'rating_4' => $allReviews->where('rating', 4)->count(),
            'rating_3' => $allReviews->where('rating', 3)->count(),
            'rating_2' => $allReviews->where('rating', 2)->count(),
            'rating_1' => $allReviews->where('rating', 1)->count(),
        ];
        
        // Paginate reviews - 3 per page
        $perPage = 3;
        $currentPage = request()->get('page', 1);
        $total = $allReviews->count();
        $items = $allReviews->slice(($currentPage - 1) * $perPage, $perPage)->values();
        
        $reviews = new \Illuminate\Pagination\LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );
        
        return view('technician.dashboard', compact('technician', 'reviews', 'ratingStats'));
    }

    /**
     * Show all projects for the technician
     */
    public function projects()
    {
        $user = auth()->user();
        $technician = TechnicianProfile::where('user_id', $user->id)->first();
        
        $projects = [];
        if ($technician && $technician->projects && is_array($technician->projects)) {
            $projects = $technician->projects;
        }
        
        return view('technician.projects', compact('technician', 'projects'));
    }

    public function update(Request $request)
    {
        try {
            $user = auth()->user();
            $technician = TechnicianProfile::where('user_id', $user->id)->first();

            if (!$technician) {
                $technician = new TechnicianProfile();
                $technician->user_id = $user->id;
            }

            // Log incoming data for debugging
            Log::info('Profile update request data:', [
                'certifications' => $request->input('certifications'),
                'educations' => $request->input('educations'),
                'projects' => $request->input('projects'),
                'has_profile_picture' => $request->hasFile('profile_picture'),
                'project_images_files' => $request->hasFile('project_images') ? array_keys($request->file('project_images')) : [],
            ]);

            // Update basic information
            $technician->job_title = $request->input('job_title');
            $technician->year_of_experience = $request->input('year_of_experience');
            $technician->about = $request->input('about');

            // Handle profile picture upload
            if ($request->hasFile('profile_picture')) {
                try {
                    $file = $request->file('profile_picture');
                    // Delete old profile picture if exists
                    if ($technician->profile_picture && Storage::disk('public')->exists($technician->profile_picture)) {
                        Storage::disk('public')->delete($technician->profile_picture);
                    }
                    $path = $file->store('technician/profiles', 'public');
                    $technician->profile_picture = $path;
                    Log::info('Profile picture uploaded:', ['path' => $path]);
                } catch (\Exception $e) {
                    Log::error('Profile picture upload error: ' . $e->getMessage());
                }
            }

            // Handle resume upload
            if ($request->hasFile('resume')) {
                // Delete old resume if exists
                if ($technician->resume) {
                    Storage::disk('public')->delete($technician->resume);
                }
                $path = $request->file('resume')->store('technician/resumes', 'public');
                $technician->resume = $path;
            }

            // Handle certifications array
            $certifications = [];
            if ($request->has('certifications') && is_array($request->input('certifications'))) {
                foreach ($request->input('certifications') as $cert) {
                    if (isset($cert) && (!empty($cert['name']) || !empty($cert['organization']) || !empty($cert['year']))) {
                        $certifications[] = [
                            'name' => $cert['name'] ?? '',
                            'organization' => $cert['organization'] ?? '',
                            'year' => $cert['year'] ?? '',
                        ];
                    }
                }
            }
            $technician->certification = $certifications;

            // Handle education array
            $educations = [];
            if ($request->has('educations') && is_array($request->input('educations'))) {
                foreach ($request->input('educations') as $edu) {
                    if (isset($edu) && (!empty($edu['degree']) || !empty($edu['institution']))) {
                        $educations[] = [
                            'degree' => $edu['degree'] ?? '',
                            'institution' => $edu['institution'] ?? '',
                            'start_year' => $edu['start_year'] ?? '',
                            'end_year' => $edu['end_year'] ?? '',
                            'location' => $edu['location'] ?? '',
                        ];
                    }
                }
            }
            $technician->education = $educations;

            // Handle projects array
            $projects = [];
            if ($request->has('projects') && is_array($request->input('projects'))) {
                foreach ($request->input('projects') as $index => $project) {
                    if (isset($project) && (!empty($project['name']) || !empty($project['description']))) {
                        $projectData = [
                            'name' => $project['name'] ?? '',
                            'description' => $project['description'] ?? '',
                            'year' => $project['year'] ?? '',
                            'tags' => $project['tags'] ?? '',
                        ];

                        // Handle project image upload
                        // Form sends as project_images[index], so check array format
                        $imageFile = null;
                        $allProjectImages = $request->file('project_images');
                        
                        if ($allProjectImages && is_array($allProjectImages) && isset($allProjectImages[$index])) {
                            $imageFile = $allProjectImages[$index];
                        } elseif ($request->hasFile('project_images.' . $index)) {
                            $imageFile = $request->file('project_images.' . $index);
                        }
                        
                        if ($imageFile && $imageFile->isValid()) {
                            try {
                                // Delete old image if exists
                                if (isset($project['existing_image']) && $project['existing_image'] && Storage::disk('public')->exists($project['existing_image'])) {
                                    Storage::disk('public')->delete($project['existing_image']);
                                }
                                $imagePath = $imageFile->store('technician/projects', 'public');
                                $projectData['image'] = $imagePath;
                                Log::info('Project image uploaded:', ['index' => $index, 'path' => $imagePath, 'original_name' => $imageFile->getClientOriginalName()]);
                            } catch (\Exception $e) {
                                Log::error('Project image upload error: ' . $e->getMessage());
                            }
                        } elseif (isset($project['existing_image']) && $project['existing_image']) {
                            $projectData['image'] = $project['existing_image'];
                        }

                        $projects[] = $projectData;
                    }
                }
            }
            $technician->projects = $projects;

            // Log before saving
            Log::info('Technician profile data before save:', [
                'certification' => $technician->certification,
                'education' => $technician->education,
                'projects' => $technician->projects,
                'profile_picture' => $technician->profile_picture,
            ]);

            $technician->save();

            // Refresh to get the saved data
            $technician->refresh();

            // Log after saving
            Log::info('Technician profile data after save:', [
                'certification' => $technician->certification,
                'education' => $technician->education,
                'projects' => $technician->projects,
                'profile_picture' => $technician->profile_picture,
                'profile_picture_exists' => $technician->profile_picture ? Storage::disk('public')->exists($technician->profile_picture) : false,
            ]);

            // Update user name if provided
            if ($request->has('name')) {
                $user->name = $request->input('name');
                $user->save();
            }

            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully!',
                'technician' => $technician
            ]);

        } catch (\Exception $e) {
            Log::error('Technician profile update error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update profile. Please try again.'
            ], 500);
        }
    }

    public function technicians(){
        // Get all technician profiles with their user data
        $technicians = TechnicianProfile::with('user')
            ->whereHas('user', function($query) {
                $query->where('is_active', 1);
            })
            ->get()
            ->map(function($technician) {
                // Count completed jobs (status = 4) for this technician
                $completedJobsCount = BookingStatus::where('technician_id', $technician->user_id)
                    ->where('status', BookingStatusHelper::STATUS_JOB_COMPLETED)
                    ->count();
                
                // Get all reviews for this technician from bookings where technician_id matches
                $allReviews = \App\Models\Review::with(['booking.user', 'booking.product'])
                    ->whereHas('booking', function($query) use ($technician) {
                        $query->where('technician_id', $technician->user_id);
                    })
                    ->get();
                
                // Calculate rating statistics
                $averageRating = $allReviews->count() > 0 ? round($allReviews->avg('rating'), 1) : 0;
                $totalReviews = $allReviews->count();
                
                // Add the count and rating to the technician object
                $technician->completed_jobs_count = $completedJobsCount;
                $technician->average_rating = $averageRating;
                $technician->total_reviews = $totalReviews;
                
                return $technician;
            });
        
        return view("technician.technicians", compact('technicians'));
    }

    /**
     * Show public profile of a technician (for customers)
     */
    public function showProfile($id)
    {
        $technician = TechnicianProfile::with('user')->findOrFail($id);
        
        // Get all reviews for this technician from bookings where technician_id matches
        $allReviews = \App\Models\Review::with(['booking.user', 'booking.product'])
            ->whereHas('booking', function($query) use ($technician) {
                $query->where('technician_id', $technician->user_id);
            })
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Calculate overall rating statistics
        $ratingStats = [
            'total_reviews' => $allReviews->count(),
            'average_rating' => $allReviews->count() > 0 ? round($allReviews->avg('rating'), 2) : 0,
            'rating_5' => $allReviews->where('rating', 5)->count(),
            'rating_4' => $allReviews->where('rating', 4)->count(),
            'rating_3' => $allReviews->where('rating', 3)->count(),
            'rating_2' => $allReviews->where('rating', 2)->count(),
            'rating_1' => $allReviews->where('rating', 1)->count(),
        ];
        
        // Get recent reviews (3)
        $recentReviews = $allReviews->take(3);
        
        // Count completed jobs
        $completedJobsCount = BookingStatus::where('technician_id', $technician->user_id)
            ->where('status', BookingStatusHelper::STATUS_JOB_COMPLETED)
            ->count();
        
        return view('technician.profile-public', compact('technician', 'recentReviews', 'ratingStats', 'completedJobsCount'));
    }
}
