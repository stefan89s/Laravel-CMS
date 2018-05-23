<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('includes.head')

<body>
    <div id="app">
        
        @include('includes.navigation')

        <div class="container">

            @include('includes.messages')

            @yield('content')
            
        </div>
 
    </div>

    @include('includes.footer')

    <!-- Scripts -->
    @include('includes.scripts')

</body>
</html>
