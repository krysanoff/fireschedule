<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script src="/js/lang.js"></script>

        <title>{{ config('app.name') }} - График дежурства</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <header class="navbar navbar-expand bg-dark text-light shadow d-print-none mb-5">
            <div class="container-fluid">
                <div class="col-3">
                    <a href="{{ route('index') }}" class="nav-link text-light">{{ config('app.name') }}</a>
                </div>
                <div class="col-6">
                    <h2 class="text-uppercase text-center">
                        {{ __('graph.page.header', ['shift' => $shift_id]) }}
                    </h2>
                </div>
                <div class="col-3">
                    {{--  Settings block                  --}}
                </div>
            </div>
        </header>
        <div id="app">
            <app-component v-bind:graph-list="{{ $lastGraph }}" v-bind:shift="{{ $shift_id }}"></app-component>
        </div>
        <div class="flash d-print-none">
            <p class="alert alert-success invisible" role="alert">
                {{ __('messages.graph.success') }}
            </p>
            <p class="alert alert-danger invisible" role="alert">
                {{ __('messages.graph.error') }}
            </p>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
