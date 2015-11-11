@extends('app')

@section('home')

<ul>
    <li><a href="/">Home</a></li>
    <li><a href="form/create">Create</a></li>
    <li><a href="user/form">Your Posts</a></li>
    <li><a href="auth/logout">Logout</a></li>
    <li><a href="form">Pictures</a></li>
</ul>
<hr>
<div>
	@foreach ($forms as $form)
		@if (\Auth::user()->id == $form->user_id)
			<h4>{{ $form->title }}</h4>
			<article>
				{{ $form->content }}
			</article>
			<a href="{{ url('/form/edit', $form->id) }}"><p>Change form</p></a>
			<hr>
		@endif
	@endforeach
</div>
<a href="/form">Go back</a>
</div>
@stop