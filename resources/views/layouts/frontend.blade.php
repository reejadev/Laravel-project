<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Installed</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('frontend/css/bootstrap5.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link   href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
       
    </head>

    <body >
     <div> 
@include('layouts.inc.navbar')
     @yield('content')
     </div>

     <script src="{{asset('frontend/js/jquery-3.6.3.min.js') }}"></script>
     <script src="{{asset('frontend/js/bootstrap5.bundle.js') }}"></script>
    </body>
</html>
