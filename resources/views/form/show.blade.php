@extends('app')

@section('home')

<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/form/create">Create</a></li>
    <li><a href="/user/form">Your Posts</a></li>
    <li><a href="/form">Pictures</a></li>
    <li><a href="/auth/logout">Logout</a></li>
</ul>
<hr>
<div>
	<h4>{{ $forms->title }}</h4>
	<article>
		<img src="public/images/phpu98V5n.jpg">
	</article>

	@if ( $likesis == 1 )
		<p>like - {{ $likesamount }}</p>
	@else
		<a href="{{ url('form/like', $forms->id ) }}"><p>Like - {{ $likesamount }}</p></a>
	@endif

	<hr>
	@foreach ($comments as $comment)
		@if ($forms->id == $comment->form_id)
			<article>
				{{ $comment->content }}
			</article>
			<hr>
		@endif
	@endforeach
</div>
	<a href="/form">Go back</a>
	<a href="{{ url('/form/edit', $forms->id) }}"><p>Change form</p></a>
	<a href="{{ url('/form/comment', $forms->id) }}"><p>Comment</p></a>
</div>

<div class="comment">
	
</div>
@stop