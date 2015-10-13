@extends('app')

@section('home')

<h3>Inloggen</h3>

{!! Form::open(['url' => 'inloggen/check']) !!}
	<div class="form-group">
		{!! Form::label('username', 'User Name:') !!}
		{!! Form::text('text', '', ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password', 'Password')!!}
		{!! Form::text('text', '', ['class' => 'form-control'])!!}
	</div>

	<!-- Add Picture Form Input -->

	<div class="form-group">
		{!! Form::submit('Inloggen', ['class' => 'btn btn-primary form-control']) !!}
	</div>

{!! Form::close() !!}

	<a href="/">Terug</a>



@stop