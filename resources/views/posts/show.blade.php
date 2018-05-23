@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-9 col-md-offset-1">
        <div class="article article-background">
        <h1 class="comment"> <span>{{ $post->title }}</span> </h1>
        <p class="article-margine"> {{ $post->article }} </p>
        <h4><strong>category:<a href=" {{ route('category.show', $post->category->id) }} "> {{ $post->category->name }} </a> </strong> </h4>
        <div class="spacing-top spacing-bottom">
        <p class="form-comment"><strong>tags:</strong>
        @foreach($post->tags as $tag)
            <a href=" {{ route('tags.show', $tag->id) }} " class="tags"> {{ $tag->name }} </a>
        @endforeach
        </p></div>
        <img src="{{ asset('img/articles/post'.$post->id.'.jpg') }}" alt="">

        </div>
    </div>
    
    <!--Start of comment section-->
    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div class="mid-spacing">
            <h2><span class="comments">Leave a comment:</span></h2>
            @if(Auth::guard('admin')->check())
            <form action=" {{ route('comments.store') }} " method="POST" class="form-group">
                {{ csrf_field() }}

                <input type="hidden" name="user_id" value=1>
                <input type="hidden" name="post_slug" value={{ $post->slug }}>
                <input type="hidden" name="post_id" value={{ $post->id }}>
                <textarea name="comment" rows="5" class="form-control"></textarea>
                <button class="btn btn-primary spacing-top">Comment</button>
            </form>
            @endif
            

            @if(Auth::guard('web')->check())
            <form action=" {{ route('comments.store') }} " method="POST" class="form-group">
                {{ csrf_field() }}

            <input type="hidden" name="user_id" value=2>
            <input type="hidden" name="post_slug" value={{ $post->slug }}>
            <input type="hidden" name="post_id" value={{ $post->id }}>
                <textarea name="comment" rows="5" class="form-control"></textarea>
                <button class="btn btn-primary spacing-top">Comment</button>
            </form>
            @endif

            @if(!Auth::guard('web')->check() && !Auth::guard('admin')->check())
                <h3><span class="comments">Log In in order to comment!</span></h3>
            @endif

            @foreach($post->comments as $comment)
                <div class="comment">
                <p> {{ $comment->comment }} </p>
                <p><strong> {{ $comment->username }} </strong></p>
                
                @if(Auth::guard('web')->check() || Auth::guard('admin')->check())
                @if(Auth::guard('web')->id() == $comment->user_id || Auth::guard('admin')->check())
                
                <a href="" class="btn btn-primary button-comment">Edit</a>

                <form action=" {{ route('comments.destroy', $comment->id) }} " method="POST" class="form-comment">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <input type="hidden" name="post_slug" value={{ $post->slug }}>
                    <button class="btn btn-danger">Delete</button>
                </form>
                
                @endif
                @endif
                </div>
            @endforeach
            </div><!--end of comment section-->
        </div>
    </div>
</div>

@endsection




