@extends('app')

@section('home')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update post</div>
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/form/update/store', $forms->id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ $forms->title }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Content</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="content" value="{{ $forms->content }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tag</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tag" value="{{ $forms->tag }}">
                            </div>
                        </div>

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