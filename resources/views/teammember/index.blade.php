@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">
  <h1 class="text-left"><a href="{{ url('/team') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.TEAM') }} Members </a></h1>
    <h1 class="text-right">Add{{ trans('messages.TEAM') }} Member <a href="{{ url('/teammember/create') }}" class="btn btn-primary btn-xs" title="Add New Team"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Member Name</th><th>Member Location</th><th>{{ trans('messages.ACTIONS') }}</th>
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
