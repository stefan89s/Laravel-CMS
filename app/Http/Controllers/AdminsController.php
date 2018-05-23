<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Admin;
use Auth;
use App\User;
use App\Category;
use App\NewsCategory;
use App\News;
use App\Cart;
use App\Product;

class AdminsController extends Controller
{

    public function __construct() {
        $this->middleware('auth:admin');
    }

    //Users categories
    public function categories() {   
        return $categories = Category::all();
    }

    //News categories
    public function newsCategories() {
        return $categories = NewsCategory::orderBy('id', 'asc')->paginate(3);
    }

    //All news
    public function news() {
        return $news = News::orderBy('id', 'desc')->get()->take(5);
    }

    //All users
    public function users() {
        return $users = User::inRandomOrder()->get();
    }

    //Latest posts from users
    public function articles() {
        return $articles = Post::orderBy('id', 'desc')->get()->take(5);
    }

    //The most popular category for users articles
    public function popularCategory() {
        $posts = Post::all();

        $data = [];
        foreach($posts as $post) {
            $category = Category::where('id', '=', $post->category_id)->first();
            array_push($data, $category->id);        
        }
        
        $count = count($data);
        return $data;
    }

    public function takeCategory() {
        $count = $this->popularCategory();
        $countVlues = array_count_values($count);
        arsort($countVlues);
        $keys = array_keys($countVlues);

        $data = [];
        
        foreach($keys as $n) {
            
            $category = Category::where('id', '=', $n)->first();
            array_push($data, $category);
        }

        return $data;
    }

    //Take all carts
    public function allCarts() {
        $carts = Cart::all();
        return $carts;
    }

    //All products in the cart
    public function allCartProducts() {
        $carts = $this->allCarts();

        $products = [];
        foreach($carts as $cart) {
            $product = Product::where('id', '=', $cart->product_id)->first();
            array_push($products, $product->id);
        }

        $takeProducts = array_count_values($products);
        arsort($takeProducts);
        $keys = array_keys($takeProducts);

        $keysData = [];
        $countPro = [];
        $majorData = [];
        foreach($keys as $productId) {
            $products = Product::where('id', '=', $productId)->first();
            $countProducts = Cart::all()->where('product_id', '=', $productId);
            $count = count($countProducts);
            
            array_push($countPro, $count); 
            array_push($keysData, $products);
            $majorData = ['countProducts' => $countPro, 'keysData' => $keysData];
        }

        return view('products/analitics.all-carts')->with([
            'products' => $majorData,
        ]);
    }

    public function index() {
        $id = Auth::guard('admin')->id();

        return view('admin')->with([
            'categories' => $this->categories(),
            'newsCategories' => $this->newsCategories(),
            'news' => $this->news(),
            'users' => $this->users(),
            'articles' => $this->articles(),
            'popular' => $this->takeCategory(),
            'carts' => $this->allCarts(),
        ]);
    }
}
