<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Log;

class AboutController extends Controller
{
    public function index(){
        $about_details = AboutSection::first();
        $partners = Partner::where('visibility', 1)->get();
        return view("frontend.about", compact('about_details', 'partners'));
    }

    public function aboutmajorpowel(){
     
        return view("frontend.about-major-powel");
    }

}
