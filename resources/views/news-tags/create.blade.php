@extends('layouts.app')

@section('content')

<div class="row">
    <a href=" {{ route('news-tags.index') }} " class="btn btn-primary">Back</a>
    <h1>Create News Tag</h1>
    <div class="col-md-6 col-md-offset-1">
        <form action=" {{ route('news-tags.store') }} " method="POST" class="form-group">
            {{ csrf_field() }}
            
            <h2><strong>Name:</strong></h2>
            <input type="text" name="tag" class="form-control"><br>
            <button class="btn btn-success btn-block">Create News Tag</button>
        </form>
    </div>
</div>

@endsection



