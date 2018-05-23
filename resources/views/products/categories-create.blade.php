@extends('layouts.app')

@section('content')

<h1>Create New Category:</h1>

<div class="row spacing-top">
    <div class="col-md-4 col-md-offset-1">
    <h2>Category:</h2>
    <form action=" {{ route('product-categories.store') }} " method="POST" class="form-group">
        {{ csrf_field() }}
        
        <input type="text" name="category" class="form-control">
        <button class="btn btn-success btn-block spacing-top">Create Category</button>
    </form>    
    </div>
</div>



@endsection




