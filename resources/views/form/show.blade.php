@extends('app')

@section('home')

<ul>
    <li><button>Search</button></li>
    <li><div class="col-md-2"><input type="text" class="form-control" name="search"></div></li>
    <li><a href="/">Home</a></li>
@if ($user->status == 1 or $user->status == 10)
    <li><a href="create">Create</a></li>
@endif
    <li><a href="/auth/logout">logout</a></li>
    <li><a href="/form">Pictures</a></li>
</ul>
<hr>
<div>
	<h4>{{ $forms->title }}</h4>
	<article>
		{{ $forms->content }}
	</article>

	@if ( $likesis == 1 or $user->status == 2)
		<p>like - {{ $likesamount }}</p>
	@else
		<a href="{{ url('form/like', $forms->id ) }}"><p>Like - {{ $likesamount }}</p></a>
	@endif

	@if ($user->status == 10)
		<p>Uploaded by - <a href="{{ url('admin/user/info', $userid) }}">{{$username}} {{$userlastname}}</a></p>
	@else
		<p>Uploaded by - {{$username}} {{$userlastname}}</p>
	@endif

	<hr>
	@foreach ($comments as $comment)
		@if ($forms->id == $comment->form_id)
			<article>
				{{ $comment->content }}
			</article>
			<hr>
		@endif
	@endforeach
</div>
	<a href="/form">Go back</a>
@if ($user->id == $forms->id)
	<a href="{{ url('/form/edit', $forms->id) }}"><p>Change form</p></a>
@endif
@if ($user->status == 1)
	<a href="{{ url('/form/comment', $forms->id) }}"><p>Comment</p></a>
	<a href="{{ url('/report/form', $forms->id) }}"><p>Report</p></a>
@elseif ($user->status == 10)
	<a href="{{ url('/form/comment', $forms->id) }}"><p>Comment</p></a>
	<a href="{{ url('/admin/remove/post', $forms->id) }}"><p>Remove</p></a>
@endif
	<a href="rand/pic"><p>Random Picture</p></a>
</div>

<div class="comment">
	
</div>
@stop