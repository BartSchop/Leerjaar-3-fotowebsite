@extends('app')

@section('home')

<ul>
    <li><a href="/">Home</a></li>
    <li><a href="create">Create</a></li>
    <li><a href="/user/form">Your Posts</a></li>
    <li><a href="auth/logout">logout</a></li>
    <li><a href="form">Pictures</a></li>
</ul>
<hr>
<div>
	<h4>{{ $forms->title }}</h4>
	<article>
		{{ $forms->content }}
	</article>
	<hr>
</div>
	<a href="/form">Go back</a>
	<a href="{{ url('/form/edit', $forms->id) }}"><p>Change form</p></a>
	<a href="{{ url('/form/comment', $forms->id) }}"><p>Comment</p></a>
</div>

<div class="comment">
	
</div>
@stop