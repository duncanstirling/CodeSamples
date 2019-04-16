@extends('layouts.app')
 
@section('content')
    <h2>
        {{ $employee->firstName }} {{ $employee->lastName }}
    </h2>
 
    {{ $employee->description }}
@endsection
<?php 
$name = $employee->firstName.' '.$employee->lastName;
?>
<!--{!! link_to_route('employees.show', $name, [$employee->slug]) !!} -->