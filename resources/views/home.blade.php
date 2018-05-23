@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <h2>Dashboard</h2>
            <div class="row">
                <div class="col-md-3">
                    <h2>Your Articles</h2>
                </div>
                <div class="col-md-2 col-md-offset-5">
                    <h2><a href=" {{ route('posts.create') }} " class="btn btn-primary btn-lg">Create New Article</a></h2>
                    
                </div>
                <div class="row">
    
                    <div class="col-md-7">
                    
                    @foreach($posts as $post)
                    <div class="row">
                        <div class="col-md-6">  
                            <h4><a href=" {{ route('posts.show', $post->slug) }} "> {{ substr($post->title, 0, 30) }} {{ strlen($post->title) > 50 ? "..." : "" }}  </a></h4> 
                        </div>
                        <div class="col-md-2">
                            <h4><a href=" {{ route('posts.show', $post->slug) }} " class="btn btn-success btn-block btn-sm">View</a></h4>
                        </div>
                        <div class="col-md-2">
                            <h4><a href=" {{ route('posts.edit', $post->slug) }} " class="btn btn-primary btn-block btn-sm">Edit</a></h4>
                        </div>
                        <div class="col-md-2">
                            <h4><a href=" {{ route('posts.delete', $post->slug) }} " class="btn btn-danger btn-block btn-sm">Delete</a></h4>
                        </div>
                    </div> 
                    @endforeach
                    <div class="align-links">{{ $posts->links() }}</div>

                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <h2>Your Cart: {{ count($carts) }} </h2>
                        <div class="row">
                            <div class="col-md-12">
                                <h2>You are following <a href=" {{ route('following-users') }} ">{{ count($followingUsers) }}</a> users</h2>
                                <h2>Followers: <a href=" {{ route('followers') }} ">{{ count($followers) }}</a> </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
