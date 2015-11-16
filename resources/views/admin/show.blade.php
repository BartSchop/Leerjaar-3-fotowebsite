@extends('app')

@section('home')

<div>
	<ul>
		<li>{{$user->name}}</li>
		<li>{{$user->lastname}}</li>
		<li>{{$user->username}}</li>
		<li>{{$user->email}}</li>
		<li>{{$user->status}}</li>
	</ul>
</div>
<div>
	<ul>
		<li>Change Status</li>
		<li>Content</li>
	</ul>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update user status</div>
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/update/user', $user->id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">1 - Default, 2 - locked, 3 - banned</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="number" value="{{ old('number') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Change
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="/"><p>Back</p></a>
@stop