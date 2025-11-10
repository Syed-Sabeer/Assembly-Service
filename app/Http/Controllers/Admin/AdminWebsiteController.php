<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminWebsiteController extends Controller
{

  
    public function index()
    {
        $hero = \App\Models\HomeHeroSection::first();
 

        return view('admin.cms.home.index', compact(
            'hero'
        ));
    }


    
    public function updateAllSections(\Illuminate\Http\Request $request)
    {
        try {
            // Validate hero section data
            $request->validate([
                'heading' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'points' => 'nullable|array',
                'points.*' => 'nullable|string',
                'experience' => 'nullable|string|max:255',
                'name' => 'nullable|string|max:255',
                'designation' => 'nullable|string',
                'badge' => 'nullable|string|max:255',
                'button_link' => 'nullable|string',
                'song_name' => 'nullable|string',
                'song_album' => 'nullable|string|max:255',
                'bg_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'song_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'song' => 'nullable|file|mimes:mp3,wav,ogg|max:10240',
                'pc_image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'pc_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'pc_image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'pc_image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Hero Section
            $hero = \App\Models\HomeHeroSection::first();
            
            // Process points array - filter out empty values
            $points = $request->input('points', []);
            $points = array_filter($points, function($point) {
                return !empty(trim($point));
            });
            $points = array_values($points); // Re-index array

            $heroData = [
                'heading' => $request->input('heading') ?: '',
                'description' => $request->input('description') ?: '',
                'points' => !empty($points) ? $points : null,
                'experience' => $request->input('experience') ?: '',
                'name' => $request->input('name') ?: '',
                'designation' => $request->input('designation') ?: '',
                'badge' => $request->input('badge') ?: '',
                'button_link' => $request->input('button_link') ?: '',
                'song_name' => $request->input('song_name') ?: '',
                'song_album' => $request->input('song_album') ?: '',
            ];

            // Handle background image
            if ($request->hasFile('bg_image')) {
                $image = $request->file('bg_image');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $heroData['bg_image'] = 'uploads/' . $imageName;
            }

            // Handle song image
            if ($request->hasFile('song_image')) {
                $image = $request->file('song_image');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $heroData['song_image'] = 'uploads/' . $imageName;
            }

            // Handle song file
            if ($request->hasFile('song')) {
                $songFile = $request->file('song');
                $songName = time().'_'.$songFile->getClientOriginalName();
                $songFile->move(public_path('uploads/audio'), $songName);
                $heroData['song'] = 'uploads/audio/' . $songName;
            }

            // Handle popular corner images
            if ($request->hasFile('pc_image_1')) {
                $image = $request->file('pc_image_1');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $heroData['pc_image_1'] = 'uploads/' . $imageName;
            }
            if ($request->hasFile('pc_image_2')) {
                $image = $request->file('pc_image_2');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $heroData['pc_image_2'] = 'uploads/' . $imageName;
            }
            if ($request->hasFile('pc_image_3')) {
                $image = $request->file('pc_image_3');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $heroData['pc_image_3'] = 'uploads/' . $imageName;
            }
            if ($request->hasFile('pc_image_4')) {
                $image = $request->file('pc_image_4');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $heroData['pc_image_4'] = 'uploads/' . $imageName;
            }

            if (!$hero) {
                // Only create if there's actual data
                $hero = \App\Models\HomeHeroSection::create($heroData);
            } else {
                $hero->update($heroData);
            }
            Log::info('Hero section updated successfully', ['hero_id' => $hero->id, 'data' => $heroData]);
            
            return redirect()->route('admin.website.index')->with('success', 'Team section updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating hero section', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->route('admin.website.index')->with('error', 'Failed to update team section: ' . $e->getMessage());
        }
    }


}
