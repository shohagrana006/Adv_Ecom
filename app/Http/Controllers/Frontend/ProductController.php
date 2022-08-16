<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productDetails($slug){

        $data = [];
        $data['product'] = Product::where('slug', $slug)->where('active',1)->first();
        if(is_null($data['product'])){
            return redirect()->route('frontend.index');
        }

        return view('frontend.product.productdetails', $data);
    }
}
