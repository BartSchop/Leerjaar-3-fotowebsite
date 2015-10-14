@extends('app')

@section('home')

<h3>Inloggen</h3>

{!! Form::open(['url' => 'login']) !!}
	<div class="form-group">
		{!! Form::label('email', 'E-mail:') !!}
		{!! Form::text('email', '', ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password', 'Password')!!}
		{!! Form::input('password', 'password', '', ['class' => 'form-control'])!!}
	</div>

	<!-- Add Picture Form Input -->

	<div class="form-group">
		{!! Form::submit('Inloggen', ['class' => 'btn btn-primary form-control']) !!}
	</div>

{!! Form::close() !!}

	<a href="/">Terug</a>

	@if ($errors->any())
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@stop