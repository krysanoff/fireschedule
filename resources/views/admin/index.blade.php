@extends('layouts.admin')

@section('app')
    <div id="app">
        <sidebar-component></sidebar-component>

        <main class="main">
            <content-component></content-component>
        </main>
    </div>
@endsection
