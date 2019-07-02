<!-- /resources/views/companies/edit.blade.php -->
@extends('layouts.app')
 
@section('content')
    <h2>Edit Company</h2>
 
    {!! Form::model($company, ['method' => 'PATCH', 'files'=>true, 'route' => ['companies.update', $company->slug]]) !!}
        @include('companies/partials/_form', ['submit_text' => 'Edit Company'])
    {!! Form::close() !!}
@endsection

