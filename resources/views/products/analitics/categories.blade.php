@extends('layouts.app')

@section('content')

@foreach($categories as $category)
    <div class="row spacing-top">
    <h1 class="major-spacing-bottom"><span class="comments"><strong> {{ $category->name }} </strong></span></h1>
    @foreach($products as $product)  
        @if($category->id == $product->product_category_id)
        <div class="col-md-3">
            <div class="product">
            <img class="profile-picture" src="{{ asset('img/products/laptop-'.$product->id.'.jpg') }}" alt="product">
            <h3> <a href=" {{ route('show-product', $product->id) }} "> {{ $product->name }} </a></h3>
            </div>
        </div>   
        @endif 
    @endforeach
    </div>
@endforeach



@endsection




