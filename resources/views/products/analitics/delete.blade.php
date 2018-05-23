@extends('layouts.app')

@section('content')

<h2> Arou you sure you want to delete <strong> {{ $product->name }} </strong> </h2>

<form action=" {{ route('shop.destroy', $product->id) }} " method="POST" class="form-group">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <button class="btn btn-danger">Delete</button>
</form>

@endsection




