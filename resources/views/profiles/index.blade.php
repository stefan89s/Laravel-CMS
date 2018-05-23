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
        <h2><strong> {{ auth()->user()->name }} </strong></h2>
        <p> {{ $aboutUser }} </p>
        <form action=" {{ route('aboutme') }} " method="POST" class="form-group">
            {{ csrf_field() }}

            <textarea name="about_me" id="" cols="30" rows="10" class="form-control"></textarea>
            <button class="btn btn-primary">Upload</button>
        </form>
    </div>
    <div class="col-md-2">

    </div>
</div>

@endsection



