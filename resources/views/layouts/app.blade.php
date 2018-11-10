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
    <link href="{{ asset('js/ckeditor/plugins/codesnippet/lib/highlight/styles/monokai_sublime.css') }}" rel="stylesheet">
    <link href="{{ asset('js/ckeditor/plugins/spoiler/css/spoiler.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png?v=69PnEbK4lN') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png?v=69PnEbK4lN') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png?v=69PnEbK4lN') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest?v=69PnEbK4lN') }}">
    <link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg?v=69PnEbK4lN') }}" color="#24292e">
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico?v=69PnEbK4lN') }}">
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="msapplication-TileColor" content="#24292e">
    <meta name="theme-color" content="#24292e">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML"></script>
    <script src="{{ asset('js/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
    <script src="{{ asset('/js/spoiler.js') }}"></script>

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
    <script>hljs.initHighlightingOnLoad();</script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('individualJS')
</body>
</html>
