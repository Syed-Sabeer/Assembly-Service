<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminAboutController extends Controller
{
    public function index()
    {
        $aboutSection = AboutSection::first();
        return view('admin.cms.about.index', compact('aboutSection'));
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'about_heading' => 'nullable|string|max:255',
                'about_vision' => 'nullable|string',
                'about_mission' => 'nullable|string',
                'local_reach_value' => 'nullable|string|max:255',
                'trusted_expertise_value' => 'nullable|string|max:255',

                'whoarewe_heading' => 'nullable|string|max:300',
                'whoarewe_description' => 'nullable|string',
                'whoarewe_points' => 'nullable|array',
                'whoarewe_points.*' => 'nullable|string|max:255',
                'whoarewe_value' => 'nullable|string|max:355',

                'about_tab_value1' => 'nullable|string|max:255',
                'about_tab_heading1' => 'nullable|string|max:255',
                'about_tab_description1' => 'nullable|string',

                'about_tab_value2' => 'nullable|string|max:255',
                'about_tab_heading2' => 'nullable|string|max:255',
                'about_tab_description2' => 'nullable|string',

                'about_tab_value3' => 'nullable|string|max:255',
                'about_tab_heading3' => 'nullable|string|max:255',
                'about_tab_description3' => 'nullable|string',

                'about_tab_value4' => 'nullable|string|max:255',
                'about_tab_heading4' => 'nullable|string|max:255',
                'about_tab_description4' => 'nullable|string',
            ]);

            $aboutSection = AboutSection::first();

            $data = [
                'about_heading' => $request->about_heading,
                'about_vision' => $request->about_vision,
                'about_mission' => $request->about_mission,
                'local_reach_value' => $request->local_reach_value,
                'trusted_expertise_value' => $request->trusted_expertise_value,

                'whoarewe_heading' => $request->whoarewe_heading,
                'whoarewe_description' => $request->whoarewe_description,
                'whoarewe_points' => $request->whoarewe_points ? array_values($request->whoarewe_points) : [],
                'whoarewe_value' => $request->whoarewe_value,

                'about_tab_value1' => $request->about_tab_value1,
                'about_tab_heading1' => $request->about_tab_heading1,
                'about_tab_description1' => $request->about_tab_description1,

                'about_tab_value2' => $request->about_tab_value2,
                'about_tab_heading2' => $request->about_tab_heading2,
                'about_tab_description2' => $request->about_tab_description2,

                'about_tab_value3' => $request->about_tab_value3,
                'about_tab_heading3' => $request->about_tab_heading3,
                'about_tab_description3' => $request->about_tab_description3,

                'about_tab_value4' => $request->about_tab_value4,
                'about_tab_heading4' => $request->about_tab_heading4,
                'about_tab_description4' => $request->about_tab_description4,
            ];

            if (!$aboutSection) {
                AboutSection::create($data);
            } else {
                $aboutSection->update($data);
            }

            return redirect()->route('admin.about.index')->with('success', 'About section updated successfully.');
        } catch (\Exception $e) {
            Log::error('About section update error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
}
