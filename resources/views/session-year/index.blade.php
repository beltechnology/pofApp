@extends('layouts.header')

@section('content')
<div class=" col-md-10 category">

     <div class=" col-md-12 top-filter">
 
            <div class=" col-md-3 category-name">
            <h1>{{ trans('messages.SESSION_YEAR_CREATION') }}</h1>
            </div>	
     
            <div class="add-emp col-md-2" style="float:right">
            <a href="{{ url('/session-year/create') }}"><p>{{ trans('messages.ADD') }} <span class="glyphicon glyphicon-plus" aria-hidden="true"/></p></a>
            </div>
	</div>
		<h1 style="color:red;">  {{ session()->get('concurrency_message')}} </h1>		
	<div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>{{trans('messages.S_NO')}}</th><th class="text-center">{{trans('messages.SESSION_YEAR')}} </th><th class="text-right" style="padding-right:45px">{{trans('messages.ACTION')}}</th>
                </tr>
            </thead>
            <tbody>
            {{--*/$x=$sessionyear->firstItem()-1;/*--}}
            @foreach($sessionyear as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td class="text-center">{{ $item->sessionYear }}</td>
					@if ($item->status == '0')		
                    <td class="text-right" style="padding-right:30px">
                        <a href="{{ url('/session-year/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="{{ trans('messages.SESSION_EDIT')}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/session-year', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"  />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => trans('messages.SESSION_DELETE'),
                                    'onclick'=>'return confirm("Do you really  want to delete this?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
					@else
					<td> </td>
					@endif 
						
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $sessionyear->render() !!} </div>
    </div>

</div>
@endsection
