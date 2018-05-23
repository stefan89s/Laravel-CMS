@extends('layouts.app')

@section('content')

<h1 class="mid-spacing">Category: <strong> <span class="comments">{{ $category->name }} </strong></span></h1>
<div class="row mid-spacing">
    
    <h1><span class="comment">All Articles:</span></h1>
    @foreach($category->posts as $post)
        <div class="col-md-3 category-post">
        <h2><a href=" {{ route('posts.show', $post->slug) }} "> {{ substr($post->title, 0, 50)  }} {{ strlen($post->title) > 50 ? "..." : "" }} </a></h2>
        <p>{{ substr($post->article, 0, 130)  }} {{ strlen($post->article) > 50 ? "..." : "" }}</p>
        <p><strong>author:</strong> <a href=" {{ route('profile.show',  $post->user->name) }} ">{{ $post->user->name }} </a> </p>
        </div>
    @endforeach
    
</div>

@endsection