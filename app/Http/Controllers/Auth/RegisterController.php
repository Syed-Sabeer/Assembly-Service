<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TechnicianProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{

    public function register()
    {
        return view('frontend.user.user-portal');
    }
  public function registerAttempt(Request $request)
{
    Log::info('registerAttempt called', ['request' => $request->all()]);

    try {
        $validationRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ];
        
        // Add resume validation if technician registration
        if ($request->has('is_technician')) {
            $validationRules['resume'] = 'required|file|mimes:pdf,doc,docx|max:10240'; // Max 10MB
        }
        
        $request->validate($validationRules);
    } catch (\Illuminate\Validation\ValidationException $e) {
        Log::error('Validation failed', ['errors' => $e->errors()]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }

        return back()->withErrors($e->errors())->withInput();
    }

    DB::beginTransaction();
    try {
        Log::info('Creating user record');

        // Generate unique username
        $username = $this->generateUsername($request->name);
        while (User::where('username', $username)->exists()) {
            $username = $this->generateUsername($request->name);
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $username,
            'password' => Hash::make($request->password),
            'is_active' => 1,
        ]);

        Log::info('User created', ['user_id' => $user->id]);

        // Check technician flag
        $isTechnician = $request->has('is_technician');

        // ✅ Create technician profile if applicable
        if ($isTechnician) {
            $resumePath = null;
            
            // Handle resume file upload
            if ($request->hasFile('resume')) {
                try {
                    $resumeFile = $request->file('resume');
                    $resumePath = $resumeFile->store('technician/resumes', 'public');
                    Log::info('Resume uploaded during registration', [
                        'user_id' => $user->id,
                        'path' => $resumePath,
                        'original_name' => $resumeFile->getClientOriginalName()
                    ]);
                } catch (\Exception $e) {
                    Log::error('Resume upload error during registration: ' . $e->getMessage());
                    throw new \Exception('Failed to upload resume. Please try again.');
                }
            }
            
            TechnicianProfile::create([
                'user_id' => $user->id,
                'about' => $request->about,
                'job_title' => $request->job_title ?? null,
                'year_of_experience' => $request->year_of_experience ?? null,
                'certification' => $request->certification ?? null,
                'education' => $request->education ?? null,
                'projects' => $request->projects ?? null,
                'resume' => $resumePath,
                'profile_picture' => $request->profile_picture ?? null,
            ]);

            Log::info('Technician profile created', ['user_id' => $user->id, 'resume_path' => $resumePath]);
        }

        // Assign role to user (NOT to TechnicianProfile)
        $role = $isTechnician ? 'technician' : 'individual';
        $user->assignRole($role);
        Log::info('Role assigned', ['user_id' => $user->id, 'role' => $role]);

        // Log in the user
        Auth::login($user);
        DB::commit();

        Log::info('Registration successful');

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Registration successful!',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'username' => $user->username,
                    'role' => $role
                ]
            ], 201);
        }

        // Redirect accordingly
        return $isTechnician
            ? redirect()->route('technician.dashboard')->with('success', 'Technician registration successful!')
            : redirect()->route('home')->with('success', 'Registration successful!');

    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Registration failed', [
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString(),
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed',
                'error' => $e->getMessage()
            ], 500);
        }

        return back()->withErrors(['error' => $e->getMessage()])->withInput();
    }
}



        public function generateUsername($name)
    {
        $name = strtolower(str_replace(' ', '', $name));
        $username = $name . rand(1000, 9999);
        return $username;
    }

public function artistRegister(){
        return view('frontend.auth.artist-register');
    }




}

