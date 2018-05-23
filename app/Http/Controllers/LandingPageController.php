<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Post;

class LandingPageController extends Controller
{
    public function index() {
        $products = Product::inRandomOrder()->take(8)->get();
        $posts = Post::orderBy('id', 'DESC')->take(3)->get();
        return view('comerce.landing-page')->with([
            'products' => $products,
            'posts' => $posts,
        ]);
    }
}
