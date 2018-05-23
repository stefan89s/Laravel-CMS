<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show', 'searchPosts']]);
    }

    //upload images
    public function uploadImages($post) {

        $file = $_FILES['file'];
 
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
                    $newName = "post".$post.".jpg";
                    $fileDestination = 'img/articles/'.$newName;
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

    //search for the posts
    public function searchPosts(Request $request) {
        $searchRequest = $request->searchposts;
        $categories = Category::all();

        $posts = Post::where('title', 'like', '%' . $searchRequest . '%')->get();

        return view('posts.search-results')->with([
            'posts'=> $posts,
            'categories' => $categories,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        $categories = Category::all();
        return view('posts.index')->with([
            'posts' => $posts,
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
        $user_id = auth()->user()->id;
        $categories = Category::all();
        $tags = Tag::all()->where('user_id', '=', $user_id);

        return view('posts.create')->with([
            'categories' => $categories,
            'tags' => $tags,
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
        $user_id = Auth::user()->id;
        $post = new Post;
        $post->title = $request->title;
        $post->article = $request->article;
        $post->user_id = $user_id;
        $post->slug = $request->slug;
        $post->category_id = $request->category;
        $post->save();

        $post->tags()->sync($request->tags, false);

        $this->uploadImages($post->id);

        Session::flash('success', 'You Created New Article: ' . $post->title);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        return view('posts.show')->with([
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user_id = auth()->user()->id;
        $categories = Category::all();
        $tags = Tag::all()->where('user_id', '=', $user_id);
        $post = Post::where('slug', '=', $slug)->first();

        return view('posts.edit')->with([
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', '=', $slug)->first();

        Session::flash('success', 'You Edited Article: ' . $post->title);

        $user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->article = $request->article;
        $post->user_id = $user_id;
        $post->slug = $request->slug;
        $post->category_id = $request->category;
        $post->save();

        $post->tags()->sync($request->tags, false);

        $this->uploadImages($post->id);

        return redirect()->route('home');
    }

    //Delete Page
    public function delete($slug) {
        $post = Post::where('slug', '=', $slug)->first();
        
        return view('posts.delete')->with([
            'post' => $post,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        Session::flash('delete', 'You Deleted Article: ' . $post->title);
        $post->delete();

        return redirect()->route('home');
    }
}
