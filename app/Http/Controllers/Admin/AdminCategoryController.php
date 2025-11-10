<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('crud.category.index', compact('categories'));
    }

    public function add()
    {
        return view('crud.category.add');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
            ]);

            $validatedData = $request->only(['title']);

            $category = Category::create([
                'title' => $validatedData['title'],
               
            ]);

            return redirect()->route('admin.category.index')->with('success', 'Category added successfully.');
        } catch (\Exception $e) {
            Log::error('Error while creating Category:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('crud.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
            ]);

            $category = Category::findOrFail($id);
            $updateData = [
                'title' => $request->title,

            ];

        

            $category->update($updateData);

            return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            Log::error('Category update error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);

            $category->delete();
            return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Category delete error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors('Could not delete Category.');
        }
    }

  
}
