@extends('layouts.app')

@section('content')

<div class="row">
    <h1>Are you sure you want to delete the category: <strong>{{ $category->name }}</strong></h1><br>
    <div class="col-md-8">
        <a href=" {{ route('category.index') }} " class="btn btn-success btn-block btn-lg">Cancel</a><br>

        <form action=" {{ route('category.destroy', $category->id) }} " method="POST" class="form-group">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger btn-block btn-lg">Delete</button>
        </form>
    </div>
</div>

@endsection