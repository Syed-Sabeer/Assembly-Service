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

    public function show($slug){
        // Try to find by slug first, then by ID if slug doesn't match
        $service = Service::where('visibility', 1)
            ->where(function($query) use ($slug) {
                $query->where('slug', $slug)
                      ->orWhere('id', $slug);
            })
            ->firstOrFail();
        
        // Get related services (other services excluding current one)
        $relatedServices = Service::where('visibility', 1)
            ->where('id', '!=', $service->id)
            ->limit(6)
            ->get();
        
        return view("frontend.service-detail", compact('service', 'relatedServices'));
    }
}
