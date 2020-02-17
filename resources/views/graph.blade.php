@extends('layouts.app')

@section('content')
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
