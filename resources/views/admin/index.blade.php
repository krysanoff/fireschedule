@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Список сотрудников</div>
                <div class="card-body">
                    @if(Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif

                    @if(count($employees))
                        @foreach($employees as $employee)
                            <div class="row">
                                <div class="col-8">
                                    {{ $employee->lastname }} {{ $employee->firstname }} {{ $employee->middlename }}
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('employee', $employee->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('removeEmployee', $employee->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="card-footer">
                    <a href="{{ route('newEmployee') }}" class="btn btn-success">Добавить сотрудника</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
