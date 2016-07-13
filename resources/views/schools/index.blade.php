@extends('layouts.header')
@section('content')
    <div class=" col-md-9 category">


    <h1>Schools <a href="{{ url('/schools/create') }}" class="btn btn-primary btn-xs" title="Add New school"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
		@if(Session::has('flash_message'))
		<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('flash_message') }}</p>
		@endif
		<div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
					<th> School Name </th>
					<th>School Code </th>
					<th> Principal Name </th>
					<th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($schools as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->schoolName }}</td>
					<td>{{ $item->schoolcode }}</td>
					<td>{{ $item->PrincipalName }}</td>
                    <td>
                        <a href="{{ url('/schools/' . $item->entityId . '/edit') }}" class="btn btn-primary btn-xs" title="Edit school"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/schools', $item->entityId],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete school" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete school',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $schools->render() !!} </div>
    </div>

</div>
@endsection
