<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POF India</title>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../../css/style.css"/>
<link rel="stylesheet" type="text/css" href="../../css/datepicker.css"/>
<link rel="stylesheet" type="text/css" href="../../font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../../font-awesome/css/font-awesome.css">
<link href='//fonts.googleapis.com/css?family=RobotoDraft:regular,bold,italic,thin,light,bolditalic,black,medium&lang=en' rel='stylesheet' type='text/css'>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
 <script type="text/javascript" src="../../js/bootstrap.js"></script>
   <script type="text/javascript" src="../../js/bootstrap-datepicker"></script>
   <script type="text/javascript" src="../../js/commonFunctions.js"></script>

</head>

<body>

 <section id="header">
        <div class="container">
            <div class="row">
            
            <div class="main-header col-md-12">
            
            <div class="logo col-md-3">
            <img src="../../images/Logo.png" alt="logo" />
            </div>
            
            <div class="col-md-6">
            </div>
            
            <div class="logout col-md-3">
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
            </div>
            
            <div class="logout col-md-3">
            <i class="fa fa-cog fa-2x" ></i>
            </div>
            
             <div class="logout col-md-3">
            <a href="{{ url('/logout') }}"><i class="fa fa-power-off fa-2x"> </i></a>
            </div>
            
            </div>
            
            </div>
            
            </div>
        </div>
 </section>
 <section id="table-content">
        <div class="container">
            <div class="row">
            
            <div class=" col-md-12 nav-table">
            @extends('layouts.sidebar')
 			@yield('content')
         
            
 			
 