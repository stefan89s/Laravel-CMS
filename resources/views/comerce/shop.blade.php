@extends('layouts.comerce')

@section('title', 'Products')

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

<div class="col-md-2 major-spacing-top col-md-offset-1">
    <div class="sidebar">
        <h3>By Category</h3>
        <ul>
            @foreach($categories as $category)
            <li><a href=" {{ route('product-categories.show', $category->id) }} "> {{ $category->name }} </a></li>
            @endforeach
        </ul>

    </div> <!-- end sidebar -->
</div>

<div class="featured-section">

    <div class="container">
        
        <div class="products text-center">

            @foreach ($products as $product)
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
