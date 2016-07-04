@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">

    <h1>Team <a href="{{ url('/team/create') }}" class="btn btn-primary btn-xs" title="Add New Team"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="main-table col-md">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Team Name</th><th> Team Code </th><th>Team Location</th><th>Team Member</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($team as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->teamName }}</td>
                    <td>{{ $item->teamCode }}</td><td>{{ $item->teamLocation }}</td><td> <a href="{{ url('/team/' . $item->teamId) }}" class="btn  btn-xs" title="View Team"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a></td>
                    <td>
					   
                        <a href="{{ url('/team/' . $item->teamId. '/edit') }}" class="btn  btn-xs" title="Edit Team"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/team', $item->teamId],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Team" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Team',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $team->render() !!} </div>
    </div>

</div>
@endsection
