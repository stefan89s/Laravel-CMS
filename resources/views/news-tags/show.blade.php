@extends('layouts.app')

@section('content')

<h1>Tag: <strong> {{ $tag->name }} </strong></h1>
<h1>All News</h1>

@foreach($tag->news as $news)

<h2><a href=" {{ route('news-tags.show', $news->slug) }} "> {{ $news->title }} </a></h2>

@endforeach

@endsection


