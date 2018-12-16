<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

        <title>График дежурства караула на {{ date('d.m.Y') }} г.</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div id="app">
            <app-component v-bind:graph-list="{{ $list }}"></app-component>
        </div>
        <div class="flash">
            <p class="alert alert-success invisible" role="alert">
                График успешно сохранен
            </p>
            <p class="alert alert-danger invisible" role="alert">
                Произошла ошибка при сохранении графика
            </p>
        </div>
        <script src="{{ URL::asset('js/app.js') }}"></script>
    </body>
</html>
