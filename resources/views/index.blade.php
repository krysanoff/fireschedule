<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

        <title>{{ config('app.name') }} - График дежурства</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    </head>
    <body>
    <a href="{{ route('graph', ['shift' => 1]) }}" class="btn">1 караул</a>
    <a href="{{ route('graph', ['shift' => 2]) }}" class="btn">2 караул</a>
    <a href="{{ route('graph', ['shift' => 3]) }}" class="btn">3 караул</a>
    <a href="{{ route('graph', ['shift' => 4]) }}" class="btn">4 караул</a>
    </body>
</html>
