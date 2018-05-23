@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <div class="col-md-6">
                <h1 class="spacing-bottom"><strong><span class="comments">All News:</span></strong></h1>
                @foreach($news as $single)
                    <h2 class="news"><a href=" {{ route('news.show', $single->slug) }} "> {{ substr($single->title, 0, 75) }} {{ strlen($single->title) > 75 ? "..." : "" }} </a></h2>
                @endforeach
                <div class="align-links"> {{ $news->links() }} </div>
            </div>
            <div class="col-md-4 col-md-offset-1 major-spacing-top">
                <h2><strong>See By Category:</strong></h2>
                @foreach($categories as $category)
                    <h2><a href=" {{ route('news-category.show', $category->id) }} "> {{ $category->name }} </a></h2>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection




