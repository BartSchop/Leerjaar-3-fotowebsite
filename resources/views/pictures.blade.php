@extends('app')

@section('home')
<h1>Pictures</h1>
	@foreach ($pictures as $picture)
		<h6>{{ $picture->text }}</h6>
	@endforeach
@stop
