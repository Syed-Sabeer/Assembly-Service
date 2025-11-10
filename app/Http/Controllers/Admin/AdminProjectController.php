<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminProjectController extends Controller
{
     public function index(Request $request)
    {
        $search = $request->get('search', '');
        $perPage = $request->get('per_page', 20);

        // Start query
        $query = Project::query();

        // Apply search filter
        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
        }

        // Get all projects for statistics
        $allProjects = Project::all();
        
        // Calculate statistics
        $stats = [
            'total' => $allProjects->count(),
        ];

        // Paginate results
        $projects = $query->latest()->paginate($perPage);

        return view('crud.projects.index', compact('projects', 'stats', 'search'));
    }
    public function add()
    {
        return view('crud.projects.add');
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
        return view('crud.projects.edit', compact('project','categories'));
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
