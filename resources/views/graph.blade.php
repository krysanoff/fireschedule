@extends('layouts.app')

@section('content')
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
@endsection
