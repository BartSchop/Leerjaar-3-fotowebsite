@extends('app')

@section('home')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Removing post</div>
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
                        <div class="form-group">
                        	<p>Are you sure you want to delete the post - {{ $form->title }}?</p>
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('/form/delete', $form->id ) }}" class="btn-success" style="padding: 7px; border-radius: 3px">
                                    Yes
                                </a>
                                <a href="/form" class="btn-success col-md-offset-2" style="padding: 7px; border-radius: 3px">
                                    No
                                </a>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

@stop