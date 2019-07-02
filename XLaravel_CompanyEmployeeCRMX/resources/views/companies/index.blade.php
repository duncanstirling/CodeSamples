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
				<th>Logo</th>			
				<th></th>		
				<th></th>	
			</tr>
			<?php 
			$formID = 1;
			?>
            @foreach( $companies as $company )			
				<tr>
					<td>				
					{!! Form::open(array('class' => 'form-inline', 'id' => $formID, 'method' => 'DELETE', 'route' => array('companies.destroy', $company->slug))) !!}
					<a href="{{ route('companies.show', $company->slug) }}">{{ $company->name }}</a>
					</td><td>
					{{ $company->logo }}
					</td><td>					
					{!! link_to_route('companies.edit', 'Edit', array($company->slug), array('class' => 'btn btn-info')) !!}
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
		{{ $companies->links() }}
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