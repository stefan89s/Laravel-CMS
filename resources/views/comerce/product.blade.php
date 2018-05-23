@extends('layouts.comerce')

@section('title', $product->name)

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="/">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <a href="{{ route('shop.index') }}">Shop</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span> {{ $product->name }} </span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="">
        <div class="row major-spacing-top major-spacing-bottom">
        <div class="col-md-7 col-md-offset-2">
        <div class="product-section-image">    
            <div class="row">

            <div class="col-md-6 major-spacing-top">
                <img src="{{ asset('img/products/laptop-'.$product->id.'.jpg') }}" alt="product">
                <h1 class="product-section-title">{{ $product->name }}</h1>
            </div>

            <div class="col-md-6">
            <div class="product-section-information">
            
            <div class="product-section-subtitle spacing-bottom"></div>

            <p class="spacing-top">
                {{ $product->description }}
            </p>

            <div class="product-section-price">{{ number_format($product->price, 2,",",".") }}</div>
            <p>&nbsp;</p>
            
            <form action=" {{ route('cart.store') }} " method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button name="product-button" type="submit" class="button button-plain">Add to Cart</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>

    </div>
</div> <!-- end product-section -->

    

@endsection
