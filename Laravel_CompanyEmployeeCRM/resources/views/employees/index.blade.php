<!-- /resources/views/employees/index.blade.php -->
@extends('layouts.app') 

@section('content')
    <h2>All Employees</h2>
 
    @if ( !$employees->count() )
        You have no employees
    @else
        <table>
			<tr>
				<th>Employee Name</th>
				<th>Declined</th>
				<th>Employee ID</th>			
				<th>Company ID</th>
				<th></th>
				<th></th>			
			</tr>
			<?php 
			$formID = 1;
			?>
			@foreach( $employees as $employee )
				<tr>
					<td>
					{!! Form::open(array('class' => 'form-inline', 'id' => $formID, 'method' => 'DELETE', 'route' => array('employees.destroy', $employee->slug))) !!}			
					<a href="{{ route('employees.show', $employee->slug) }}">{{ $employee->firstName }} {{ $employee->lastName }}</a>
					</td><td>						
					{!! $employee->declined !!}					
					</td><td>						
					{!! $employee->id !!}
					</td><td>						
					{!! $employee->company_id !!}
					</td><td>						
					{!! link_to_route('employees.edit', 'Edit', array($employee->slug), array('class' => 'btn btn-info')) !!}
					</td><td>						
					{!! Form::submit('Delete', array('class' => 'btn btn-danger', 'id' => $formID)) !!}
					{!! Form::close() !!}
					</td>					
				</tr>
				<?php 
				$formID++;
				?>			
			@endforeach
        </table>
    @endif	
@endsection

	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
	<script>
		$(document).ready(function(){	
		  var clkBtn = "";
		  $('input[type="submit"]').click(function(evt) {
			clkBtn = evt.target.id;
			var formRef = 'form#'+clkBtn;
			alert('delete this row '+formRef);
			$(formRef).submit();		
		  });
		});
	</script>
