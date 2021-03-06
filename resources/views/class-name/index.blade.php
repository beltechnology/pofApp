@extends('layouts.header')

@section('content')
<div class=" col-md-10 category">

     <div class=" col-md-12 top-filter">
 
            <div class=" col-md-3 category-name">
            <h1>{{ trans('messages.CLASS_CREATION') }}</h1>
            </div>	
     
            <div class="add-emp col-md-2" style="float:right">
            <a href="{{ url('/class-name/create') }}"><p>{{ trans('messages.ADD') }} <span class="glyphicon glyphicon-plus" aria-hidden="true"/></p></a>
            </div>
	</div>
		<h1 style="color:red;">  {{ session()->get('concurrency_message')}} </h1>		
	<div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>{{trans('messages.S_NO')}}</th><th class="text-center">{{trans('messages.NAME_CLASS')}} </th><th class="text-right" style="padding-right:45px">{{trans('messages.ACTION')}}</th>
                </tr>
            </thead>
            <tbody>
            {{--*/$x=$classname->firstItem()-1;/*--}}
            @foreach($classname as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td class="text-center">{{ $item->name }}</td>
                    <td class="text-right" style="padding-right:30px">
                        <a href="{{ url('/class-name/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="{{ trans('messages.EDIT_CLASS')}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/class-name', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"  />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => trans('messages.CLASS_DELETE'),
                                    'onclick'=>'return confirm("Do you really  want to delete this?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $classname->render() !!} </div>
    </div>

</div>
@endsection
