<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartShow(){
        $cart=[];
        $cart['pro'] = session()->get('cart');
        return view('frontend.product.cart');
    }

    public function cartAdd(Request $request){
        
        try {
            $request->validate([
                'product_id' => 'required',
            ]);
        } catch (Exception $e) {
            return redirect()->back();
        }

        $product = Product::findOrFail($request->input('product_id'));

        $cart = [];
        $cart['product'] = 
        [
            'id' => $product->id,
            'title' => $product->title,
            'price' => $product->price,
            'sale_price' => $product->sale_price,
        ];
        $request->session()->flush();
       
        $request->session()->put('cart', $cart);
        
        

        // dd(session('cart'));
        return redirect()->route('frontend.cart.show');


        
    }
}
