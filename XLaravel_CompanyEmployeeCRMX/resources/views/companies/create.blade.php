<!-- /resources/views/companies/create.blade.php -->
@extends('layouts.app')
 
@section('content')
    <h2>Create Company</h2>
 
    {!! Form::model(new App\Company, ['route' => ['companies.store'],'files' => true]) !!}
        @include('companies/partials/_form', ['submit_text' => 'createBladeCreate Company'])
    {!! Form::close() !!}
@endsection