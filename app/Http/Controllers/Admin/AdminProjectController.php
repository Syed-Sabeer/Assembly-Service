<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminProjectController extends Controller
{
     public function index()
    {
        $projects = Project::all();
        return view('admin.crud.projects.index', compact('projects'));
    }
    public function add()
    {
        return view('admin.crud.projects.add');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'location' => 'nullable|string|max:255',
                'category' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'nullable|string|max:50',
                'type' => 'nullable|string|max:50',
                'area' => 'nullable|string|max:50',
                'commencement_date' => 'nullable|date',
                'price_range' => 'nullable|string|max:50',
            ]);

            $data = $request->only([
                'title', 'description', 'location', 'category',
                'status', 'type', 'area', 'commencement_date', 'price_range'
            ]);

            // Upload main image
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads/projects'), $name);
                $data['image'] = 'uploads/projects/'.$name;
            }

            Project::create($data);

            return redirect()->route('admin.project.index')
                ->with('success', 'Project added successfully.');
        } catch (\Exception $e) {
            Log::error('Project creation error: '.$e->getMessage());
            return back()->withErrors($e->getMessage())->withInput();
        }
    }
   
 // Show edit form
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $categories = Category::all();
        return view('admin.crud.projects.edit', compact('project','categories'));
    }

    // Handle update
    public function update(Request $request, $id)
    {
        try {
            $project = Project::findOrFail($id);

            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'location' => 'nullable|string|max:255',
                'category' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'nullable|string|max:50',
                'type' => 'nullable|string|max:50',
                'area' => 'nullable|string|max:50',
                'commencement_date' => 'nullable|date',
                'price_range' => 'nullable|string|max:50',
            ]);

            $data = $request->only([
                'title', 'description', 'location', 'category',
                'status', 'type', 'area', 'commencement_date', 'price_range'
            ]);

            // Update image if new one is uploaded
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads/projects'), $name);
                $data['image'] = 'uploads/projects/'.$name;

                // Optionally delete old image
                if ($project->image && file_exists(public_path($project->image))) {
                    unlink(public_path($project->image));
                }
            }

            $project->update($data);

            return redirect()->route('admin.project.index')
                ->with('success', 'Project updated successfully.');

        } catch (\Exception $e) {
            Log::error('Project update error: '.$e->getMessage());
            return back()->withErrors($e->getMessage())->withInput();
        }
    }
}
