<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    public function detail($slug){
     
        $product = Product::where('slug',$slug)->first();

        return view("frontend.product-catelog", compact('product'));
    }

   
}


