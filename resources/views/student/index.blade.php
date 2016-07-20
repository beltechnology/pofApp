@extends('layouts.header')
@section('content')
<div class=" col-md-9 category">
 <div class="edit_school">
		
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
   		
    	<ul class="nav navbar-nav">
       <li><a href="{{ url('/schools/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_SCHOOL_PROFILE') }} </a></li>
      <li><a href="{{ url('/book-details/'.session()->get('entityId').'/edit') }}"> {{ trans('messages.TABS_BOOK_DETAIL') }}</a></li>
      <li><a href="{{ url('/student-count/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_NO_OF_STUDENTS_FROM_SCHOOL') }}</a></li>
      <li><a href="{{ url('/payments/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_PAYMENT_MODE') }}</a></li>
	  <li><a href="{{ url('/fees/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_FEES') }}</a></li>
	  <li class="active"><a href="{{ url('/student/') }}">{{ trans('messages.TABS_STUDENT_REGISTRATION') }}</a></li>
	  <li><a href="{{ url('/first-level/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_FIRST_LEVEL_EXAM_TIME') }}</a></li>
    </ul>
  </div>
</nav>
 <div class="h1-two col-md-12">
	 <h1 class="text-left col-md-4"><a href="{{ url('/fees/'.session()->get('entityId').'/edit') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.TABS_FEES') }}</a></h1>
      <h1 class="text-center col-md-4"></h1>
	    <div class="add-emp add-school col-md-2">
            <a href="{{ url('/student/create') }}" title="Add New student"><p>{{ trans('messages.ADD') }} <span class="glyphicon glyphicon-plus" aria-hidden="true"/></p></a>
            </div>
  </div>
	 
	</div>
    
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>{{ trans('messages.STUDENT_NAME') }}</th><th>{{ trans('messages.DOB') }}</th><th>{{ trans('messages.BOOKDETAIL_CLASS') }}</th><th>{{ trans('messages.ROLL_NO') }}</th><th> {{ trans('messages.HANDICAPPED') }}</th><th>{{ trans('messages.ACTIONS') }}<input type="checkbox"></th><th>{{ trans('messages.EDIT') }}</th><th>{{ trans('messages.DELETE') }}</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($student as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->studentName }}</td>
					<td>{{ $item->dob }}</td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->rollNo }}</td>
					<td>@if($item->handicapped === 0)  NO @else  Yes @endif</td>
					<td><input type="checkbox"></td>
                    <td>
                        <a href="{{ url('/student/' . $item->entityId . '/edit') }}" class="btn btn-primary btn-xs" title="Edit student"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
					</td>
					<td>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/student', $item->entityId],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete student" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete student',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $student->render() !!} </div>
    </div>

</div>
@endsection
