@extends('layouts.header')

@section('content')
<div class=" col-md-10 category">
 <div class=" col-md-12 top-filter">
 
            <div class=" col-md-6 category-name">
            <h1>{{ trans('messages.TEAM_MANAGE') }}</h1>
            </div>	
     
            <div class="add-emp col-md-2" style="float:right">
            <a href="{{ url('/team/create') }}"><p>{{ trans('messages.ADD') }} <span class="glyphicon glyphicon-plus" aria-hidden="true"/></p></a>
            </div>
	</div>
	<h1 style="color:red;">  {{ session()->get('concurrency_message')}} </h1>
	<div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th >{{ trans('messages.TEAM_NAME') }}</th><th >{{ trans('messages.TEAM_CODE') }}</th><th>{{ trans('messages.TEAM_LOCATION') }}</th><th style="padding-left:30px">{{ trans('messages.TEAM_MEMBERS') }}</th><th style="padding-left:70px">{{ trans('messages.ACTIONS') }}</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($team as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->teamName }}</td>
                    <td>{{ $item->teamCode }}</td><td>{{ $item->location }}</td>					
					<td style="padding-left:27px">					@foreach($employees as $employee)						@if ( $item->teamId === $employee->teamId)							{{ $employee->name }} , 						@else													@endif					@endforeach <a href="{{ url('/teammember/'. $item->teamId. '/') }}" class="btn  btn-xs" title="View Team"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a></td>
                    <td style="padding-left:65px">
					   
                        <a href="{{ url('/team/' . $item->teamId. '/edit') }}" class="btn  btn-xs" title="Edit Team"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/team', $item->teamId],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Team" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Team',
                                    'onclick'=>'return confirm("Do you really  want to delete this?")'
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
