@extends('layouts.app')

@section('content')

<div class="row success">

<div class="col-md-6">
    <h1 class="form-comment"><strong>Admin Dashboard</strong></h1>
</div>

</div>

<div class="row"><!-- Start of Category section -->
    <h2 class="success"><strong>Manage News:</strong></h2>
    <div class="col-md-3"><!--Latest news section -->
        <h4 class="success"><strong>Latest news: </strong></h4>
        @foreach($news as $single)
        <p><strong><a href=" {{ route('news.show', $single->slug) }} "> {{ substr($single->title, 0, 30)  }} {{ strlen($single->title) > 30 ? "..." : "" }} </a></strong></p>
        @endforeach
        <a href=" {{ route('news.index') }} "><strong> See All . . . </strong></a>
    </div><!-- The end of the latest news section -->
    @foreach($newsCategories as $category)
    <div class="col-md-3"><!-- News by categories -->
        <h4 class="success"><strong>Category: <a href=" {{ route('news-category.show', $category->id) }} " class="success">{{ $category->name }} </a> </strong></h4>
        <div class="news-section">  
        <?php $i = 0; ?>  
        @foreach($category->news as $news)
        @if($i < 5)
            <p><strong><a href=" {{ route('news.show', $news->slug) }} "> {{ substr($news->title, 0, 30)  }} {{ strlen($news->title) > 30 ? "..." : "" }} </a></strong></p>
        <?php $i++; ?>
        
        @endif 
        @endforeach
        <a href=" {{ route('news-category.show', $category->id) }} "><strong> See All . . . </strong></a>
        </div>
    </div><!-- The end of the news by categories -->    
    @endforeach
</div><!-- End of Category section -->

<div class="row spacing-top"><!-- News options -->
    <div class="col-md-4">
        <a href=" {{ route('news.index') }} " class="btn btn-primary btn-block">Menage News</a>
    </div>
    <div class="col-md-4">
        <a href=" {{ route('news-category.index') }} " class="btn btn-primary btn-block">Manage Categories</a>
    </div>
    <div class="col-md-4">
        <a href=" {{ route('news-tags.index') }} " class="btn btn-primary btn-block">Manage Tags</a>
    </div>
</div><!-- The end of news -->

<div class="row"><!-- Menage users section -->

    <h2 class="success"><strong>Manage Users/Authors:</strong></h2>
    <div class="col-md-3"><!-- All users -->
        <h3 class="comments2"><strong>Authors:</strong></h3>
        @foreach($users as $user)
            <div class="row"><!-- Username -->
                <div class="col-md-6">
                    <h4><a href=" {{ route('profile.show', $user->name) }} "> {{ $user->name }} </a></h4>
                </div>
                <div class="col-md-4 row-random-profile"><!-- Image -->
                   <img src=" {{ asset('img/profile-images/profile-'.$user->name.'.jpg') }} " class="profile-picture-rand" alt=""> 
                </div>
            </div>
        @endforeach
        <div class="spacing-top">
        <a href="  " class="minor-left"><strong> See All . . . </strong></a>
        </div>
    </div><!-- The end of the users section -->

    <div class="col-md-3"><!-- Articles from authors by category -->
        <h3 class="comments2"><strong>See articles from authors by category:</strong></h3>
        @foreach($categories as $category)
            <h4 class="comments3"><a href=" {{ route('category.show', $category->id) }} "> {{ $category->name }} </a></h4>
        @endforeach
        <h4 class="minor-left"><a href=" {{ route('category.index') }} "> See all... </a></h4>
    </div><!-- The end of the articles by category -->

    <div class="col-md-3"><!-- Manage categories for authors -->
        <h4 class="spacing-top comments2">Manage Categories for Authors:</h4>
        <a href=" {{ route('category.index') }} "><button class="btn btn-primary btn-block"> Categories </button></a>
        <?php $i = 0; ?>
        <h4 class="spacing-top"><strong>The most popular categories:</strong></h4>
        @foreach($popular as $pop)
        @if($i < 3)
            <h4 class="comments3"><a href=" {{ route('category.show', $pop->id) }} ">{{ $pop->name }} </a> <span class="float-right"> {{ count($pop->posts) }} posts </span></h4>
            
        @endif
        <?php $i++; ?>
        @endforeach
        
    </div><!-- The end of cateogiries for authors -->

    <div class="col-md-3 spacing-top"><!--Latest articles from authors -->
        <h4 class="success"><strong>Latest articles: </strong></h4>
        @foreach($articles as $article)
        <p class="minor-left"><strong><a href=" {{ route('posts.show', $article->slug) }} "> {{ substr($article->title, 0, 30)  }} {{ strlen($article->title) > 30 ? "..." : "" }} </a></strong></p>
        @endforeach
        <a class="minor-left" href=" {{ route('posts.index') }} "><strong> See All . . . </strong></a>
    </div><!-- The end of latest articles from authors -->
    
</div><!-- The end of the section for users -->

<div class="row"><!-- Ecomerce -->

    <h2 class="success"><strong> Ecomerce </strong></h2>

    <div class="row">

        <div class="col-md-3"><!--Manage products-->
            <h3 class="success"><strong>Manage Products:</strong></h3>
            <h4 class="comments2"><a href=" {{ route('all-products') }} ">See All Products...</a></h4>
            <h4 class="comments2"><a href=" {{ route('product-categories.index') }} ">See All Categories...</a></h4>
            <a href=" {{ route('shop.create') }} "> <button class="btn btn-success btn-block spacing-top"> Create New Product </button></a>
            <a href=" {{ route('product-categories.create') }} "> <button class="btn btn-success btn-block spacing-top"> Create New Category </button></a>
        </div><!-- The end of manage products -->

        <div class="col-md-6"><!-- Analitics -->
        <div class="row">
        <h3 class="success align"><strong>Analitics:</strong></h3>
        </div>
        <div class="row">
        <div class="">
        <div class="col-md-6">
            
            <h4 class="comments2"><a href=" {{ route('most-wanted-products') }} ">See Most Wanted Products...</a></h4>
            <h4 class="comments2"><a href=" {{ route('wanted-by-category') }} ">See Most Wanted Products By Category</a></h4> 
        </div>

        <div class="col-md-5 minor-left product-in-cart">
            <h3>Products in the cart: <a href=" {{ route('allCartProducts') }} "> {{ count($carts) }} </a></h3>
        </div>

        </div>
        </div>
        </div><!-- The end of analitics -->

        <div class="col-md-3">
            <h3 class="success"><strong>See Public Disply</strong></h3>
            <div class="spacing-top">
            <a href=" {{ route('landing.index') }} " class="btn btn-primary btn-block">Landing Page</a>
            <a href="" class="btn btn-primary btn-block">Shop Page</a>
            <a href=" {{ route('product-categories.index') }} " class="btn btn-primary btn-block">Products By Category</a>
            </div>
        </div>
        
    </div>

</div><!-- The end of ecomerce -->

<div class="row">
    <h1 class="success"></h1>
</div>

@endsection
