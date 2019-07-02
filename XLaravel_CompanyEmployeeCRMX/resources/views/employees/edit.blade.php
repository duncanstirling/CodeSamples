<!-- /resources/views/employees/edit.blade.php -->
@extends('layouts.app')
 
@section('content')
    <h2>Edit Employee "{{ $employee->firstName }} {{ $employee->lastName }}"</h2>
 
    {!! Form::model($employee, ['method' => 'PATCH', 'route' => ['employees.update', $employee->slug]]) !!}
        @include('employees/partials/_form', ['submit_text' => 'Edit Employee'])
    {!! Form::close() !!}
@endsection