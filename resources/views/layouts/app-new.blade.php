<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Pogo Slider CSS -->
{{--    <link rel="stylesheet" href="{{ asset('css/pogo-slider.min.css') }}">--}}
{{--    <!-- Site CSS -->--}}
{{--    <link rel="stylesheet" href="{{ asset('css/style.css') }}">--}}
{{--    <!-- Responsive CSS -->--}}
{{--    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <main class="py-4">
        @yield('content')
    </main>
</div>
{{--<!-- ALL JS FILES -->--}}
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- ALL PLUGINS -->
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/jquery.pogo-slider.min.js') }}"></script>
<script src="{{ asset('js/slider-index.js') }}"></script>
<script src="{{ asset('js/smoothscroll.js') }}"></script>
<script src="{{ asset('js/responsiveslides.min.js') }}"></script>
<script src="{{ asset('js/timeLine.min.js') }}"></script>
<script src="{{ asset('js/form-validator.min.js') }}"></script>
<script src="{{ asset('js/contact-form-script.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
