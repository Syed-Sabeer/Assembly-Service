<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\AboutSection;
use App\Models\HomeHeroSection;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Project;
use App\Models\Service;
use App\Models\HeroCrud;
use App\Models\Partner;
class HomeController extends Controller
{




public function index()
{
    $partners = Partner::where('visibility', 1)->get();
    $faqs = Faq::all();
    $about_details = AboutSection::first();
    $blogs = Blog::latest()->take(3)->get();
    $heros = HeroCrud::all();
    $services = Service::all();
    $projects = Project::all(); 
    $testimonials = Testimonial::all();

    // Load categories *with* their related products
    $categories = Category::with('products')->get();

    return view('frontend.index', compact('faqs', 'partners', 'testimonials', 'blogs', 'heros', 'categories','about_details','projects','services'));
}


    public function contactStore(Request $request){

    try {
            $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'phone' => 'nullable|string|max:255',
                'message' => 'required|string',

            ]);

            $validatedData = $request->only(['firstname', 'lastname', 'email','phone','message']);

            Log::info('Validated Contact data:', $validatedData);

            $contact = Contact::create([
                'firstname' => $validatedData['firstname'],
                'lastname' => $validatedData['lastname'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'message' => $validatedData['message'],
            ]);

            Log::info('Contact created successfully:', ['id' => $contact->id]);

            return redirect()->route('home')->with('success', 'Contact Details Successfully');
        } catch (\Exception $e) {
            Log::error('Error while creating Contact:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }


}
