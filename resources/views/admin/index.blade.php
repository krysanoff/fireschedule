@extends('layouts.admin')

@section('content')
    <section class="content">
        @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif

        @if(count($employees))
            <div id="list">
                <div class="card-header">{{ __('admin.employeesList') }}</div>
                <app-component :employees="{{ $employees }}"></app-component>
                <a href="{{ route('newEmployee') }}" class="btn btn-success">{{ __('admin.addEmployee') }}</a>
            </div>
        @endif
    </section>
@endsection
