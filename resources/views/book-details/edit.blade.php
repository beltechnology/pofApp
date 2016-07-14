@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit BookDetail {{ $bookdetail->id }}</h1>

    {!! Form::model($bookdetail, [
        'method' => 'PATCH',
        'url' => ['/book-details', $bookdetail->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('entityId') ? 'has-error' : ''}}">
                {!! Form::label('entityId', 'Entityid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('entityId', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('entityId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('classId') ? 'has-error' : ''}}">
                {!! Form::label('classId', 'Classid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('classId', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('classId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('schoolId') ? 'has-error' : ''}}">
                {!! Form::label('schoolId', 'Schoolid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('schoolId', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('schoolId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('sessionYear') ? 'has-error' : ''}}">
                {!! Form::label('sessionYear', 'Sessionyear', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('sessionYear', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('sessionYear', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('noofBookFirstVisitPMO') ? 'has-error' : ''}}">
                {!! Form::label('noofBookFirstVisitPMO', 'Noofbookfirstvisitpmo', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('noofBookFirstVisitPMO', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('noofBookFirstVisitPMO', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('noofBookFirstVisitPSO') ? 'has-error' : ''}}">
                {!! Form::label('noofBookFirstVisitPSO', 'Noofbookfirstvisitpso', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('noofBookFirstVisitPSO', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('noofBookFirstVisitPSO', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('noofBookLastVisitPMO') ? 'has-error' : ''}}">
                {!! Form::label('noofBookLastVisitPMO', 'Noofbooklastvisitpmo', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('noofBookLastVisitPMO', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('noofBookLastVisitPMO', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('noofBookLastVisitPSO') ? 'has-error' : ''}}">
                {!! Form::label('noofBookLastVisitPSO', 'Noofbooklastvisitpso', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('noofBookLastVisitPSO', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('noofBookLastVisitPSO', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('returnBook') ? 'has-error' : ''}}">
                {!! Form::label('returnBook', 'Returnbook', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('returnBook', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('returnBook', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('other') ? 'has-error' : ''}}">
                {!! Form::label('other', 'Other', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('other', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('other', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
                {!! Form::label('total', 'Total', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('total', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
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