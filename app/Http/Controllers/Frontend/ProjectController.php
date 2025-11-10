<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Partner;
use App\Models\Faq;
use App\Models\Newsbar;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $partners = Partner::where('visibility', 1)->get();    
        $faqs = Faq::all(); 
        $projects = Project::all(); 
        return view("frontend.projects",compact('partners','faqs','projects'));
    }
    public function detail($id){
     
        $project = Project::where('id',$id)->first();
        $news = Newsbar::all(); 
        return view("frontend.project-detail", compact('project','news'));
    }


}
