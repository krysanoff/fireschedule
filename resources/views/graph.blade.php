<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <title>{{ config('app.name') }} - График дежурства</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <header class="navbar navbar-expand">
            <div class="container-fluid">
                <div class="col-4">
                    <a href="{{ route('index') }}" class="nav-link text-dark">{{ config('app.name') }}</a>
                </div>
                <div class="col-4"></div>
                <div class="col-4"></div>
            </div>
        </header>
        <div id="app">
            <app-component v-bind:graph-list="{{ $lastGraph }}" v-bind:shift="{{ $shift_id }}"></app-component>
        </div>
        <div class="flash">
            <p class="alert alert-success invisible" role="alert">
                График успешно сохранен
            </p>
            <p class="alert alert-danger invisible" role="alert">
                Произошла ошибка при сохранении графика
            </p>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
