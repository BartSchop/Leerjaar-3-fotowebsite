@extends('app')

@section('home')
<ul>
    <li><a href="/">Home</a></li>
    <li><a href="form/create">Create</a></li>
    <li><a href="user/form">Your Posts</a></li>
    <li><a href="auth/logout">logout</a></li>
    <li><a href="form">Pictures</a></li>
</ul>
<hr>
<div>
	@foreach ($forms as $form)
		<article>
			<a href="{{ url('/form', $form->id) }}"><h4>{{ $form->title }}</h4></a>
		</article>
	@endforeach
</div>

@stop