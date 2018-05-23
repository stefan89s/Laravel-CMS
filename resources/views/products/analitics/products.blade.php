@extends('layouts.app')

@section('content')

<h1 class="spacing-bottom"> <span class="comments">Most Wanted Products:</span></h1>

<div class="row">
@foreach($products as $product)

<div class="col-md-3 spacing-top">
<div class="product">

<div class="product-image">
<img class="profile-picture" src="{{ asset('img/products/laptop-'.$product->id.'.jpg') }}" alt="product">
</div>
<h2><a href=" {{ route('show-product', $product->id) }} "> {{ $product->name }} </a></h2>
<h4>Category: <a href=" {{ route('product-categories.index') }} "><strong>{{ $product->product_category->name }}</strong></a></h4>

</div>

</div>

@endforeach
</div>

@endsection




