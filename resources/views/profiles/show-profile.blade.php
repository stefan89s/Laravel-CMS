@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-3 col-md-offset-1">
        <h1>My Articles:</h1>
        @foreach($posts as $post)
        <h3><a href=" {{ route('posts.show', $post->slug) }} "> {{ substr($post->title, 0, 50) }} {{ strlen($post->title) > 50 ? "..." : ""  }} </a></h3>
        @endforeach
    </div>
    <div class="col-md-4">
        <h1>Name:</h1>
        <h2><strong> {{ $user->name }} </strong></h2>
        <p> @if(count($aboutUser) > 0) {{ $aboutUser->about_user }} @endif </p>
    </div>
</div>

@endsection