@extends('layouts.app')

@section('content')

<div class="row"><!-- Creating fields for the new product -->
    <form action=" {{ route('shop.store') }} " method="POST" class="form-group" enctype="multipart/form-data">
        {{ csrf_field() }}

        <h3>The name of the product:</h3>
        <input type="text" name="name" class="form-control">
        <h3>Slug:</h3>
        <input type="text" name="slug" class="form-control">
        <h3>Details:</h3>
        <input type="text" name="details" class="form-control">
        <h3>Price:</h3>
        <input type="text" name="price" class="form-control">
        <h3>Select Category:</h3>
        <select class="form-control" name="category">
            @foreach($categories as $category)
                <option value=" {{ $category->id }} "> {{ $category->name }} </option>
            @endforeach
        </select>
        <h3>Description:</h3>
        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
        
        <input type="file" name="product-image" class="form-control">

        <button class="btn btn-success btn-block">Create New Product</button>
    </form>
</div><!-- The end of the field for the new product -->

@endsection

@section('scripts')

@endsection




