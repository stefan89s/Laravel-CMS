@extends('layouts.app')

@section('content')

<?php $i = 0; $j = 0; ?>
<div class="row">
@foreach($products['keysData'] as $product)

<div class="col-md-3">

<div class="product spacing-top">
<div class="product-image">
<img src=" {{ asset('img/products/laptop-' . $product->id . '.jpg') }} " alt="">
</div>

<h2><a href=" {{ route('show-product', $product->id) }} "> {{ $product->name }} </a></h2>


    @foreach($products['countProducts'] as $id)

        @if($products['countProducts'][$i] === $id)

        <h3>Products in cart: {{ $id }}</h3>

        <?php break; ?> 
        
        @endif
    
    @endforeach

    <?php $i++;?>
</div>
</div>

@endforeach
</div>

@endsection



