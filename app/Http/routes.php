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
use App\District;
use App\City;
use Illuminate\Support\Facades\Input;
 
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
	Route::resource('class-name', 'ClassNameController');
	
	Route::get('/employee/create/ajax-state',function()
{
    $state_id = Input::get('state_id');
    $subcategories = District::where('state_id','=',$state_id)->get();
    return $subcategories;
 
});
Route::get('/employee/create/district',function()
{
    $dist_id = Input::get('dist_id');
    $subcategories = City::where('district_id','=',$dist_id)->get();
    return $subcategories;
 
});
Route::get('/employee/edit/district',function()
{
    $dist_id = Input::get('dist_id');
    $subcategories = City::where('district_id','=',$dist_id)->get();
    return $subcategories;
 
});
Route::get('/employee/edit/ajax-state',function()
{
    $state_id = Input::get('state_id');
    $subcategories = District::where('state_id','=',$state_id)->get();
    return $subcategories;
 
});
Route::get('/citys/create/ajax-state',function()
{
    $state_id = Input::get('state_id');
    $subcategories = District::where('state_id','=',$state_id)->get();
    return $subcategories;
 
});
Route::get('/citys/edit/ajax-state',function()
{
    $state_id = Input::get('state_id');
    $subcategories = District::where('state_id','=',$state_id)->get();
    return $subcategories;
 
});

    });
	
Route::get('/', function () {
    return view('login');
});

Route::auth();

//Route::get('/home', 'HomeController@index');



