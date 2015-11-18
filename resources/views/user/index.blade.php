@extends('app')

@section('home')
<ul>
    <li><a href="/" class="btn-success" style="padding: 7px; border-radius: 3px">Home</a></li>
    <li><a href="/user/form" class="btn-success" style="padding: 7px; border-radius: 3px">Your Posts</a></li>
    <li><a href="user/favorite" class="btn-success" style="padding: 7px; border-radius: 3px">Liked Pictures</a></li>
    <li><a href="/auth/logout" class="btn-success" style="padding: 7px; border-radius: 3px">Logout</a></li>
    <li><a href="/user/messages" class="btn-success" style="padding: 7px; border-radius: 3px">Inbox</a></li>
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