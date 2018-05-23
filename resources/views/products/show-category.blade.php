@extends('layouts.comerce')

@section('extra-css')

@endsection

@section('content')

<div class="breadcrumbs">
    <div class="container">
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Shop</span>
    </div>
</div> <!-- end breadcrumbs -->

<h1 class="stylish-heading mid-spacing2 spacing-top-minor"> {{ $category->name }} </h1>

<div class="featured-section">
    <div class="container">
        
        <div class="products text-center">

            @foreach ($category->products as $product)
            <div class="product">
                <a href=" {{ route('shop.show', $product->slug) }} "><img src="{{ asset('img/products/laptop-'.$product->id.'.jpg') }}" alt="product"></a>
                <a href=" {{ route('shop.show', $product->slug) }} "><div class="product-name">{{ $product->name }}</div></a>
                <div class="product-price">{{ number_format($product->price, 2,",",".") }}</div>
            </div>
            @endforeach
            
        </div> <!-- end products -->

    </div> <!-- end container -->
</div>

@endsection




