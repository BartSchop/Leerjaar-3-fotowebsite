@extends('app')

@section('home')
<ul>
    	<li><a class="btn-success" style="padding: 7px; border-radius: 3px">Search</a></li>
    	<li><div class="col-md-2"><input type="text" class="form-control" name="search"></div></li>
        <li><a href="/" class="btn-success" style="padding: 7px; border-radius: 3px">Home</a></li>
    @if (\Auth::check())
        <li><a href="/form/create" class="btn-success" style="padding: 7px; border-radius: 3px">Create</a></li>
    	<li><a href="/user/profile" class="btn-success" style="padding: 7px; border-radius: 3px">Your Profile</a></li>
	    <li><a href="/auth/logout" class="btn-success" style="padding: 7px; border-radius: 3px">Logout</a></li>
	@else
	    <li><a href="/auth/login" class="btn-success" style="padding: 7px; border-radius: 3px">Login</a></li>
    	<li><a href="/auth/register" class="btn-success" style="padding: 7px; border-radius: 3px">Register</a></li>
	@endif
</ul>
<hr>

<div class="col-md-6">
	@foreach ($messages as $message)
        <div class="index">
    		<article>
    			<a href="{{ url('/message', $message->id) }}"><h4 style="margin-left: 20px">{{ $message->type }}</h4></a>
    		</article>
        </div>
	@endforeach
</div>

@stop
