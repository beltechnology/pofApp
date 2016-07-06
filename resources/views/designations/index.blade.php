@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">

    <h1>{{ trans('messages.DESIGNATION') }}  <a href="{{ url('/designations/create') }}" class="btn btn-primary btn-xs" title="{{trans('messages.NEW_DESIGNATION')}}"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>{{trans('messages.S_NO')}}</th><th>{{trans('messages.NAME_DESIGNATION')}} </th><th>{{trans('messages.ACTION')}}</th>
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
                        <a href="{{ url('/designations/' . $item->id) }}" class="btn btn-success btn-xs" title="{{trans('messages.VIEW_DESIGNATION')}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/designations/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="{{trans('messages.EDIT_DESIGNATION')}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/designations', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="trans(messages.DELETE_DESIGNATION)" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => trans('messages.DELETE_DESIGNATION'),
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
