<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>Laravel Ecommerce | @yield('title', '')</title>
    
        <link href="/img/favicon.ico" rel="SHORTCUT ICON" />
    
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app2.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive2.css') }}" rel="stylesheet">
    
        @yield('extra-css')
    </head>