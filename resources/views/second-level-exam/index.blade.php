@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
    <h1>Second level exam time </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Exam Type </th><th> Date Of Exam </th><th> Reporting Time </th><th> Exam Time </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($secondlevelexam as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->examType }}</td>
					<td>{{ $item->dateOfExam }}</td>
					<td>{{ $item->reportingTime }}</td>
					<td>{{ $item->examTime }} To {{$item->tillTime}}</td>
                    <td>
                        <a href="{{ url('/second-level-exam/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit SecondLevelExam"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $secondlevelexam->render() !!} </div>
    </div>

</div>
@endsection
