@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Student Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/studentLoginData') }}">
               
 {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('rollNo') ? ' has-error' : '' }}">
                            <label for="rollNo" class="col-md-4 control-label">Roll No.</label>

                            <div class="col-md-6">
                                <input id="rollNo" type="text" class="form-control" name="rollNo" value="{{ old('rollNo') }}"maxlength="50" required>

                                @if ($errors->has('rollNo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rollNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('stream') ? ' has-error' : '' }}">
                            <label for="stream" class="col-md-4 control-label">Stream</label>

                            <div class="col-md-6">
                            <label for="pso">
							  <input id="pso" type="radio" class="" name="stream" value="pso" required> PSO </label>
                              <label for="pmo">   <input id="pmo" type="radio" class="" name="stream" value="pmo" required> PMO</label>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level" class="col-md-4 control-label">Level</label>

                            <div class="col-md-6">
                            <label for="first">
							  <input id="first" type="radio" class="" name="level" value="first" required> FIRST LEVEL  </label>
                              <label for="second">   <input id="second" type="radio" class="" name="level" value="second" required>  SECOND LEVEL</label>

                                @if($errors->any())
                                    <span class="has-error  help-block" >
                                        <strong class="  help-block">{{$errors->first()}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> {{ trans('messages.LOGIN') }}
                                </button>

                            </div>
                        </div>
                        <div class="form-group" style="color:red; padding:5px; font-size:12px;">
						{{ trans('messages.DISCLAIMER') }}
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
