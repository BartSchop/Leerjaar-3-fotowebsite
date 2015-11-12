@extends('app')

@section('home')

<div>
	<ul>
		<li>{{$user->name}}</li>
		<li>{{$user->lastname}}</li>
		<li>{{$user->username}}</li>
		<li>{{$user->email}}</li>
		<li>{{$user->status}}</li>
	</ul>
</div>
<div>
	<ul>
		<li>Change Status</li>
		<li>Content</li>
	</ul>
</div>
<a href="/"><p>Back</p></a>
@stop