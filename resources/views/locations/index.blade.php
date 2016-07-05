@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">

    <h1>Locations <a href="{{ url('/locations/create') }}" class="btn btn-primary btn-xs" title="Add New Location"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Location </th><th> Deleted </th><th> Status </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($locations as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->location }}</td><td>{{ $item->deleted }}</td><td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ url('/locations/' . $item->id) }}" class="btn btn-success btn-xs" title="View Location"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/locations/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Location"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/locations', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Location" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Location',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $locations->render() !!} </div>
    </div>

</div>
@endsection
