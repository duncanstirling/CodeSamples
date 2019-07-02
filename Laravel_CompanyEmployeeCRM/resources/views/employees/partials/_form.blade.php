<!-- /resources/views/employees/partials/_form.blade.php -->

<div class="form-group">
    {!! Form::label('firstName', 'First Name:') !!}
    {!! Form::text('firstName') !!}
</div>
 
<div class="form-group">
    {!! Form::label('lastName', 'Last Name:') !!}
    {!! Form::text('lastName') !!}
</div> 
 
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug') !!}
</div>

<div class="form-group">
    {!! Form::label('company_id', 'Company:') !!}
	{!! Form::select('company_id', $companies, null) !!}		
</div>
 
<div class="form-group">
    {!! Form::label('declined', 'Declined:') !!}
    {!! Form::checkbox('declined') !!}
</div>
 
<div class="form-group">
    {!! Form::submit($submit_text) !!}
</div>