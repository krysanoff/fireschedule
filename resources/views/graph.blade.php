<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script src="/js/lang.js"></script>

        <title>{{ config('app.name') }} - График дежурства</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <header class="navbar navbar-expand d-print-none">
            <div class="container-fluid">
                <div class="col-2">
                    <a href="{{ route('index') }}" class="nav-link text-dark">{{ config('app.name') }}</a>
                </div>
                <div class="col-8">
                    <h1 class="text-uppercase text-center">
                        {{ __('graph.page.header', ['shift' => $shift_id]) }}
                    </h1>
                </div>
                <div class="col-2">
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
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
