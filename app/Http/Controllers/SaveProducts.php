<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\SaveProduct;
use App\Cart;

class SaveProducts extends Controller
{
    //Save products in Cart page
    public function saveProducts(Request $request) {
        $saveProduct = new SaveProduct;
        $saveProduct->product_id = $request->product_id;
        $saveProduct->user_id = auth()->user()->id;
        $saveProduct->save();

        $cart = Cart::where('product_id', '=', $request->product_id)->first();
        $cart->delete();

        return redirect()->route('cart.index');
    }

    //Delete saved product() 
    public function destroy(Request $request) {
        $product = SaveProduct::where('product_id', '=', $request->product_id)->first();
        $product->delete();

        return redirect()->route('cart.index');
    }
}
