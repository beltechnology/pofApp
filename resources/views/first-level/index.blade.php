@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Firstlevel <a href="{{ url('/first-level/create') }}" class="btn btn-primary btn-xs" title="Add New firstLevel"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> EntityId </th><th> SchoolId </th><th> SessionYear </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($firstlevel as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->entityId }}</td><td>{{ $item->schoolId }}</td><td>{{ $item->sessionYear }}</td>
                    <td>
                        <a href="{{ url('/first-level/' . $item->id) }}" class="btn btn-success btn-xs" title="View firstLevel"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/first-level/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit firstLevel"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/first-level', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete firstLevel" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete firstLevel',
                                    'onclick'=>'return confirm("Do you really  want to delete this?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $firstlevel->render() !!} </div>
    </div>

</div>
@endsection
