@extends('layouts.app')

@section('content')

<div class="row"><!-- Creating fields for the new product -->
    <form action=" {{ route('shop.update', $product->id) }} " method="POST" class="form-group" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <h3>The name of the product:</h3>
        <input type="text" name="name" value=" {{ $product->name }} " class="form-control">
        <h3>Slug:</h3>
        <input type="text" name="slug" value=" {{ $product->slug }} " class="form-control">
        <h3>Details:</h3>
        <input type="text" name="details" value=" {{ $product->details }} " class="form-control">
        <h3>Price:</h3>
        <input type="text" name="price" value=" {{ $product->price }} " class="form-control">
        <h3>Description:</h3>
        <textarea name="description" id="" cols="30" rows="10" class="form-control"> {{ $product->description }} </textarea>
        
        <input type="file" name="product-image" class="form-control">

        <button class="btn btn-success btn-block">Edit Product</button>
    </form>
</div><!-- The end of the field for the new product -->

@endsection





