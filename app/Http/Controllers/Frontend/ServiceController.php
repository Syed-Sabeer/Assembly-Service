<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Service;
use App\Models\Achievement;


class ServiceController extends Controller
{
    public function index(){
      $services = Service::where('visibility', 1)->get();
        $achievements = Achievement::all();
        return view("frontend.services", compact('services','achievements'));
    }


}
