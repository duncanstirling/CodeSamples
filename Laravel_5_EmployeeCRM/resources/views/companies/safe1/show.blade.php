@extends('layouts.app')
 
@section('content')
    <h2>{{ $company->name }}</h2>
 
    @if ( !$company->employees->count() )
        Your company has no employees.
    @else
        <ul>
            @foreach( $company->employees as $employee )
                <li><a href="{{ route('employees.show', [$company->slug, $employee->slug]) }}">{{ $employee->name }}</a></li>
            @endforeach
        </ul>
    @endif
@endsection