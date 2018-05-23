<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Comment;
use Auth;

class CommentsController extends Controller
{
    public function __construct() {

        if(Auth::guard('web')->check()) {
           $this->middleware('auth'); 
        } 
          
    }

    public function getUser() {
        $user_id = auth()->user()->id;
        return $user_id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //inserting admin comments
        if($request->user_id == 1) {
            $user_id = 1;
            $comment = new Comment;
            $comment->admin_id = $user_id;
            $comment->comment = $request->comment;
            $comment->username = "admin";
            $comment->post_id = $request->post_id;
            $comment->save(); 
        } else {
            //inserting users comments
            $user_id = auth()->user()->id;
            $comment = new Comment;
            $comment->user_id = $user_id;
            $comment->comment = $request->comment;
            $comment->post_id = $request->post_id;
            $comment->username = auth()->user()->name;
            $comment->save(); 
        }

        return redirect()->route('posts.show', $request->post_slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->route('posts.show', $request->post_slug);
    }
}
