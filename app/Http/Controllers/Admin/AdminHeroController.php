<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroCrud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminHeroController extends Controller
{
    public function index()
    {
        $heroes = HeroCrud::all();
        return view('admin.crud.hero.index', compact('heroes'));
    }

    public function add()
    {
        return view('admin.crud.hero.add');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'badge_title' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'video_link' => 'nullable|string',
                'button_link' => 'nullable|string',
            ]);

            $validatedData = $request->only([
                'badge_title',
                'title',
                'description',
                'video_link',
                'button_link',
            ]);

            // Handle image upload to root public/uploads
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('uploads');
                $image->move($destinationPath, $imageName);
                $validatedData['image'] = 'uploads/' . $imageName;
            }

            Log::info('Validated hero data:', $validatedData);

            $hero = HeroCrud::create($validatedData);

            Log::info('Hero created successfully:', ['id' => $hero->id]);

            return redirect()->route('admin.hero.index')->with('success', 'Hero section added successfully.');
        } catch (\Exception $e) {
            Log::error('Error while creating hero section:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $hero = HeroCrud::findOrFail($id);
        return view('admin.crud.hero.edit', compact('hero'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'badge_title' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'video_link' => 'nullable|string',
                'button_link' => 'nullable|string',
            ]);

            $hero = HeroCrud::findOrFail($id);
            $updateData = $request->only([
                'badge_title',
                'title',
                'description',
                'video_link',
                'button_link',
            ]);

            // Handle image update
            if ($request->hasFile('image')) {
                if ($hero->image && file_exists(public_path($hero->image))) {
                    unlink(public_path($hero->image));
                }

                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('uploads');
                $image->move($destinationPath, $imageName);
                $updateData['image'] = 'uploads/' . $imageName;
            }

            $hero->update($updateData);

            return redirect()->route('admin.hero.index')->with('success', 'Hero section updated successfully.');
        } catch (\Exception $e) {
            Log::error('Hero update error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $hero = HeroCrud::findOrFail($id);

            if ($hero->image && file_exists(public_path($hero->image))) {
                unlink(public_path($hero->image));
            }

            $hero->delete();

            return redirect()->route('admin.hero.index')->with('success', 'Hero section deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Hero delete error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors('Could not delete hero section.');
        }
    }
}
