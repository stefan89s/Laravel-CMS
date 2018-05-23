@extends('layouts.comerce')

@section('content')

<!-- 
    <header class="with-background">
        
        <div class="hero container">
            <div class="hero-copy">

                <p>Includes multiple products, categories, a shopping cart and a checkout system with Stripe integration.</p>
                <div class="hero-buttons">
                    <a href="#" class="button button-white">Blog Post</a>
                    <a href="#" class="button button-white">GitHub</a>
                </div>
            </div>  end hero-copy 

            <div class="hero-image">
                <img src="img/products/laptop-13.jpg" alt="hero image">
            </div> end hero-image 
        </div>  end hero 
    </header> -->

    <div class="featured-section">

        <div class="container">
            <h1 class="text-center">Laravel Ecommerce</h1>
            
            <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic.</p>
            
            <div class="products text-center">

                @foreach ($products as $product)
                <div class="product">
                    <a href=" {{ route('shop.show', $product->slug) }} "><img src="{{ asset('img/products/laptop-'.$product->id.'.jpg') }}" alt="product"></a>
                    <a href=" {{ route('shop.show', $product->slug) }} "><div class="product-name">{{ $product->name }}</div></a>
                    <div class="product-price">{{  number_format($product->price, 2,",",".") }}</div>
                </div>
                @endforeach
                
            </div> <!-- end products -->

            <div class="text-center button-container">
                <a href=" {{ route('shop.index') }} " class="button">View more products</a>
            </div>

        </div> <!-- end container -->

    </div> <!-- end featured-section -->

    <div class="">
        <div class="">
            <h1 class="text-center">From Our Blog</h1>

            <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic.</p>

            <div class="row spacing-bottom">
            <div class="col-md-offset-1">
            @foreach($posts as $post)
                <div class="col-md-3 mid-spacing landing-posts">
                    <div class="blog-posts">
                        <div class="blog-post">
                            <div class="landing-posts-image">
                            <img class="" src="{{ asset('img/articles/post'.$post->id.'.jpg') }}" alt="Blog Image">
                            </div>
                            <a href=" {{ route('posts.show', $post->slug) }} "><h2 class="blog-title"> {{ $post->title }} </h2></a>
                            <div class="blog-description"> {{ substr($post->article, 0, 100) }} {{ strlen($post->article) > 100 ? "..." : "" }} </div>
                        </div>   
                    </div>           
                </div>
            @endforeach
            </div>
            </div>
            <!--<div class="blog-posts">
                <div class="blog-post" id="blog1">
                    <a href="#"><img src="/img/blog1.png" alt="Blog Image"></a>
                    <a href="#"><h2 class="blog-title">Blog Post Title 1</h2></a>
                    <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tenetur numquam ipsam reiciendis.</div>
                </div>
                <div class="blog-post" id="blog2">
                    <a href="#"><img src="/img/blog2.png" alt="Blog Image"></a>
                    <a href="#"><h2 class="blog-title">Blog Post Title 2</h2></a>
                    <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tenetur numquam ipsam reiciendis.</div>
                </div>
                <div class="blog-post" id="blog3">
                    <a href="#"><img src="/img/blog3.png" alt="Blog Image"></a>
                    <a href="#"><h2 class="blog-title">Blog Post Title 3</h2></a>
                    <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tenetur numquam ipsam reiciendis.</div>
                </div>
            </div> The end of the post -->

        </div> <!-- end container -->
    </div> <!-- end blog-section -->

@endsection
