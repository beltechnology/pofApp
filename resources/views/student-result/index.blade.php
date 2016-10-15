@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
    <div class="table">
         <div class=" col-md-12 top-filter">
            
            <div class=" col-md-3 category-name">
            <h1>Questions</h1>
            </div>
            
            <div class=" col-md-7 category-filter">
            </div>
            
            <div class="add-emp  col-md-2">
            </div>
            </div>
		 <h1 style="color:red;">  {{ session()->get('concurrency_message')}} </h1>	
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
					<th> Questions </th>
					<th> Section </th>
					<th> Stream </th>
					<th> Marks </th>
					<th> Question Type </th>
					<th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=$studentResult->firstItem()-1;;/* --}}
            @foreach($studentResult as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->questionId }}</td>
                    <td>{{ $item->questionId }}</td>
                    <td>{{ $item->stream }}</td>
                    <td>{{ $item->questionId }}</td>
                    <td>{{ $item->questionId }}</td>
                    <td>
                    <!--    <a href="{{ url('/master-questions/' . $item->questionId) }}" class="btn btn-success btn-xs" title="View fee"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/master-questions/' . $item->questionId . '/edit') }}" class="btn btn-primary btn-xs" title="Edit fee"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                    -->    {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/student-result', $item->resultId],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete fee" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete fee',
                                    'onclick'=>'return confirm("Do you really  want to delete this?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $studentResult->render() !!} </div>
    </div>

</div>
@endsection
