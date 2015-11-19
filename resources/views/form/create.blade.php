@extends('app')

@section('home')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create new post</div>
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

                    {!! Form::open(
                        array(
                            'url' => 'form/store', 
                            'class' => 'form-horizontal', 
                            'novalidate' => 'novalidate', 
                            'files' => true)) !!}

                    <div class="form-group">
                        {!! Form::label('Title', null, array('class'=>'col-md-4 control-label')) !!}
                        <div class="col-md-6">
                            {!! Form::text('title', null, array('class'=>'form-control')) !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('Description', null, array('class'=>'col-md-4 control-label')) !!}
                        <div class="col-md-6">
                            {!! Form::text('description', null, array('class'=>'form-control')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('Content', null, array('class'=>'col-md-4 control-label')) !!}
                        <div class="col-md-6">
                            {!! Form::file('content', null, array('class'=>'form-control')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('Tag', null, array('class'=>'col-md-4 control-label')) !!}
                        <div class="col-md-6">
                            {!! Form::text('tag', null, array('class'=>'form-control')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Create', array('class'=>'btn btn-primary', 'style'=>'margin-right: 15px')) !!}
                            <a href="/form">Go back</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection