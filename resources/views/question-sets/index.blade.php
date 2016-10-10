@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">

    <h1>Questionsets <a href="{{ url('/question-sets/create') }}" class="btn btn-primary btn-xs" title="Add New questionSet"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Setid </th><th> SetName </th><th> SessionId </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($questionsets as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->setid }}</td><td>{{ $item->setName }}</td><td>{{ $item->sessionId }}</td>
                    <td>
                        <a href="{{ url('/question-sets/' . $item->id) }}" class="btn btn-success btn-xs" title="View questionSet"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/question-sets/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit questionSet"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/question-sets', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete questionSet" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete questionSet',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $questionsets->render() !!} </div>
    </div>

</div>
@endsection
