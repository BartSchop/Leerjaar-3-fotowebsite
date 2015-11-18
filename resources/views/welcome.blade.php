@extends('app')

@section('home')
<ul>
    <li><a href="form" class="btn-success" style="padding: 7px; border-radius: 3px">Pictures</a></li>
    @if (\Auth::check())
    	<li><a href="user/profile" class="btn-success" style="padding: 7px; border-radius: 3px">Your Profile</a></li>
	    <li><a href="auth/logout" class="btn-success" style="padding: 7px; border-radius: 3px">Logout</a></li>
	@else
	    <li><a href="auth/login" class="btn-success" style="padding: 7px; border-radius: 3px">Login</a></li>
    	<li><a href="auth/register" class="btn-success" style="padding: 7px; border-radius: 3px">Register</a></li>
	@endif
</ul>
<hr>
<h1>Home page</h1>

@stop
