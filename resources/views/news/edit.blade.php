@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-10 ">
        <a href=" {{ route('news.index') }} " class="btn btn-primary">Back</a>
        <h1>Edit News</h1>
        <div class="col-md-offset-1">
        <form action=" {{ route('news.update', $news->slug) }} " method="POST" class="form-group">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <h3>Select Category</h3>
            <select name="category" class="form-control">
                <option value=" {{ $news->newsCategory->id }} ">{{ $news->newsCategory->name }}</option>
                @foreach($categories as $category)
                    @if($news->newsCategory->id != $category->id)
                    <option value=" {{ $category->id }} "> {{ $category->name }} </option>
                    @endif
                @endforeach
            </select><br>

            <input type="text" name="slug" class="form-control" value=" {{ $news->slug }} "><br>
            
            <input type="text" name="title" class="form-control" value=" {{ $news->title }} "><br>
            <textarea name="article" cols="30" rows="10" class="form-control" > {{ $news->article }} </textarea><br>
            <button class="btn btn-success btn-block">Publish</button>
        </form>
    </div>
    </div>
</div>

@endsection


