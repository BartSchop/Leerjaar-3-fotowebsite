@extends('app')

@section('home')
<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/user/form">Your Posts</a></li>
    <li><a href="user/favorite">Liked Pictures</a></li>
    <li><a href="/auth/logout">Logout</a></li>
    <li><a href="/user/messages">Inbox</a></li>
</ul>
<hr>

@if ($status == 1)
	<h4>Welcome user</h4>
@elseif ($status == 10)
	<h4>Welcome admin</h4>
@elseif ($status == 2)
	<h4>Welcome user</h4>
	<p>current state: Locked - Please check your inbox for any information.</p>
@elseif ($status == 3)
	<h4>Welcome user</h4>
	<p>current state: Banned - Please check your inbox for any information.</p>
@endif
@stop