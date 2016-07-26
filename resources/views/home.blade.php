@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
            
            <div class=" col-md-12 top-filter">
            
            <div class=" col-md-3 category-name">
            <h1>Employee Creation</h1>
            </div>
            
            <div class=" col-md-7 category-filter">
            
            <div class="row">
          
          <div class="styled-select blue semi-square col-md-2">
  			<select>
    		<option>Select Employee Name</option>
    		<option>The second option</option>
    		<option>The third option</option>
            <option>The Fourth option</option>
    		<option>The Fifth option</option>
            <option>The Six option</option>
    		<option>The Seven option</option>
            <option>The Eight option</option>
    		<option>The Nine option</option>
  			</select>
		</div>
        
         <div class="styled-select blue semi-square select-location col-md-2">
  			<select>
    		<option>Select Location</option>
    		<option>The second option</option>
    		<option>The third option</option>
            <option>The Fourth option</option>
    		<option>The Fifth option</option>
            <option>The Six option</option>
    		<option>The Seven option</option>
            <option>The Eight option</option>
    		<option>The Nine option</option>
  			</select>
		</div>
         <div class="styled-select blue semi-square school-name col-md-2">
  			<select>
    		<option>School Name</option>
    		<option>The second option</option>
    		<option>The third option</option>
            <option>The Fourth option</option>
    		<option>The Fifth option</option>
            <option>The Six option</option>
    		<option>The Seven option</option>
            <option>The Eight option</option>
    		<option>The Nine option</option>
  			</select>
		</div>
        
    		</div>  
            
          
            
            </div>
            
            <div class="add-emp col-md-2">
            <a href="#"><p>Add +</p></a>
            </div>
            
            </div>
            
            <div class="main-table col-md">
            <table border="0" bgcolor="#eeeeee">
   <thead bgcolor="#ffffff" style="color:#4b4b4b">
      <tr class="table-heading">
        <th width="200" class="emp-name"><span><i class="fa fa-square-o" aria-hidden="true"></i></span>Employee Name</th>
        <th width="80" class="emp-id">Employee Id</th>
        <th width="80" class="emp-dob">DOB</th>
        <th width="110" class="emp-no">Contact Number</th>
        <th width="200" class="emp-location">Location</th>
        <th width="75" class="emp-team">Team Name</th>
        <th width="20"></th>
        <th width="20"></th>
        <th width="20"></th>
      </tr>
    </thead>
    <tr>
      <th width="200"><span><i class="fa fa-square-o" aria-hidden="true"></i></span>Trilok Singh</th>
      <td width="80">POF101</td>
      <td width="80">02/03/1992</td>
      <td width="110">012 345 6789</td>
      <td width="200">Amarpali circle,vaishali nagar</td>
      <td width="75">Team1</td>
      <td width="20"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-files-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     
    </tr>
    
    <tr>
      <th width="200"><span><i class="fa fa-square-o" aria-hidden="true"></i></span>Ravi Kumawat</th>
       <td width="80">POF101</td>
      <td width="80">02/03/1992</td>
      <td width="110">012 345 6789</td>
      <td width="200">Amarpali circle,vaishali nagar</td>
      <td width="75">Team1</td>
      <td width="20"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-files-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     
    </tr>
    
    <tr>
      <th width="200"><span><i class="fa fa-square-o" aria-hidden="true"></i></span>Sanjay Sisodiya</th>
      <td width="80">POF101</td>
      <td width="80">02/03/1992</td>
      <td width="110">012 345 6789</td>
      <td width="200">Amarpali circle,vaishali nagar</td>
      <td width="75">Team1</td>
      <td width="20"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-files-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     
    </tr>
    
   <tr>
      <th width="200"><span><i class="fa fa-square-o" aria-hidden="true"></i></span>Mahendra Singh Shekhawat</th>
      <td width="80">POF101</td>
      <td width="80">02/03/1992</td>
      <td width="110">012 345 6789</td>
      <td width="200">Amarpali circle,vaishali nagar</td>
      <td width="75">Team1</td>
      <td width="20"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-files-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     
    </tr>
    
     <tr>
      <th width="200"><span><i class="fa fa-square-o" aria-hidden="true"></i></span>Trilok Singh</th>
      <td width="80">POF101</td>
      <td width="80">02/03/1992</td>
      <td width="110">012 345 6789</td>
      <td width="200">Amarpali circle,vaishali nagar</td>
      <td width="75">Team1</td>
      <td width="20"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-files-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     
    </tr>
    
    <tr>
      <th width="200"><span><i class="fa fa-square-o" aria-hidden="true"></i></span>Ravi Kumawat</th>
       <td width="80">POF101</td>
      <td width="80">02/03/1992</td>
      <td width="110">012 345 6789</td>
      <td width="200">Amarpali circle,vaishali nagar</td>
      <td width="75">Team1</td>
      <td width="20"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-files-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     
    </tr>
    
    <tr>
      <th width="200"><span><i class="fa fa-square-o" aria-hidden="true"></i></span>Sanjay Sisodiya</th>
      <td width="80">POF101</td>
      <td width="100">02/03/1992</td>
      <td width="110">012 345 6789</td>
      <td width="200">Amarpali circle,vaishali nagar</td>
      <td width="75">Team1</td>
      <td width="20"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-files-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     
    </tr>
    
   <tr>
      <th width="200"><span><i class="fa fa-square-o" aria-hidden="true"></i></span>Mahendra Singh Shekhawa</th>
      <td width="80">POF101</td>
      <td width="80">02/03/1992</td>
      <td width="110">012 345 6789</td>
      <td width="200">Amarpali circle,vaishali nagar</td>
      <td width="75">Team1</td>
      <td width="20"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-files-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     
    </tr>

    <tr>
      <th width="200"><span><i class="fa fa-square-o" aria-hidden="true"></i></span>Trilok Singh</th>
      <td width="80">POF101</td>
      <td width="80">02/03/1992</td>
      <td width="110">012 345 6789</td>
      <td width="200">Amarpali circle,vaishali nagar</td>
      <td width="75">Team1</td>
      <td width="20"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-files-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     
    </tr>
    
    <tr>
      <th width="200"><span><i class="fa fa-square-o" aria-hidden="true"></i></span>Ravi Kumawat</th>
       <td width="80">POF101</td>
      <td width="80">02/03/1992</td>
      <td width="110">012 345 6789</td>
      <td width="200">Amarpali circle,vaishali nagar</td>
      <td width="75">Team1</td>
      <td width="20"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-files-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     
    </tr>
    
    <tr>
      <th width="200"><span><i class="fa fa-square-o" aria-hidden="true"></i></span>Sanjay Sisodiya</th>
      <td width="80">POF101</td>
      <td width="100">02/03/1992</td>
      <td width="110">012 345 6789</td>
      <td width="200">Amarpali circle,vaishali nagar</td>
      <td width="75">Team1</td>
      <td width="20"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-files-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     
    </tr>
    
   <tr>
      <th width="200"><span><i class="fa fa-square-o" aria-hidden="true"></i></span>Mahendra Singh Shekhawa</th>
      <td width="80">POF101</td>
      <td width="80">02/03/1992</td>
      <td width="110">012 345 6789</td>
      <td width="200">Amarpali circle,vaishali nagar</td>
      <td width="75">Team1</td>
      <td width="20"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-files-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     
    </tr>
    
    <tr>
      <th width="200"><span><i class="fa fa-square-o" aria-hidden="true"></i></span>Trilok Singh</th>
      <td width="80">POF101</td>
      <td width="80">02/03/1992</td>
      <td width="110">012 345 6789</td>
      <td width="200">Amarpali circle,vaishali nagar</td>
      <td width="75">Team1</td>
      <td width="20"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-files-o" aria-hidden="true"></i></a></td>
      <td width="20"><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
     
    </tr>

   
  </table>
  
  			
            </div>
            
            </div>  
                     
@endsection
