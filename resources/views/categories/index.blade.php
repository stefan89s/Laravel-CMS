@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-9 col-md-offset-1">
        <h1>All Categories For Users Posts</h1>
        <div class="row">
            <div class="col-md-8">
                @foreach($categories as $category)
                <div class="row">
                    <div class="col-md-3">
                        <h2><a href=" {{ route('category.show', $category->id) }} "> {{ $category->name }} </a></h2>
                    </div>
                    <div class="col-md-3">
                        <h2><a href=" {{ route('category.show', $category->id) }} " class="btn btn-success btn-block">View Category</a></h2>
                    </div>
                    <div class="col-md-3">
                        <h2><a href=" {{ route('category.edit', $category->id) }} " class="btn btn-primary btn-block">Edit Category</a></h2>
                    </div>
                    <div class="col-md-3">
                        <h2><a href=" {{ route('category.delete', $category->id) }} " class="btn btn-danger btn-block">Delete Category</a></h2>
                    </div>
                </div>     
                @endforeach
            </div>
            <div class="col-md-3 col-md-offset-1">
                <h2><a href=" {{ route('category.create') }} " class="btn btn-primary">Create New Category</a></h2>
            </div>
        </div>
    </div>
</div>

@endsection




