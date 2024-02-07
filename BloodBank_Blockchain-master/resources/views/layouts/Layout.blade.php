<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BloodHub</title>
{{-- {{ config('app.name', 'Laravel') }} --}}
    <!-- Scripts -->


    <!-- Fav Icon -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
   {{-- @include('CDN_Css_Js.Css.bootcss') --}}
   @include('layouts.adminComponents.lib.Style')




</head>

<body class="">
    <div id="app">
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary shadow-lg">

            <a href="{{ route('welcome') }}" class="btn btn-primary pull-left">Home</a>

            <a href="{{ route('register') }}" class="btn btn-primary pull-left">Register</a>

            <a href="{{ route('login') }}" class="btn btn-primary pull-left">Login</a>

            <div class="container">

                <div class="navbar-brand">
                    BloodHub



                </div>
            </div>


        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


{{-- @include('CDN_Css_Js.Js.bootjs') --}}
@include('layouts.adminComponents.lib.js')
</body>

</html>
