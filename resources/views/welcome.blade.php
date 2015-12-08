@extends('app')

@section('home')
<ul>
        <li><a href="/" class="btn-success" style="padding: 7px; border-radius: 3px">Home</a></li>      
    @if (\Auth::check())
        <li><a href="/form/create" class="btn-success" style="padding: 7px; border-radius: 3px">Create</a></li>
    	<li><a href="user/profile" class="btn-success" style="padding: 7px; border-radius: 3px">Your Profile</a></li>
	    <li><a href="auth/logout" class="btn-success" style="padding: 7px; border-radius: 3px">Logout</a></li>
        <li><a href="/form/random" class="btn-success" style="padding: 7px; float: right; margin-right: 10px; border-radius: 3px">Random</a></li>
	@else
	    <li><a href="auth/login" class="btn-success" style="padding: 7px; border-radius: 3px">Login</a></li>
    	<li><a href="auth/register" class="btn-success" style="padding: 7px; border-radius: 3px">Register</a></li>
        <li><a href="/form/random" class="btn-success" style="padding: 7px; float: right; margin-right: 10px; border-radius: 3px">Random</a></li>
	@endif
		<form class="form-horizontal" role="form" method="POST" action="/search">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-2">
            	<li><input type="tag" class="form-control" name="tag"></li>
            </div>
            <div>
            	<li><button type="submit" class="btn-success" style="padding: 7px; border-radius: 3px">Search</button></li>
        	</div>
        </form>
</ul>
<hr>
{!! Form::open(
    array(
        'url' => '/')) !!}
    <div class="form-group">

        {!! Form::label('Sort by', null, array('class'=>'')) !!}

        {!! Form::select('sort', [
           'new' => 'Newest',
           'old' => 'Oldest',
           'likes' => 'Most Liked',
           'views' => 'Most Viewed'],
           isset($sort) ? $sort : 'new'
        ) !!}
        
        {!! Form::submit('Sort', null, array('class'=>'')) !!}

    </div>

{!! Form::close() !!}
<hr>
<div class="col-md-6">
	@foreach ($forms as $form)
        <div class="index">
    		<article>
    			<a href="{{ url('/form', $form->id) }}"><h4 style="margin-left: 20px">{{ $form->title }}</h4></a>
    		</article>
                @foreach ($users as $userinfo)
                    @if ($form->user_id == $userinfo->id)
                            <p>Uploaded by - {{$userinfo->name}} {{$userinfo->lastname}} <br>
                            Likes - {{$form->likes}} <br>
                            Views - {{$form->views}}</p>
                    @endif
                @endforeach
        </div>
	@endforeach
</div>

@stop
