@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
	<div class="edit_school">	
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
    	<ul class="nav navbar-nav">
	@foreach ($articles as $article)
		@if($article->moduleType ==  trans('messages.THREE'))	
			@if($article->muduleLink === "/master-questions")
				<li  class="active"><a  href="{{ url($article->muduleLink) }}">{{ $article->name }}</a></li>
			@else
				<li><a  href="{{ url($article->muduleLink) }}">{{ $article->name }} </a></li>
			@endif
		@endif
    @endforeach 		
    </ul>
  </div>
</nav>

	</div>

    <div class="table">
         <div class=" col-md-12 top-filter">
            
            <div class=" col-md-3 category-name">
            <h1>Questions</h1>
            </div>
            
            <div class=" col-md-7 category-filter">
			<a href="/master-questions/create" class="pull-right">Add Question</a>
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
            {{-- */$x=$masterquestions->firstItem()-1;;/* --}}
            @foreach($masterquestions as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->text }}</td>
                    <td>{{ $item->section }}</td>
                    <td>{{ $item->stream }}</td>
                    <td>{{ $item->marks }}</td>
                    <td>{{ $item->questionType }}</td>
                    <td>
                    <!--    <a href="{{ url('/master-questions/' . $item->questionId) }}" class="btn btn-success btn-xs" title="View fee"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/master-questions/' . $item->questionId . '/edit') }}" class="btn btn-primary btn-xs" title="Edit fee"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                    -->    {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/master-questions', $item->questionId],
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
        <div class="pagination-wrapper"> {!! $masterquestions->render() !!} </div>
    </div>

</div>
@endsection
