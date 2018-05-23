@extends('layouts.app')

@section('content')

<h1> {{ $news->title }} </h1>
<p> {{ $news->article }} </p>
<p>category: <strong>{{ $news->newsCategory->name }} </strong> </p>
@foreach($news->newsTags as $tag)

<a href=" {{ route('news-tags.show', $tag->id) }} "> {{ $tag->name }} </a>

@endforeach

@endsection




