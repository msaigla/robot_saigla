<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_description')">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/saiglaStyle.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>
<body>
    <div id="app">
        @include('layouts.header')

        @yield('content')
    </div>
    <footer class="page-footer font-small blue pt-4">
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="https://saigla.ru"> SAIGLA.RU</a> vAlpha
      </div>
    <!-- Copyright -->
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('individualJS')
</body>
</html>
