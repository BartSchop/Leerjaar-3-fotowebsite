@extends('app')


@section('home')
<header>
<ul>
    <li><button>Search</button></li>
    <li><div class="col-md-2"><input type="text" class="form-control" name="search"></div></li>
    <li><a href="/" class="btn-success" style="padding: 7px; border-radius: 3px">Home</a></li>
    <li><a href="/form" class="btn-success" style="padding: 7px; border-radius: 3px">Pictures</a></li>
    @if ($user->status == 1 or $user->status == 10)
        <li><a href="/form/create" class="btn-success" style="padding: 7px; border-radius: 3px">Create</a></li>
    @endif
    <li><a href="/user/profile" class="btn-success" style="padding: 7px; border-radius: 3px">Your Profile</a></li>
    <li><a href="auth/logout" class="btn-success" style="padding: 7px; border-radius: 3px">Logout</a></li>
    <li><a href="/form/random" class="btn-success" style="padding: 7px; float: right; margin-right: 10px; border-radius: 3px">Random</a></li>
</ul> 
</header>
<hr>


@if ($user->status == 3)
    <p>Account has beed banned, please check your inbox</p>
@else
<div class="col-md-6">
	@foreach ($forms as $form)
        <div class="index">
    		<article>
    			<a href="{{ url('/form', $form->id) }}"><h4 style="margin-left: 20px">{{ $form->title }}</h4></a>
    		</article>
                @foreach ($users as $userinfo)
                    @if ($form->user_id == $userinfo->id)
                        @if ($user->status == 10)
                            <p>Uploaded by - <a href="{{ url('/admin/user/info', $userinfo->id) }}">{{$userinfo->name}} {{$userinfo->lastname}}</a></p>
                        @else
                            <p>Uploaded by - {{$userinfo->name}} {{$userinfo->lastname}}</p>
                        @endif
                    @endif
                @endforeach
        </div> 
	@endforeach
</div>
@endif

@stop