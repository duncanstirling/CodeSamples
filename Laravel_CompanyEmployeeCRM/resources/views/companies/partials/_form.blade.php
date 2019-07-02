<!-- /resources/views/companies/partials/_form.blade.php -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name') !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug') !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email') !!}
</div>
<div class="form-group">
    {!! Form::label('website', 'Website:') !!}
    {!! Form::text('website') !!}
</div>
<div class="form-group">
{{Form::label('logo', 'User Photo',['class' => 'control-label'])}}
{{Form::file('logo')}}	
</div>

<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>
 