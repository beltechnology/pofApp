@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">

    <h1>Edit District {{ $district->id }}</h1>

    {!! Form::model($district, [
        'method' => 'PATCH',
        'url' => ['/district', $district->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('state_id') ? 'has-error' : ''}}">
                {!! Form::label('state_id', 'State Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('state_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('state_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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