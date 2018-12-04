@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Список сотрудников</div>

                <div class="card-body"></div>
                <div class="card-footer">
                    <a href="{{ route('newEmployee') }}" class="btn btn-success">Добавить сотрудника</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
