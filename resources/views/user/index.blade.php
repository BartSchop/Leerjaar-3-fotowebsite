@extends('app')

@section('home')
<ul>
    <li><a href="/" class="btn-success" style="padding: 7px; border-radius: 3px">Home</a></li>
    <li><a href="/user/form" class="btn-success" style="padding: 7px; border-radius: 3px">Your Posts</a></li>
    <li><a href="/user/favorite" class="btn-success" style="padding: 7px; border-radius: 3px">Liked Pictures</a></li>
    <li><a href="/auth/logout" class="btn-success" style="padding: 7px; border-radius: 3px">Logout</a></li>
    <li><a href="/admin/inbox" class="btn-success" style="padding: 7px; border-radius: 3px">Inbox</a></li>
</ul>
<hr>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/change', $user->id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">First Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">User Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                        </div>
						<a class="col-md-6" href="/password/email">Change password</a>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop