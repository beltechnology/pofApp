@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
    <h1>Second Level Exam {{ $secondlevelexam->id }}
        <a href="{{ url('second-level-exam/' . $secondlevelexam->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit SecondLevelExam"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['secondlevelexam', $secondlevelexam->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete SecondLevelExam',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $secondlevelexam->id }}</td>
                </tr>
                <tr><th> Exam Type </th><td> {{ $secondlevelexam->examType }} </td></tr><tr><th> DateOfExam </th><td> {{ $secondlevelexam->dateOfExam }} </td></tr><tr><th> ReportingTime </th><td> {{ $secondlevelexam->reportingTime }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
