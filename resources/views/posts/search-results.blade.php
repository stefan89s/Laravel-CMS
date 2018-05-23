@extends('layouts.app')

@section('content')

<h1>Results: {{ count($posts) }}</h1>

<div class="row">
    <div class="col-md-6">
        @foreach($posts as $post)

        <div class="comment">
            <h2><a href=" {{ route('posts.show', $post->slug) }} "> {{ $post->title }} </a></h2>
            <p><strong>Category:</strong><a href=" {{ route('category.show', $post->category->id) }} "> {{ $post->category->name }} </a></p>
        </div>

        @endforeach
    </div>
    <div class="col-md-4 col-md-offset-1">
        <h1>Find By Category:</h1>
        <div class="">
        @foreach($categories as $category)
            <h2 class="comment"><a href=" {{ route('category.show', $category->id) }} "> {{ $category->name }} </a></h2>
        @endforeach
        </div>
    </div>
</div>

@endsection



