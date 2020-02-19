@extends('layouts.app')

@section('body-bg', 'body-background')
@section('content')
    <div id="app">
        <home-component></home-component>
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

    {{--<div class="container">
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
    </div>--}}
@endsection
