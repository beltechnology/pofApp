@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">

    <h1>{{ trans('messages.CITY') }}  <a href="{{ url('/citys/create') }}" class="btn btn-primary btn-xs" title="{{trans('messages.NEW_CITY')}}"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>{{trans('messages.S_NO')}}</th><th>{{trans('messages.STATE_ID')}} </th> <th>{{trans('messages.NAME_CITY')}} </th><th>{{trans('messages.ACTION')}}</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($citys as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->state_id }}</td><td>{{ $item->cityName }}</td>
                    <td>
                        <a href="{{ url('/citys/' . $item->id) }}" class="btn btn-success btn-xs" title="{{trans('messages.VIEW_CITY')}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/citys/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="{{trans('messages.EDIT_CITY')}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/citys', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="trans(messages.DELETE_CITY) " />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => trans('messages.DELETE_CITY'),
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $citys->render() !!} </div>
    </div>

</div>
@endsection
