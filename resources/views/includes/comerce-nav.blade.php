
<header>
<div class="top-nav container">
    <div class="logo"><a href=" {{ route('pages.index') }} ">Home</a></div>
    <ul>
        <li><a href=" {{ route('shop.index') }} ">Shop</a></li>
        <li><a href="#">About</a></li>
        <li><a href=" {{ route('posts.index') }} ">Blog</a></li>
        <li>
            <a href=" {{ route('cart.index') }} ">Cart
                <span class="cart-count"><span></span></span>
            </a>
        </li>
        <form action=" {{ route('logout') }} " method="POST">
            {{ csrf_field() }}
            
            @if(Auth::guard()->check())<button>Log Out</button>@endif
        </form>
    </ul>
    
</div> <!-- end top-nav -->
</header>