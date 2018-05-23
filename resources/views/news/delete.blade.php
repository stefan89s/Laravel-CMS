@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h1>Are you sure you want to delete the article: <strong> {{ $article->title }} </strong></h1>
        <a href=" {{ route('news.index') }} " class="btn btn-success btn-block btn-lg">Cancel</a><br>
        <form action=" {{ route('news.destroy', $article->slug) }} " class="form-group" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            
            <button class="btn btn-danger btn-block btn-lg">Delete</button>
        </form>
    </div>
</div>

@endsection




