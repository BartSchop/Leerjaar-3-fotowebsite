@extends('app')

@section('home')
<ul>
    <li>Home</li>
    <li><a href="form">Pictures</a></li>
    @if (\Auth::check())
	    <li><a href="auth/logout">Logout</a></li>
	@else
	    <li><a href="auth/login">Login</a></li>
    	<li><a href="auth/register">Register</a></li>
	@endif
</ul>
<hr>
<h1>Home page</h1>

@stop
