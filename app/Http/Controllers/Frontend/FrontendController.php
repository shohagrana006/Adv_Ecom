<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FrontendController extends Controller
{
    public function index(){
        $data = [];

        $data['products'] = cache('products', function(){
            return Product::select(['id','title','slug','price','sale_price'])
            ->where('active',1)->take(9)->get();
        });


        return view('frontend.layout.home', $data);
    }
}
