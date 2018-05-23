@extends('layouts.app')

@section('content')

<a href=" {{ route('news-category.index') }} " class="btn btn-primary">Back</a>

<div class="row">
    <div class="col-md-6">
        <h1>Create New Category</h1>
        <form action="{{ route('news-category.store') }}" method="POST" class="form-group">
            {{ csrf_field() }}

            <input type="text" name="category" class="form-control">
            <button class="btn btn-success btn-block">Create</button>
        </form>
    </div>
</div>

@endsection



