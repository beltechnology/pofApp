@extends('layouts.header')

@section('content')
<div class=" col-md-10 category">
  <div class=" col-md-12 top-filter">
 
            <div class=" col-md-3 category-name">
            <h1>{{ trans('messages.CITY_CREATION') }}</h1>
            </div>	
     
            <div class="add-emp col-md-2" style="float:right">
            <a href="{{ url('/citys/create') }}"><p>{{ trans('messages.ADD') }} <span class="glyphicon glyphicon-plus" aria-hidden="true"/></p></a>
            </div>
			<h1 style="color:red;">  {{ session()->get('concurrency_message')}} </h1>	
	</div>  <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>{{trans('messages.S_NO')}}</th> <th>{{trans('messages.NAME_CITY')}} </th><th>{{trans('messages.DISTRICT')}} </th><th class="text-right"  style="padding-right:65px">{{trans('messages.ACTION')}}</th>
                </tr>
            </thead>
            <tbody>
            {{--*/$x=$citys->firstItem()-1;/*--}}
            @foreach($citys as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->cityName }}</td>
					 <td>{{ $item->name }}</td>
                    <td class="text-right" style="padding-right:45px">
                        <a href="{{ url('/citys/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="{{trans('messages.EDIT_CITY')}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/citys', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"  />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => trans('messages.DELETE_CITY'),
                                    'onclick'=>'return confirm("Do you really  want to delete this?")'
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
