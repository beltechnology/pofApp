<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(array('middleware' => 'auth'), function() {
    Route::get('/home', 'HomeController@index');
	Route::resource('employee', 'employeeController');
	Route::resource('team', 'TeamController');
	//Route::get('employee', 'employeeController@dropdown');
	Route::resource('state', 'StateController');
	Route::resource('district', 'DistrictController');
	Route::resource('citys', 'CitysController');
	Route::resource('designations', 'DesignationsController');
	Route::resource('locations', 'LocationsController');
	Route::resource('teammember', 'TeammemberController');
    });
	
Route::get('/', function () {
    return view('login');
});

Route::auth();

//Route::get('/home', 'HomeController@index');



Route::resource('class-name', 'ClassNameController');