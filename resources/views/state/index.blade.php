@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
 <div class=" col-md-12 top-filter">
 
            <div class=" col-md-3 category-name">
            <h1>{{ trans('messages.STATE_CREATION') }}</h1>
            </div>	
     
            <div class="add-emp col-md-2" style="float:right">
            <a href="{{ url('/state/create') }}"><p>{{ trans('messages.ADD') }} <span class="glyphicon glyphicon-plus" aria-hidden="true"/></p></a>
            </div>
	</div>
	<h1 style="color:red;">  {{ session()->get('concurrency_message')}} </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>{{trans('messages.S_NO')}}</th><th style="padding-left:45px">{{trans('messages.STATE_NAME')}} </th><th class="text-right" style="padding-right:65px">{{trans('messages.ACTION')}}</th>
                </tr>
            </thead>
            <tbody>
				{{--*/$x=$state->firstItem()-1;/*--}}
            @foreach($state as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td style="padding-left:45px">{{ $item->stateName }}</td>
                    <td class="text-right" style="padding-right:45px";>
                        <!--<a href="{{ url('/state/' . $item->id) }}" class="btn btn-success btn-xs" title="{{trans('messages.VIEW_STATE')}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>-->
                        <a href="{{ url('/state/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="{{trans('messages.EDIT_STATE')}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/state', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"  />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => trans('messages.DELETE_STATE'),
                                    'onclick'=>'return confirm("Do you really  want to delete this?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper">  {!! $state->render() !!} </div>
    </div>

</div>
@endsection
