@extends('layouts.header')

@section('content')
<div class=" col-md-10 category">
	<div class="h1-two col-md-12">
  <h1 class="text-left school_category col-md-4"><a href="{{ url('/team') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.TEAM_LIST') }} </a></h1>
  <h1 class="text-center col-md-4">{{ trans('messages.TEAM_MEMBERS') }}</h1>
  <h1 class="text-left col-md-4">
            <div class="add-emp add-school col-md-12">
            <a href="{{ url('/teammember/create') }}" title="Add New Team Member"><p>{{ trans('messages.ADD') }} <span class="glyphicon glyphicon-plus" aria-hidden="true"/></p></a>
            </div>
			</h1>
  </div>
	
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>{{ trans('messages.MEMBER_NAME') }}</th><th>{{ trans('messages.MEMBER_LOCATION') }}</th><th>{{ trans('messages.ACTIONS') }}</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($team as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->location }}</td>
                    <td><a href="{{ url('/teammember/' . $item->entityId. '/edit') }}" class="btn  btn-xs" title="Edit Team"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/teammember', $item->entityId],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Team" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Team',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $team->render() !!} </div>
    </div>

</div>
@endsection
