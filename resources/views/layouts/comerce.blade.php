<!doctype html>
<html lang="{{ app()->getLocale() }}">

@include('includes.comerce-head')

<body class="@yield('body-class', '')">
    @include('includes.comerce-nav')

    @include('includes.messages')

    @yield('content')

    @include('includes.comerce-footer')

    @yield('extra-js')

</body>
</html>