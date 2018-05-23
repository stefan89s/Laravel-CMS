<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Post;
use App\AboutUser;
use App\User;
use App\Follower;
use Auth;

class ProfilesController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['showProfile', 'show']]);
    }

    //Profile Page
    public function index() {
        $user_id = auth()->user()->id;

        $posts = Post::all()->where('user_id', '=', $user_id);
        return view('profiles.index')->with([
            'posts' => $posts,
            'aboutUser' => $this->aboutUser(),
        ]);
    }

    //About me
    public function aboutMe(Request $request) {
        $user_id = auth()->user()->id;

        //checking if input is empty or not
        if(!empty($request->about_me)) {

            //selecting and deleting old information if exists
            $select = AboutUser::where('user_id', '=', $user_id)->first();
            if($select) {
                $select->delete();
            }
            
            //storing new information
            $aboutUser = new AboutUser;
            $aboutUser->user_id = $user_id;
            $aboutUser->about_user = $request->about_me;
            $aboutUser->save();
        }

        return redirect()->route('profile.show', auth()->user()->name);
    }

    //Uploading User's profile image
    public function uploadImage() {
        $userName = auth()->user()->name;

        $file = $_FILES['profile-image'];
 
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
                    $newName = "profile-".$userName.".jpg";
                    $fileDestination = 'img/profile-images/'.$newName;
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

        return redirect()->route('profile.show', auth()->user()->name);
    }

    //About me
    public function aboutUser() {
        $aboutUser = AboutUser::where('user_id', '=', auth()->user()->id)->first(); 
        if($aboutUser) {
           return $aboutUser->about_user; 
        }  
    }

    //Show profile from individual profile
    public function show($name) {
        $user = User::where('name', '=', $name)->first();
        //orderBy('created_at', 'desc')->paginate(10)
        $posts = Post::where('user_id', '=', $user->id)->orderBy('id', 'desc')->paginate(8);
        $aboutUser = AboutUser::where('user_id', '=', $user->id)->first();

        //selecting users in random order
        $randomUsers = User::inRandomOrder()->take(3)->get();

        //checking for following users ids
        $followingUsers = [];
        if(Auth::guard('web')->check()) {
            foreach($this->followingUsers() as $followingUser) {
            array_push($followingUsers, $followingUser->user_id);
            }
        }

        return view('profiles.show')->with([
            'user' => $user,
            'posts' => $posts,
            'aboutUser' => $aboutUser,
            'followingUsers' => $followingUsers,
            'randomUsers' => $randomUsers,
        ]);
    }

    //Show profile from users who are not logged in
    public function showProfile($name) {
        $user = User::where('name', '=', $name)->first();
        $posts = Post::all()->where('user_id', '=', $user->id);
        $aboutUser = AboutUser::where('user_id', '=', $user->id)->first();

        return view('profiles.show-profile')->with([
            'user' => $user,
            'posts' => $posts,
            'aboutUser' => $aboutUser,
        ]);
    }

    //Storing followers
    public function follow(Request $request) {
        $follower = new Follower;
        $follower->user_id = $request->user_id;
        $follower->follower_id = auth()->user()->id;
        $follower->save();

        return redirect()->route('profile.show', $request->user_name);
    }

    //Selecting following users
    public function followingUsers() {
        $user_id = auth()->user()->id;
        $followingUsers = Follower::all()->where('follower_id', '=', $user_id);
        
        return $followingUsers;
    }


    //page for following users
    public function getUsers() {
        $user_id = auth()->user()->id;

        $following = Follower::all()->where('follower_id', '=', $user_id);
        
        $selectUsers = [];
        foreach($following as $single) {
            $user = User::where('id', '=', $single->user_id)->first();
            array_push($selectUsers, $user);
        }
        
        return view('profiles.following-users')->with([
            'users' => $selectUsers,
        ]);
    }

    //page for followers
    public function getFollowers() {
        $user_id = auth()->user()->id;

        $followers = Follower::all()->where('user_id', '=', $user_id);

        $selectFollowers = [];
        foreach($followers as $follower) {
            $follower = User::where('id', '=', $follower->follower_id)->first();
            array_push($selectFollowers, $follower);
        }

        return view('profiles.followers')->with([
            'followers' => $selectFollowers,
        ]);
    }

}





