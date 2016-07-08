@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Schooles <a href="{{ url('/schooles/create') }}" class="btn btn-primary btn-xs" title="Add New schoole"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Session </th><th> DistributionDate </th><th> ClossingDate </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($schooles as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->session }}</td><td>{{ $item->distributionDate }}</td><td>{{ $item->clossingDate }}</td>
                    <td>
                        <a href="{{ url('/schooles/' . $item->id) }}" class="btn btn-success btn-xs" title="View schoole"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/schooles/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit schoole"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/schooles', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete schoole" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete schoole',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $schooles->render() !!} </div>
    </div>

</div>
@endsection
