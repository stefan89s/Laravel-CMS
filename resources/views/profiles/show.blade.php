@extends('layouts.app')

@section('content')

<div class="row"><!-- Begining of the page -->
    <div class="col-md-4"><!-- Start of the article section -->
        <h1><span class="comments">My Articles:</span></h1>
        @foreach($posts as $post)<!-- Articles -->
            <h3 class="comment"><a href=" {{ route('posts.show', $post->slug) }} "> {{ substr($post->title, 0, 50) }} {{ strlen($post->title) > 50 ? "..." : ""  }} </a></h3>
        @endforeach
        {{ $posts->links() }}<!-- Pagination -->
    </div><!-- The end of the article section -->

    <div class="col-md-5 color-back"><!-- Start of the profile section-->

        <!--Profile picture-->
        <div class="row">
            <div class="col-md-6 row-50"><!-- Profile image -->
                <img src="{{ asset('img/profile-images/profile-'.$user->name.'.jpg') }}" class="profile-picture spacing-top">
            </div><!-- End of profile image -->
            <div class="col-md-5 spacing-top"><!-- Username -->
                <h2 class="form-comment"><strong> {{ $user->name }} </strong></h2>
            </div><!-- End of Username -->  
        </div>
        @if(Auth::guard('web')->check())
        @if(auth()->user()->id == $user->id)
        <!-- Upload profile image -->
        <form action=" {{ route('profile-image') }} " method="POST" enctype="multipart/form-data" class="form-group spacing-top">
            {{ csrf_field() }}

            <input type='file' name='profile-image' class="form-control">
            <button class="btn btn-success">Upload Image</button>
        </form>
        
        @endif
        @endif
        <!-- Displaying the information about the users -->
        @if($aboutUser)
        <h3>About Me:</h3>
        <p>  {{ $aboutUser->about_user }} </p>
        @endif 

        <!-- About user button -->
        @if(Auth::guard('web')->check())
        @if(auth()->user()->id == $user->id)
        <form action=" {{ route('aboutme') }} " method="POST" class="form-group">
            {{ csrf_field() }}

            <textarea name="about_me" id="" cols="30" rows="5" class="form-control profile-textarea" placeholder="Upload Your Info..."></textarea>
            <button class="btn btn-primary spacing-top">Upload</button>
        </form>
        @endif
        @endif

    </div><!-- The end of the profile section -->

    <div class="col-md-2"><!-- The right section -->
        @if(Auth::guard('web')->check() && auth()->user()->id != $user->id)
        @if(!in_array($user->id, $followingUsers))
        <!-- The Following button -->
        <form action="{{ route('follow') }}" method="POST">
            {{ csrf_field() }}

            <input type="hidden" name="user_id" value=" {{ $user->id }} ">
            <input type="hidden" name="user_name" value=" {{ $user->name }} ">
            <button class="btn btn-success">Follow</button>
        </form>
        @else
        <!-- The Unfollowing button -->
        <button class="btn btn-primary">Unfollow</button>
        @endif
        @elseif(!Auth::guard('web')->check())
        <h4 class="comments"><strong>Log In or Sing Up in order to follow</strong></h4>
        @else
        <h2 class="success"><strong>You are Logged In</strong></h2>
        @endif

        <h3>See other authors:</h3><!-- Section for the random users -->
        @foreach($randomUsers as $user)
        <div class="row">
            <div class="col-md-5"><!-- The names of the random users -->
                <p class="spacing-top-minor"><strong><a href=" {{ route('profile.show', $user->name) }} "> {{ $user->name }} </a></strong></p>
            </div>
            <div class="col-md-5 row-random-profile"><!-- The images of the random users -->
               <img src="{{ asset('img/profile-images/profile-'.$user->name.'.jpg') }}" class="profile-picture-rand" alt="">              
            </div>
        </div><!-- The end of the sectoin for the random users -->
             
        @endforeach

    </div><!-- The end of the right section -->
</div><!--The end of the page-->

@endsection



