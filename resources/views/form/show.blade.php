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
		<a id="like{{  $forms->id }}" href="#" class="like" ><p>Like - {{ $likesamount }}</p></a>
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
	<a href="#" ><p>Change form</p></a>
@endif
@if ($user->status == 1)
	<a href="{{ url('/form/comment', $forms->id) }}"><p>Comment</p></a>
	<a href="{{ url('/report/form', $forms->id) }}"><p>Report</p></a>
	@if ($forms->user_id == $user->id)
		<a href="{{ url('/update/form', $forms->id) }}">Change post</a>
	@endif
@elseif ($user->status == 10)
	<a href="{{ url('/form/comment', $forms->id) }}"><p>Comment</p></a>
	<a href="{{ url('/admin/remove/post', $forms->id) }}"><p>Remove</p></a>
	@if ($forms->user_id == $user->id)
		<a href="{{ url('/update/form', $forms->id) }}">Change post</a>
	@endif
@endif
	<a href="rand/pic"><p>Random Picture</p></a>
</div>

<div class="comment">
	
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
