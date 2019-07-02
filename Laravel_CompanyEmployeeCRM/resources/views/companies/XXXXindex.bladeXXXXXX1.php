<!-- /resources/views/companies/index.blade.php -->
@extends('layouts.app') 
@section('content')
    <h2>All Companies</h2>
 
    @if ( !$companies->count() )
        You have no companies
    @else
        <table>
			<tr>	
				<th>Company Name</th>
				<th>Company ID</th>
				<th></th>
				<th></th>
			</tr>	
			<?php 
			$formID = 1;
			?>			
            @foreach( $companies as $company )
                <tr>
                    {!! Form::open(array('class' => 'form-inline', 'id' => $formID, 'method' => 'DELETE', 'route' => array('companies.destroy', $company->slug))) !!}
                        <td><a href="{{ route('companies.show', $company->slug) }}">{{ $company->name }}</a></td>						
						<td>{!! $company->id !!}</td>						
						<td>{!! link_to_route('companies.edit', 'Edit', array($company->slug), array('class' => 'btn btn-info')) !!}</td>						
						<td>{!! Form::submit('Delete', array('class' => 'btn btn-danger', 'id' => $formID)) !!}</td>
                    {!! Form::close() !!}
                </tr>
				<?php 
				$formID++;
				?>				
            @endforeach
        </table>
    @endif
 
    <p>
        {!! link_to_route('companies.create', 'companyIndexBladeCreate Company') !!}
    </p>
    <p>	
		{!! link_to_route('employees.index', 'View all employees') !!}
    </p>
@endsection