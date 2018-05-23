@extends('layouts.app')

@section('content')

<h1>Tag: <strong> {{ $tag->name }} </strong></h1>
<h1>All Posts</h1>

@foreach($tag->post as $post)

<h2><a href=" {{ route('posts.show', $post->slug) }} "> {{ $post->title }} </a></h2>

@endforeach

@endsection
