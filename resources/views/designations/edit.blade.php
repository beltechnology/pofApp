@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">

    <h1>{{ trans('messages.EDIT_DESIGNATION') }} {{ $designation->id }}</h1>

    {!! Form::model($designation, [
        'method' => 'PATCH',
        'url' => ['/designations', $designation->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
                {!! Form::label('designation', trans('messages.NAME_DESIGNATION'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('designation', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit(trans('messages.UPDATE'), ['class' => 'btn btn-primary form-control']) !!}
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