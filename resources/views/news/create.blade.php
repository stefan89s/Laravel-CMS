@extends('layouts.app')

@section('style')

<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">

@endsection

@section('content')

<div class="row">
    <div class="col-md-10 ">
        <a href=" {{ route('news.index') }} " class="btn btn-primary">Back</a>
        <h1>Create News</h1>
        <div class="col-md-offset-1">
        <form action=" {{ route('news.store') }} " method="POST" class="form-group">
            {{ csrf_field() }}

            <h3>Select Category</h3>
            <select name="category" class="form-control">
                @foreach($categories as $category)
                    <option value=" {{ $category->id }} "> {{ $category->name }} </option>
                @endforeach
            </select><br>

            <h3>Select Tags</h3>
            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"> {{ $tag->name }} </option>
                @endforeach
            </select><br><br>

            <input type="text" name="slug" class="form-control" placeholder="Slug"><br>
            
            <input type="text" name="title" class="form-control" placeholder="Title"><br>
            <textarea name="article" cols="30" rows="10" class="form-control" placeholder="Write The News"></textarea><br>
            <button class="btn btn-success btn-block">Publish</button>
        </form>
    </div>
    </div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('js/select2.min.js') }}"></script>

<script type="text/javascript">
    $('.select2-multi').select2();
</script>

@endsection


