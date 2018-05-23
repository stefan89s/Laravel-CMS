
<nav class="navbar nav-blue navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand nav-blue" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                
                <li><a class="navbar-brand nav-blue" href=" {{ route('pages.index') }} ">Home</a></li> 
                
                <li><a class="navbar-brand nav-blue" href=" {{ route('landing.index') }} ">Ecomerce</a></li> 

                <li><a class="navbar-brand nav-blue" href=" {{ route('news.public') }} ">News</a></li>   
                
                <li><a class="navbar-brand nav-blue" href=" {{ route('posts.index') }} ">Blog</a></li> 

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right nav-blue">
                <!-- Authentication Links -->
                @if(!Auth::guard()->check() && !Auth::guard('admin')->check())
 
                    <li><a class="nav-blue" href="{{ route('login') }}">Login</a></li>
                    <li><a class="nav-blue" href="{{ route('register') }}">Register</a></li>
                @endif
                @if(Auth::guard('web')->check())
                <li class="dropdown nav-blue">
                <a href="#" class="dropdown-toggle nav-blue" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                         {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">

                        <li><a href=" {{ route('home') }} ">Dashboard</a></li>

                        <li><a href=" {{ route('profile.show', auth()->user()->name) }} ">Your Profile</a></li>

                        <li><a href="">Your Articles</a></li>
                        <li><a href="{{ route('tags.index') }}">Tags</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        
                    </ul>
                </li> 
                @endif

                @if(Auth::guard('admin')->check())

                <li class="dropdown nav-blue">
                    <a href="#" class="dropdown-toggle nav-blue" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                             {{ Auth::guard('admin')->getNameForAdmin() }}  <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">

                        <li><a href="{{ route('admins.index') }}">Dashboard</a></li>

                        <li><a href="{{ route('news.index') }}">News</a></li>

                        <li><a href="{{ route('news-category.index') }}">News Categories</a></li>

                        <li><a href="{{ route('news-tags.index') }}">News Tags</a></li>

                        <li><a href="{{ route('category.index') }}">Users Categories</a></li>

                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>
                </li>  
                    
                @endif

            </ul>
        </div>
    </div>
</nav>