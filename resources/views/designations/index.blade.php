@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">

    <h1>Designations <a href="{{ url('/designations/create') }}" class="btn btn-primary btn-xs" title="Add New Designation"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Designation </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($designations as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->designation }}</td>
                    <td>
                        <a href="{{ url('/designations/' . $item->id) }}" class="btn btn-success btn-xs" title="View Designation"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/designations/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Designation"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/designations', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Designation" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Designation',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $designations->render() !!} </div>
    </div>

</div>
@endsection
