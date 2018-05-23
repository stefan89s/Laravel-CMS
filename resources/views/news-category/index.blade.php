@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h1><strong>All Categories:</strong></h1>
    </div>
    <div class="col-md-3">
            <h1><a href="{{ route('news-category.create') }}" class="btn btn-primary btn-block btn-lg">Create New Category</a></h1>
    </div>
</div>

<div class="row">
    
    <div class="col-md-9 col-md-offset-1">
    
    @foreach($categories as $category)
    <div class="row">
        <div class="col-md-3">  
            <h2><a href=" {{ route('news-category.show', $category->id) }} "> {{ $category->name }} </a></h2> 
        </div>
        <div class="col-md-3">
            <h2><a href=" {{ route('news-category.show', $category->id) }} " class="btn btn-success btn-block">View</a></h2>
        </div>
        <div class="col-md-3">
            <h2><a href=" {{ route('news-category.edit', $category->id) }} " class="btn btn-primary btn-block">Edit Category</a></h2>
        </div>
        <div class="col-md-3">
            <h1><a href=" {{ route('news-category.delete', $category->id) }} " class="btn btn-danger btn-block">Delete Category</a></h1>
        </div>
    </div>
    @endforeach
    
    </div>
</div>



@endsection



