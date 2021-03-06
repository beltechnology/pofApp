@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Bookdetails <a href="{{ url('/book-details/create') }}" class="btn btn-primary btn-xs" title="Add New BookDetail"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> EntityId </th><th> ClassId </th><th> SchoolId </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($bookdetails as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->entityId }}</td><td>{{ $item->classId }}</td><td>{{ $item->schoolId }}</td>
                    <td>
                        <a href="{{ url('/book-details/' . $item->id) }}" class="btn btn-success btn-xs" title="View BookDetail"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/book-details/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit BookDetail"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/book-details', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete BookDetail" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete BookDetail',
                                    'onclick'=>'return confirm("Do you really  want to delete this?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $bookdetails->render() !!} </div>
    </div>

</div>
@endsection
