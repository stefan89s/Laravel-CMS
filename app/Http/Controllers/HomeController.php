<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Post;
use App\Tag;
use App\Category;
use App\Cart;
use App\Follower;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $carts = Cart::all()->where('user_id', '=', $user_id);
        $posts = Post::orderBy('id', 'DESC')->where('user_id', '=', $user_id)->paginate(5);
        return view('home')->with([
            'posts' => $posts,
            'carts' => $carts,
            'followingUsers' => $this->followingUsers(),
            'followers' => $this->followers(),
        ]);
    }

    //selecting following users
    public function followingUsers() {
        $followingUsers = new ProfilesController;
        return $followingUsers->followingUsers();
    }

    //select followers
    public function followers() {
        $user_id = auth()->user()->id;
        $followers = Follower::all()->where('user_id', '=', $user_id);
        return $followers;
    }

}
