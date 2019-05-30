@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('admin.employeesList') }}</div>
                <div class="card-body">
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif

                    @if(count($employees))
                        <div id="list">
                            <app-component :employees="{{ $employees }}"></app-component>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <a href="{{ route('newEmployee') }}" class="btn btn-success">{{ __('admin.addEmployee') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
