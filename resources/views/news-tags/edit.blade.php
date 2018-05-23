@extends('layouts.app')

@section('content')

<div class="row">
    <a href=" {{ route('news-tags.index') }} " class="btn btn-primary">Back</a>
    <h1>Edit Tag: <strong> {{ $tag->name }} </strong></h1>
    <div class="col-md-6 col-md-offset-1">
        <form action=" {{ route('news-tags.update', $tag->id) }} " method="POST" class="form-group">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            
            <h2><strong>Name:</strong></h2>
            <input type="text" name="tag" value=" {{ $tag->name }} " class="form-control"><br>
            <button class="btn btn-success btn-block">Edit Tag</button>
        </form>
    </div>
</div>

@endsection


