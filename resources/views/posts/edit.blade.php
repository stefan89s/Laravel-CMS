@extends('layouts.app')

@section('style')

<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">

@endsection

@section('content')

<a href=" {{ route('home') }} " class="btn btn-success">Cancel</a>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h1>Edit The Article</h1>

        <form action=" {{ route('posts.update', $post->slug) }} " method="POST" class="form-group" enctype = 'multipart/form-data'>
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <h3>Chose Category:</h3>
            <select name="category" class="form-control">
                <option value=" {{ $post->category->id }} "> {{ $post->category->name }} </option>
                @foreach($categories as $category)
                    @if($post->category->id != $category->id)
                    <option value=" {{ $category->id }} "> {{ $category->name }} </option>
                    @endif
                @endforeach
            </select>

            <h3>Select Tags:</h3>
            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                    <option value=" {{ $tag->id }} "> {{ $tag->name }} </option>
                @endforeach
            </select>

            <h3>Slug:</h3>
            <input type="text" name="slug" value=" {{ $post->slug }} " class="form-control">

            <h3>Title:</h3>
            <input type="text" name="title" value=" {{ $post->title }} " class="form-control">

            <h3>Article:</h3>
            <textarea name="article" cols="30" rows="10" class="form-control"> {{ $post->article }} </textarea>

            <input type = 'file' name = 'file'>

            <button class="btn btn-success btn-block">Save Changes</button>
        </form>
    </div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('js/select2.min.js') }}"></script>

<script type="text/javascript">
    $('.select2-multi').select2();
</script>

@endsection




