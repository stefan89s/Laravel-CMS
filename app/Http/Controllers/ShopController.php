<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Product;
use App\ProductCategory;
use App\Cart;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::inRandomOrder()->take(12)->get();
        $categories = ProductCategory::all();
        return view('comerce.shop')->with([
            'products'=> $products,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('products.create')->with([
            'categories' => $categories,
        ]);
    }

    //upload images for a product
    public function uploadImage($productId) {

        $file = $_FILES['product-image'];
 
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileTemp = $file['tmp_name'];
        $fileType = $file['type'];

        $fileExplode = explode(".", $fileName);
        $lowerType = strtolower(end($fileExplode));

        $fileAllowed = array('jpg', 'jpeg', 'png');

        if (in_array($lowerType, $fileAllowed)) {
            if ($fileError === 0) {
                if ($fileSize) {
                    $newName = "laptop-".$productId.".jpg";
                    $fileDestination = 'img/products/'.$newName;
                    move_uploaded_file($fileTemp, $fileDestination);
                    
                } else {
                    echo "your file is too big";
                }
            } else {
                echo "you have an error";
            }
        } else {
            echo "you cannot upload this type of file";
        }
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->details = $request->details;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->product_category_id = $request->category;
        $product->save();

        $this->uploadImage($product->id);

        return redirect()->route('shop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', '=', $slug)->first();
        return view('comerce.product')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->details = $request->details;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        $this->uploadImage($product->id);

        return redirect()->route('shop.index');
    }

    //All products 
    public function allProducts() {
        $products = Product::all();
        return view('products.all-products')->with([
            'products' => $products,
        ]);
    }

    //All ids from products in the cart
    public function productIds() {
        $carts = Cart::all();

        $data = [];

        foreach($carts as $cart) {
            $product = Cart::where('product_id', '=', $cart->product_id)->first();
            array_push($data, $product->product_id);
        }

        return $data;
    }

    //Returning the most wanted products
    public function mostWantedProducts() {
        //taking all ids from products
        $countProducts = $this->productIds();
        //adding common values of the products
        $countVlues = array_count_values($countProducts);
        //sort products from the bigest to smallest and returning
        //the common value as assosiate key
        arsort($countVlues);
        //take assosiate key as a number value
        $mostWantedProductIds = array_keys($countVlues);

        $data = [];
        foreach($mostWantedProductIds as $productId) {
            $product = Product::where('id', '=', $productId)->first();
            array_push($data, $product);
        }

        return view('products/analitics.products')->with([
            'products' => $data,
        ]);
    }

    //Most wanted products by categories
    public function watedByCategory() {
        $categories = ProductCategory::all();

        //taking all ids from products
        $countProducts = $this->productIds();
        //adding common values of the products
        $countVlues = array_count_values($countProducts);
        //sort products from the bigest to smallest and returning
        //the common value as assosiate key
        arsort($countVlues);
        //take assosiate key as a number value
        $mostWantedProductIds = array_keys($countVlues);

        $data = [];
        foreach($mostWantedProductIds as $productId) {
            $product = Product::where('id', '=', $productId)->first();
            array_push($data, $product);
        }

        return view('products/analitics.categories')->with([
            'products' => $data,
            'categories' => $categories,
        ]);
    }

    //Showing product for admin
    public function showProduct($id) {
        $product = Product::find($id);
        $cart = Cart::all()->where('product_id', '=', $id);
        return view('products/analitics.show')->with([
            'product' => $product,
            'carts' => $cart,
        ]);
    }

    //Delete Page
    public function delete($id) {
        $product = Product::find($id);
        return view('products/analitics.delete')->with([
            'product' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        Session::flash('delete', 'You delete the product: ' . $product->name);
        $product->delete();

        $cart = Cart::where('product_id', '=', $id)->first();
        if($cart) {
           $cart->delete(); 
        }
        
        return redirect()->route('wanted-by-category');
    }
}
