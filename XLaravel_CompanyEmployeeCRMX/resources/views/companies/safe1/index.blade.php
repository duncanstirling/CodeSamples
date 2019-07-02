@extends('layouts.app')
 
@section('content')
    <h2>Companies</h2>
 
    @if ( !$companies->count() )
        You have no companies
    @else
        <ul>
            @foreach( $companies as $company )
                <li><a href="{{ route('companies.show', $company->slug) }}">{{ $company->name }}</a></li>
            @endforeach
        </ul>
    @endif
@endsection