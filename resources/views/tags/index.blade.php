@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-1">
        <h1>Your Tags:</h1>
            @foreach($tags as $tag)
            <tr>
                <div class="row">
                    <div class="col-md-6">
                        <td>
                            <h2><a href=" {{ route('tags.show', $tag->id) }} "> {{ $tag->name }} </a></h2>
                        </td> 
                    </div>
                    <div class="col-md-2">
                        <td>
                            <h2><a href=" {{ route('tags.show', $tag->id) }}" class="btn btn-success btn-block">View Tag</a></h2>
                        </td>
                    </div> 
                    <div class="col-md-2">   
                        <td>
                        <h2><a href=" {{ route('tags.edit', $tag->id) }} " class="btn btn-primary btn-block">Edit Tag</a></h2> 
                        </td>     
                    </div>
                    <div class="col-md-2">   
                        <td>
                        <h2><a href=" {{ route('tags.delete', $tag->id) }} " class="btn btn-danger btn-block">Delete Tag</a></h2> 
                        </td>     
                    </div>
                </div>
            </tr>
            @endforeach
    </div>
    <div class="col-md-2">
        <h1><a href=" {{ route('tags.create') }} " class="btn btn-primary">Create New Tag</a></h1>
    </div>
</div>

@endsection