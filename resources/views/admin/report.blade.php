@extends('app')

@section('home')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reporting post - {{ $forms->title }}</div>
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/report/store', $forms->id) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            	<label class="col-md-4 control-label">Select a reason</label>
								<select name="type" class="col-md-4 control-label col-md-offset-1">
									<option value="offensive language">Offensive Language</option>
									<option value="private">Contains private content</option>
									<option value="spam/useless">Spam/useless content</option>
                                    <option value="personal data">Asking for personal data</option>
                                    <option value="scam/fake">Scam/fake links</option>
								</select>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Enter the main body of your report</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="content">
                            </div>
                        </div><br>

                    	<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Report
                                </button>
                                <a href="{{ url('/form', $forms->id) }}">Go back</a>
                            </div>
                        </div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>