@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <h3>News Section</h3>

            <div class="panel-body">
                <strong>Manage News</strong>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <table class="table">
                        <tbody>
                            @foreach($news as $single)
                            <tr>
                                <th>
                                    <h4><a href=" {{ route('news.show', $single->slug) }} ">{{$single->title}} </a> </h4>
                                </th>
                                <th>
                                    <h4><a href=" {{ route('news.show', $single->slug) }} " class="btn btn-primary btn-sm">View News</a></h4>
                                </th>
                                <th>
                                    <h4><a href=" {{ route('news.edit', $single->slug) }} " class="btn btn-primary btn-sm">Edit News</a></h4>
                                </th>
                                <th>
                                    <h4><a href=" {{ route('news.delete', $single->slug) }} " class="btn btn-danger btn-sm">Delete News</a></h4>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="align-links"> {{ $news->links() }} </div>
                </div>
                <div class="col-md-4">
                    <a href=" {{ route('news.create') }} " class="btn btn-primary btn-block col-md-offset-2">Create News</a>
                    <div class="col-md-offset-4">
                    <h3><strong>See News By Category:</strong></h3>
                    @foreach($categories as $category)
                        <h3> <a href=" {{ route('news-category.show', $category->id) }} ">{{ $category->name }}</a> </h3>
                    @endforeach
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>

@endsection



