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
    <body class="body-background">
        <div class="container">
            <ul class="list-unstyled">
                <li class="row mt-5">
                    <a href="{{ route('graph', ['shift' => 1]) }}" class="btn btn-lg btn-light text-dark text-uppercase">
                        1 караул
                    </a>
                </li>
                <li class="row mt-5">
                    <a href="{{ route('graph', ['shift' => 2]) }}" class="btn btn-lg btn-light text-dark text-uppercase">
                        2 караул
                    </a>
                </li>
                <li class="row mt-5">
                    <a href="{{ route('graph', ['shift' => 3]) }}" class="btn btn-lg btn-light text-dark text-uppercase">
                        3 караул
                    </a>
                </li>
                <li class="row mt-5">
                    <a href="{{ route('graph', ['shift' => 4]) }}" class="btn btn-lg btn-light text-dark text-uppercase">
                        4 караул
                    </a>
                </li>
            </ul>
        </div>




        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
