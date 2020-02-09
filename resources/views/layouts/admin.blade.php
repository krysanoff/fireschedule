<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta id="csrf" name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="/js/lang.js"></script>
    <script>
        window.laravel_csrf = document.getElementById('csrf').getAttribute('content')
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>

    @include('admin.includes.header')
    @include('admin.includes.sidebar')

    <main class="py-4">
        @yield('content')
    </main>

    @include('includes.footer')
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
