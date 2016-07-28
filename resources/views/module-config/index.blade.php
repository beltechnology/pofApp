@extends('layouts.header')
@section('content')
    <div class=" col-md-10 category">

    <h1>Moduleconfig <a href="{{ url('/module-config/create') }}" class="btn btn-primary btn-xs" title="Add New ModuleConfig"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> DesignationId </th><th> ModuleType </th><th> Name </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($moduleconfig as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->designationId }}</td><td>{{ $item->moduleType }}</td><td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ url('/module-config/' . $item->id) }}" class="btn btn-success btn-xs" title="View ModuleConfig"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/module-config/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit ModuleConfig"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/module-config', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete ModuleConfig" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete ModuleConfig',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $moduleconfig->render() !!} </div>
    </div>

</div>
@endsection
