@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-7 col-md-offset-1">
        <h1><strong><span class="comments">All Articles:</span></strong></h1>
    </div>
    
        <!--test for searching users-->
        <form action=" {{ route('searched-posts') }} "  class="form-group">
            <div class="col-md-2 search-field">
            <input type="text" name="searchposts" class="form-control" placeholder="Search...">
            </div>
            <div class="col-md-1 search-field">
            <button class="btn btn-primary">Find Posts</button>
            </div>
        </form>
    
</div>

<div class="row">
    
    <div class="col-md-9 col-md-offset-1 color-back">
    
    <div class="row"><!--Start of the article section-->
        <div class="col-md-7"><!--Start of the article box-->  

        @foreach($posts as $post)
        <div class="article">
            <div class="row spacing-bottom">
                <div class="col-md-8"><!--Start of the title-->
                    <h2><a href=" {{ route('posts.show', $post->slug) }} "> {{ substr($post->title, 0, 50) }} {{ strlen($post->title) > 50 ? "..." : "" }} </a></h2> 
                </div><!--End of the tittle-->

                <div class="col-md-4 spacing-top"><!--Start of the image-->
                    <img src="{{ asset('img/articles/post'.$post->id.'.jpg') }}" alt="">
                </div><!--End of the image-->
            </div>
            <div class="row"><!--Start of user and article information-->
                <div class="col-md-6">
                    <p>Author: <strong> <a href=" {{ route('profile.show',  $post->user->name) }} "> {{ $post->user->name }} </a> </strong></p>
                </div>
                <div class="col-md-3 col-md-offset-3">
                <p><strong> {{ date('H:i:s', strtotime($post->created_at)) }} <br> {{ date('d M Y', strtotime($post->created_at)) }} </strong></p> 
                </div>
            </div><!--End of user and article information-->
        </div>
        @endforeach

        </div><!--End of article box-->

        <div class="col-md-4 col-md-offset-1"><!--Category section-->
            <h1 class="comments">Find By Category:</h1>
            @foreach($categories as $category)
            <div class="article">
                <h2 class="align"><a class="align" href=" {{ route('category.show', $category->id) }} "> {{ $category->name }}:  {{ count($category->posts) }} posts</a></h2>
            </div>
            @endforeach
        </div><!--End of the category section-->
    </div><!--End of the articles section-->
    </div>
</div>

@endsection