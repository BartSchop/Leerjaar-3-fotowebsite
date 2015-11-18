@extends('app')

@section('home')

<ul>
    <li><a href="/" class="btn-success" style="padding: 7px; border-radius: 3px">Home</a></li>
    <li><a href="/form/create" class="btn-success" style="padding: 7px; border-radius: 3px">Create</a></li>
    <li><a href="/user/profile" class="btn-success" style="padding: 7px; border-radius: 3px">Profile</a></li>
    <li><a href="/user/favorites" class="btn-success" style="padding: 7px; border-radius: 3px">Liked Pictures</a></li>
    <li><a href="/auth/logout" class="btn-success" style="padding: 7px; border-radius: 3px">Logout</a></li>
    <li><a href="/user/messages" class="btn-success" style="padding: 7px; border-radius: 3px">Inbox</a></li>
</ul>
<hr>
<div>
	@foreach ($forms as $form)
		@if (\Auth::user()->id == $form->user_id)
			<a href="{{ url('/form', $form->id) }}"><h4>{{ $form->title }}</h4></a>
		@endif
	@endforeach
</div>
<a href="/form">Go back</a>
</div>
@stop