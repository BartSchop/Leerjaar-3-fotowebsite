@extends('app')

@section('home')
	<h3>Registreren</h3>
	
	<hr/>

	{!! Form::open(['url' => 'register/create']) !!}
		<div class="form-group">
			{!! Form::label('firstname', 'First Name:') !!}
			{!! Form::text('firstname', '', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('lastname', 'Last Name:') !!}
			{!! Form::text('lastname', '', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('username', 'User Name')!!}
			{!! Form::text('username', '', ['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('date', 'Date of Birth')!!}
			{!! Form::input('date', 'date', '', ['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'E-mail')!!}
			{!! Form::text('email', '', ['class' => 'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('password', 'Password')!!}
			{!! Form::input('password', 'password', '', ['class' => 'form-control'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('password_confirmation', 'Password Confirmation')!!}
			{!! Form::input('password', 'password_confirmation', '', ['class' => 'form-control'])!!}
		</div>
		<!-- Add Picture Form Input -->

		<div class="form-group">
			{!! Form::submit('Create new user', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}


	@if ($errors->any())
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif
@stop