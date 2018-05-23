@extends('layouts.app')

@section('content')

<h1>Category:</h1>
<h1> {{ $category->name }} </h1>
<div class="row">
    <div class="col-md-6">
        <h1>All News:</h1>
        @foreach($category->news as $news)
            <h2><a href=" {{ route('news.edit', $news->slug) }} "> {{ $news->title }} </a></h2>
        @endforeach
    </div>
</div>

@endsection



