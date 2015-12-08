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
    <li><a href="/form/random" class="btn-success" style="padding: 7px; float: right; margin-right: 10px; border-radius: 3px">Random</a></li>
@else
	<li><a href="auth/login" class="btn-success" style="padding: 7px; border-radius: 3px">Login</a></li>
   	<li><a href="auth/register" class="btn-success" style="padding: 7px; border-radius: 3px">Register</a></li>	
   	<li><a href="/form/random" class="btn-success" style="padding: 7px; float: right; margin-right: 10px; border-radius: 3px">Random</a></li>
@endif
</ul> 
<hr>

<div>
	<h4>{{ $forms->title }}</h4>
	{!! Html::image(url('images', $forms->content), $forms->content) !!}
	<p>{{ $forms->description }}</p>
	@if (\Auth::check())
		@if ( $likesis == 1 or $user->status == 2)
			<p>Like - {{ $likesamount }}</p>
		@else
			<a id="like{{  $forms->id }}" href="#" class="like" ><p>Like - {{ $likesamount }}</p></a>
		@endif
	@else
		<p>Views - {{ $forms->views }}</p>
		<p>Like - {{ $likesamount }}</p>
	@endif

@if (\Auth::check())
<ul>
	@if ($user->status == 1)
		@if ($forms->user_id == $user->id)
			<li><a href="{{ url('/form/update', $forms->id) }}" class="btn-success" style="padding: 7px; border-radius: 3px">Change post</a></li>
			<li><a href="{{ url('/form/delete/confirm', $forms->id) }}" class="btn-success" style="padding: 7px; border-radius: 3px">Remove</a></li>
		@else
			<li><a href="{{ url('/report/form', $forms->id) }}" class="btn-success" style="padding: 7px; border-radius: 3px">Report</a></li>
		@endif
	@elseif ($user->status == 10)
		<li><a href="{{ url('/form/delete/confirm', $forms->id) }}" class="btn-success" style="padding: 7px; border-radius: 3px">Remove</a></li>
		@if ($forms->user_id == $user->id)
			<li><a href="{{ url('/form/update', $forms->id) }}" class="btn-success" style="padding: 7px; border-radius: 3px">Change post</a></li>
		@endif
	@endif
		<li><a href="/form" class="btn-success" style="padding: 7px; border-radius: 3px">Go back</a></li>
</ul>
@endif
	<hr>
	@foreach ($comments as $comment)
		@if ($forms->id == $comment->form_id)
			<article>
				{{ $comment->content }}
			</article>
			@if (\Auth::check())
				@if ($user->id == $comment->user_id)
					<a href="{{ url('/comment/update', $comment->id) }}">Change comment</a>
					<a href="{{ url('/comment/delete', $comment->id) }}"> - Remove</a>
				@elseif ($user->status == 10)
					<a href="{{ url('/comment/delete', $comment->id) }}">Remove</a>
				@endif
			@endif
			<hr>
		@endif
	@endforeach
</div>


@if (\Auth::check())
	<div>
	    @if (count($errors) > 0)
	        <div class="alert alert-danger">
	            <strong>Whoops!</strong> There were some problems with your input.<br><br>
	            <ul>
	                @foreach ($errors->all() as $error)
	                    <li>{{ $error }}</li>
	                @endforeach
	            </ul>
	        </div>
	    @endif
	    <form class="form-horizontal" role="form" method="POST" action="{{ url('/comment/store', $forms->id) }}">
	        <input type="hidden" name="_token" value="{{ csrf_token() }}">
	        <div class="form-group">
	            <div class="col-md-6">
	                <input type="text" class="form-control" name="content">
	            </div>
	        </div>
	        <div class="form-group">
	            <div class="col-md-6">
	                <button type="submit" class="btn-success" style="margin-right: 15px;">
	                    Comment
	                </button>
	            </div>
	        </div>
	    </form>
	</div>
@endif
</div>



<script>
    $("body").on("click",".like",function(){
        var id= $(this).attr("id")
        var cleanid= id.replace("like","")
        $(this).removeClass("like")
        $.ajax({
        	url: "/form/like/"+cleanid,
        	dataType : "json",
        	success: function(response){
        		$("#"+id).empty().html("<p>Like -"+response.likesamount+"</p>")
        	}
        })

    })
</script>
@stop
