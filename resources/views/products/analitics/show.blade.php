@extends('layouts.app')

@section('content')

<div class="row spacing-top">

<div class="col-md-6 mid-spacing">
<div class="show-product">
<div class="">
    <img class="show-product-image" src=" {{ asset('img/products/laptop-' . $product->id . '.jpg') }} " alt="">
</div>
<h2> {{ $product->name }} </h2>
</div>
</div>

<div class="col-md-3">
    <div class="row">
    <h2 class="comments">Price: {{ $product->price }} </h2>
    <h2 class="comments">In the cart: {{ count($carts) }} </h2>
    <h2 class="comments">Category: {{ $product->product_category->name }} </h2>
    <h2 class="comments"><a href=" {{ route('shop.show', $product->slug) }} ">Show in the shop</a></h2>
    </div>
    <div class="row">
        <h1><a href=" {{ route('shop.edit', $product->id) }} " class="btn btn-primary btn-block">Edit</a></h1>
        <h1><a href=" {{ route('delete-product', $product->id) }} " class="btn btn-danger btn-block">Delete</a></h1>
    </div>
</div>


</div>

@endsection




