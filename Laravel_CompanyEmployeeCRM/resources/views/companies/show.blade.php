<!-- /resources/views/companies/show.blade.php -->
@extends('layouts.app')
@section('content')
    <h2>{{ $company->name }}</h2>
 
    @if ( !$company->employees->count() )
        {{ $company->name }} has no employees.
    @else
		{{ $company->name }} has the following employees:
        <ul>
            @foreach( $company->employees as $employee )
                <li>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('employees.destroy', $employee->slug))) !!}
                        <a href="{{ route('employees.show', [$employee->slug]) }}">{{ $employee->name }}</a>
						{{ $employee->website }} &nbsp;
						{{ $employee->email }} &nbsp;
						{{ $employee->logo }} &nbsp;
                        
                        {!! link_to_route('employees.edit', 'Edit', array($employee->slug), array('class' => 'btn btn-info')) !!},
                        {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                    {!! Form::close() !!}
                </li>
            @endforeach
        </ul>
    @endif
@endsection