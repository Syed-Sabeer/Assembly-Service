<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
  
  public function index()
  {
    $testimonials = Testimonial::all();
  return view('admin.crud.testimonial.index', compact('testimonials'));
  }

  public function add()
  {
    return view('admin.crud.testimonial.add');
  }

public function store(Request $request)
{
    try {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'review' => 'required|string',
          
        ]);

        $validatedData = $request->only(['name', 'type', 'review']);

        Log::info('Validated testimonial data:', $validatedData);

        $testimonial = Testimonial::create([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'review' => $validatedData['review'],

        ]);

        Log::info('testimonial created successfully:', ['id' => $testimonial->id]);

        return redirect()->route('admin.testimonial.index')->with('success', 'testimonial added successfully.');
    } catch (\Exception $e) {
        Log::error('Error while creating testimonial:', ['message' => $e->getMessage()]);
        return redirect()->back()->withErrors($e->getMessage())->withInput();
    }
}

public function edit($id)
{
    $testimonial = Testimonial::findOrFail($id);
    return view('admin.crud.testimonial.edit', compact('testimonial'));
}

public function update(Request $request, $id)
{
    try {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'review' => 'required|string',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update([
            'name' => $request->name,
            'type' => $request->type,
            'review' => $request->review,

        ]);
        return redirect()->route('admin.testimonial.index')->with('success', 'testimonial updated successfully.');
    } catch (\Exception $e) {
        Log::error('testimonial update error:', ['message' => $e->getMessage()]);
        return redirect()->back()->withErrors($e->getMessage())->withInput();
    }
}

public function destroy($id)
{
    try {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();
        return redirect()->route('admin.testimonial.index')->with('success', 'testimonial deleted successfully.');
    } catch (\Exception $e) {
        Log::error('testimonial delete error:', ['message' => $e->getMessage()]);
        return redirect()->back()->withErrors('Could not delete testimonial.');
    }
}

}
