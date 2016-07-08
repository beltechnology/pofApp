@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">
  <div class=" col-md-12 top-filter">
 
            <div class=" col-md-3 category-name">
            <h1>{{ trans('messages.DISTRICT_CREATION') }}</h1>
            </div>	
     
            <div class="add-emp col-md-2" style="float:right">
            <a href="{{ url('/district/create') }}"><p>{{ trans('messages.ADD') }} <span class="glyphicon glyphicon-plus" aria-hidden="true"/></p></a>
            </div>
	</div>  
   <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
					<th>{{trans('messages.S_NO')}}</th><th>{{trans('messages.NAME_DISTRICT')}} </th><th class="text-right" style="padding-right:60px">{{trans('messages.ACTIONS')}}</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($district as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                   <td>{{ $item->name }}</td>
                    <td class="text-right" style="padding-right:42px">
                        <a href="{{ url('/district/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="{{trans('messages.EDIT_DISTRICT')}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/district', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="trans(messages.DELETE_DISTRICT)" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => trans('messages.DELETE_DISTRICT'),
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $district->render() !!} </div>
    </div>

</div>
@endsection
