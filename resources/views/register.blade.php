@extends('app')

@section('home')
	<h3>Registreren</h3>
	
	<hr/>

	{!! Form::open(['url' => 'register/create']) !!}
	<div class="form-group">
		{!! Form::label('text', 'User Name:') !!}
		{!! Form::text('text', '', ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('email', 'E-mail:') !!}
		{!! Form::text('email', '', ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password', 'Password')!!}
		{!! Form::text('password', '', ['class' => 'form-control'])!!}
	</div>
	<!-- Add Picture Form Input -->

	<div class="form-group">
		{!! Form::submit('Create new user', ['class' => 'btn btn-primary form-control']) !!}
	</div>

	{!! Form::close() !!}
@stop