<!-- /resources/views/employees/create.blade.php -->
@extends('layouts.app')
 
@section('content')
    <h2>Create Employee</h2>
 
    {!! Form::model(new App\Employee, ['route' => ['employees.store'], 'class'=>'']) !!}
        @include('employees/partials/_form', ['submit_text' => 'Create Employee'])
    {!! Form::close() !!}
@endsection