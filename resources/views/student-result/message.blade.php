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
                    <th>20 student Result successfully uploaded</th>
                </tr>
            </thead>
		</table>
        
    </div>

</div>
@endsection
