@extends('layouts.app')

@section('content')

<h1>Edit Category:</h1>

<div class="row spacing-top">
    <div class="col-md-4 col-md-offset-1">
    <h2>Edit Category:</h2>
    <form action=" {{ route('product-categories.update', $category->id) }} " method="POST" class="form-group">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        
        <input type="text" name="category" value=" {{ $category->name }} " class="form-control">
        <button class="btn btn-success btn-block spacing-top">Edit Category</button>
    </form>    
    </div>
</div>



@endsection




