<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CartController extends Controller
{
    public function cartShow()
    {
        $data = [];
        $data['products'] = session()->has('cart') ? session()->get('cart') : [];
        $data['total'] = array_sum(array_column($data['products'], 'total_price'));
       return view('frontend.product.cart', $data);
    }

    public function cartAdd(Request $request)
    {
        try {
            $this->validate($request, [
                'product_id' => 'required|numeric',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back();
        }

        
        $product = Product::findOrFail($request->input('product_id'));
        $cart    = $request->session()->has('cart') ? $request->session()->get('cart') : [];       
        $price   = ($product->sale_price != null && $product->sale_price > 0) ? $product->sale_price : $product->price;

        if(array_key_exists($product->id, $cart)){
            $cart[$product->id]['quantity']++;
            $cart[$product->id]['total_price'] =  $cart[$product->id]['unit_price'] * $cart[$product->id]['quantity'];
        } else {
            $cart[$product->id] = [
                'title' => $product->title,
                'quantity' => 1,
                'unit_price' => $price,
                'total_price' => $price,
            ];
        }
        $request->session()->put('cart', $cart);
        $request->session()->flash('message', $product->title . ' add to cart');
        return redirect()->route('frontend.cart.show');
    }

    function cartRemove(Request $request)
    {
        try {
            $this->validate($request, [
                'id' => 'required|numeric',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back();
        }

        $cart    = session()->has('cart') ? session()->get('cart') : [];
        unset($cart[$request->id]);
        session(['cart' => $cart]);
        $request->session()->flash('remove', 'Product remove successfully from cart');
        return redirect()->back();
    }
    function cartClear(Request $request)
    {       
        session(['cart' => []]);
        $request->session()->flash('remove', 'Your cart is clear !!');
        return redirect()->back();    
    }

    function checkout()
    {
        return view('frontend.product.checkout');
    }

}
