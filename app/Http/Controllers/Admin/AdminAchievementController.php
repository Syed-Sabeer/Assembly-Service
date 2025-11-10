<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class AdminAchievementController extends Controller
{
  
  public function index()
  {
    $achievements = Achievement::all();
  return view('admin.crud.achievement.index', compact('achievements'));
  }

  public function add()
  {
    return view('admin.crud.achievement.add');
  }

public function store(Request $request)
{
    try {
        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:255',
          
            'visibility' => 'nullable|integer',
        ]);

        $validatedData = $request->only(['title', 'year']);

        Log::info('Validated achievement data:', $validatedData);

        $achievement = Achievement::create([
            'title' => $validatedData['title'],
           'year' => $validatedData['year'],
            
        ]);

        Log::info('achievement created successfully:', ['id' => $achievement->id]);

        return redirect()->route('admin.achievement.index')->with('success', 'achievement added successfully.');
    } catch (\Exception $e) {
        Log::error('Error while creating achievement:', ['message' => $e->getMessage()]);
        return redirect()->back()->withErrors($e->getMessage())->withInput();
    }
}

public function edit($id)
{
    $achievement = Achievement::findOrFail($id);
    return view('admin.crud.achievement.edit', compact('achievement'));
}


public function update(Request $request, $id)
{
    try {
        $request->validate([
            'title' => 'required|string|max:255',
             'year' => 'required|string|max:255',
         
        ]);

        $achievement = Achievement::findOrFail($id);
        $achievement->update([
            'title' => $request->title,
               'year' => $request->year,
            
        ]);

        return redirect()->route('admin.achievement.index')->with('success', 'achievement updated successfully.');
    } catch (\Exception $e) {
        Log::error('achievement update error:', ['message' => $e->getMessage()]);
        return redirect()->back()->withErrors($e->getMessage())->withInput();
    }
}

public function destroy($id)
{
    try {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();
        return redirect()->route('admin.achievement.index')->with('success', 'achievement deleted successfully.');
    } catch (\Exception $e) {
        Log::error('achievement delete error:', ['message' => $e->getMessage()]);
        return redirect()->back()->withErrors('Could not delete achievement.');
    }
}



}
