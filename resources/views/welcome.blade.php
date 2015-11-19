@extends('app')

@section('home')
<ul>
    	<li><a class="btn-success" style="padding: 7px; border-radius: 3px">Search</a></li>
    	<li><div class="col-md-2"><input type="text" class="form-control" name="search"></div></li>
        <li><a href="/" class="btn-success" style="padding: 7px; border-radius: 3px">Home</a></li>
    @if (\Auth::check())
        <li><a href="/form/create" class="btn-success" style="padding: 7px; border-radius: 3px">Create</a></li>
    	<li><a href="user/profile" class="btn-success" style="padding: 7px; border-radius: 3px">Your Profile</a></li>
	    <li><a href="auth/logout" class="btn-success" style="padding: 7px; border-radius: 3px">Logout</a></li>
	@else
	    <li><a href="auth/login" class="btn-success" style="padding: 7px; border-radius: 3px">Login</a></li>
    	<li><a href="auth/register" class="btn-success" style="padding: 7px; border-radius: 3px">Register</a></li>
	@endif
</ul>
<hr>

<div class="col-md-6">
	@foreach ($forms as $form)
        <div class="index">
    		<article>
    			<a href="{{ url('/form', $form->id) }}"><h4 style="margin-left: 20px">{{ $form->title }}</h4></a>
    		</article>
                @foreach ($users as $userinfo)
                    @if ($form->user_id == $userinfo->id)
                            <p>Uploaded by - {{$userinfo->name}} {{$userinfo->lastname}}</p>
                    @endif
                @endforeach
        </div>
	@endforeach
</div>

@stop
