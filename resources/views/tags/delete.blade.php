@extends('layouts.app')

@section('content')

<div class="row">
    <h1>Are you sure you want to delete the tag: <strong>{{ $tag->name }}</strong></h1><br>
    <div class="col-md-8">
        <a href=" {{ route('tags.index') }} " class="btn btn-success btn-block btn-lg">Cancel</a><br>

        <form action=" {{ route('tags.destroy', $tag->id) }} " method="POST" class="form-group">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger btn-block btn-lg">Delete</button>
        </form>
    </div>
</div>

@endsection