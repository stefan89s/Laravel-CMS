@extends('layouts.app')

@section('content')

<h1> <span class="comments"> Categories For Products </span></h1>

@foreach($categories as $category)
<div class="row"><!--Start of categories-->
    <h2><strong> <span class="comments"> {{ $category->name }} </span></strong> <span class="float-right"><a href=" {{ route('product-categories.edit', $category->id) }} "><button class="btn btn-primary">Edit Category</button></a></span> </h2>
    
    <div class="row">
    @foreach($category->products as $product)
    <div class="col-md-3">
        <div class="product categories spacing-top">
        <div class="product-image">
        <img  class="profile-picture" src="{{ asset('img/products/laptop-'.$product->id.'.jpg') }}" alt="product">
        </div>
        <h3>Product: {{ $product->name }} </h3>
        </div>
    </div>
    @endforeach 
    </div>
</div><!-- The end of categories -->
@endforeach


@endsection




