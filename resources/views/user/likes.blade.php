@extends('app')

@section('home')

<ul>
    <li><a href="/" class="btn-success" style="padding: 7px; border-radius: 3px">Home</a></li>
    <li><a href="/form/create" class="btn-success" style="padding: 7px; border-radius: 3px">Create</a></li>
    <li><a href="/user/profile" class="btn-success" style="padding: 7px; border-radius: 3px">Profile</a></li>
    <li><a href="/user/form" class="btn-success" style="padding: 7px; border-radius: 3px">Your Pictures</a></li>
    <li><a href="/auth/logout" class="btn-success" style="padding: 7px; border-radius: 3px">Logout</a></li>
    <li><a href="/user/messages" class="btn-success" style="padding: 7px; border-radius: 3px">Inbox</a></li>
</ul>
<hr>
<div>
@foreach ($forms as $form)
    @foreach ($likes as $like)
        @if ($form->id == $like->form_id)
            @if (\Auth::user()->id == $like->user_id)
                <a href="{{ url('/form', $form->id) }}"><h4>{{ $form->title }}</h4></a>
            @endif
        @endif
    @endforeach
@endforeach
</div>
<a href="/form">Go back</a>
</div>
@stop