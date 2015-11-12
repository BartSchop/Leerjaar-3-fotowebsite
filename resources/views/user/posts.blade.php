@extends('app')

@section('home')

<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/user/profile">Profile</a></li>
    <li><a href="/auth/logout">Logout</a></li>
    <li><a href="/user/messages">Inbox</a></li>
</ul>
<hr>
<div>
	@foreach ($forms as $form)
		@if (\Auth::user()->id == $form->user_id)
			@foreach ($comments as $comment)
				@if ($form->id == $comment->id)
					<h4>{{ $form->title }}</h4>
					<article>
						{{ $form->content }}
					</article>
					<a href="{{ url('/form/edit', $form->id) }}"><p>Change form</p></a>
					<hr>
					<article>
						{{ $comment->content }}
					</article>
					<hr>
				@endif
			@endforeach
		@endif
	@endforeach
</div>
<a href="/form">Go back</a>
</div>
@stop