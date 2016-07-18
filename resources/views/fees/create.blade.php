@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New fee</h1>
    <hr/>

    {!! Form::open(['url' => '/fees', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('teamId') ? 'has-error' : ''}}">
                {!! Form::label('teamId', 'Teamid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('teamId', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('teamId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection