@extends('layouts.app')

@section('content')

@foreach($products as $product)

<h1> {{ $product->name }} </h1>
<a href=" {{ route('shop.edit', $product->id) }} "><button class="btn btn-primary">Edit</button></a>
<a href=" {{ route('delete-product', $product->id) }} " class="btn btn-danger">Delete</a>

@endforeach

@endsection




