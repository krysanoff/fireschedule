<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>График дежурства караула на {{ date('d.m.Y') }} г.</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div id="app">
            <app-component v-bind:graph-list="{{ $list }}"></app-component>

        </div>
        <script src="{{ URL::asset('js/app.js') }}"></script>
    </body>
</html>
