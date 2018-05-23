@extends('layouts.app')

@section('content')

<a href=" {{ route('news-category.index') }} " class="btn btn-primary">Back</a>

<div class="row">
        <div class="col-md-6">
            <h1>Edit Category: <strong> {{ $category->name }} </strong></h1>
            <form action=" {{ route('news-category.update', $category->id) }} " method="POST" class="form-group">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
    
                <input type="text" name="category" value=" {{ $category->name }} " class="form-control">
                <button class="btn btn-success btn-block">Edit Category</button>
            </form>
        </div>
    </div>

@endsection



