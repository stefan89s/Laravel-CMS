<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Product;
use App\Cart;
use App\SaveProduct;

class CartController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        //Products in the Cart
        $carts = Cart::all()->where('user_id', '=', $user_id);
        $productsData = [];

        foreach($carts as $cart) {
            $product = Product::where('id', '=', $cart->product_id)->first();
        
            array_push($productsData, $product);
        }

        //Saved Products
        $saveProducts = SaveProduct::all()->where('user_id', '=', $user_id);
        $dataSaved = [];

        foreach($saveProducts as $saved) {
            $product = Product::where('id', '=', $saved->product_id)->first();
            array_push($dataSaved, $product);
        }

        $products = Product::all();
        return view('comerce.cart')->with([
            'products' => $productsData,
            'saveProducts' => $dataSaved,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $cart = new Cart();
        $cart->user_id = $user_id;
        $cart->product_id = $request->product_id;
        $cart->save();

        $savedProduct = SaveProduct::where('product_id', '=', $request->product_id)->first();

        if($savedProduct > 0) {
            if($savedProduct->product_id == $request->product_id) {
                $savedProduct->delete();
            }
        }

        Session::flash('success', 'You Added New Product To The Cart!');

        return redirect()->route('cart.index');
    }

    //Show purchasing
    public function checkPurchasing() {
        return view('comerce.checkout');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::where('product_id', '=', $id)->first();
        $cart->delete();

        $product = Product::find($id);

        Session::flash('delete', 'You Deleted The Product: ' . $product->name . ' From The Cart!');

        return redirect()->route('cart.index');
    }

}
