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
use App\Location;
use App\User;
use Illuminate\Support\Facades\Input;
 
Route::group(array('middleware' => 'auth'), function() {
    Route::get('/home', 'HomeController@index');
	Route::resource('dashboard','dashboardController');
	Route::resource('statelist','selectstateController');
	Route::resource('archiveData','archiveController');
	Route::resource('employee','employeeController');
	Route::resource('team', 'TeamController');
	Route::resource('state', 'StateController');
	Route::resource('district', 'DistrictController');
	Route::resource('citys', 'CitysController');
	Route::resource('designations', 'DesignationsController');
	Route::resource('locations', 'LocationsController');
	Route::resource('teammember', 'TeammemberController');
	Route::resource('class-name', 'ClassNameController');
	Route::resource('schools', 'schoolsController');
	Route::resource('book-details', 'BookDetailsController');
	Route::resource('student-count', 'studentCountController');
	Route::resource('payments', 'paymentsController');
	Route::resource('fees', 'feesController');
	Route::resource('student', 'studentController');
	Route::resource('first-level', 'firstLevelController');
	Route::resource('session-year', 'SessionYearController');
	Route::resource('class-section', 'ClassSectionController');
	Route::resource('changePassword','changepasswordController');
	Route::resource('secondLevelStudent','secondLevelStudentController');
	Route::get('/changePassword','changepasswordController@index');
	Route::get('/search', 'employeeController@filter');
	Route::post('/search', 'employeeController@filter');
	Route::get('/search-team', 'TeamController@filter');
	Route::post('/search-team', 'TeamController@filter');
	Route::get('/search-student', 'studentController@filter');
	Route::post('/search-student', 'studentController@filter');
	Route::get('/search-school', 'schoolsController@filter');
	Route::get('/examCenterList', 'schoolsController@examCenterList');
	Route::post('/activate-school', 'schoolsController@activateSchool');
	Route::get('/getPDF', 'PDFController@getPDF');
	Route::get('/secondLevelAdmitCard', 'PDFController@secondLevelAdmitCard');
	Route::get('/getResultSheetData', 'PDFController@getResultSheetData');
	Route::get('/getAdmitPDF', 'PDFController@getAdmitPDF');
	Route::get('/secondLevelStudentResultSheet', 'PDFController@secondLevelStudentResultSheet');
	Route::get('/export/{entityId}', 'PDFController@export');
	Route::get('/searchFilter', 'studentController@searchFilter');
	Route::resource('/changeYear', 'SessionYearController@changeYear');
	Route::get('/studentAttendance', 'studentController@attendanceScreen');
	Route::get('/studentSecondLevel', 'studentController@studentSecondLevel');
	Route::resource('second-level-exam', 'SecondLevelExamController');
	Route::resource('module-config', 'ModuleConfigController');
	Route::post('/assignExamCenter', 'schoolsController@assignExamCenter');
	Route::resource('question-sets', 'questionSetsController');
	Route::resource('master-questions', 'masterQuestionsController');
	Route::get('/assignSchoolCenter/{id}','schoolsController@assignSchoolCenter');
	Route::get('/assignCenterToSchool','schoolsController@assignCenterToSchool');
	Route::get('/centerAllottedSchoolList','schoolsController@centerAllottedSchoolList');
	Route::get('/secondLevelAttendanceSheet','PDFController@secondLevelAttendanceSheet');
	Route::get('/secondLevelAttendance','secondLevelStudentController@secondLevelAttendance');
	Route::get('/secondLevelStudentResult','secondLevelStudentController@secondLevelStudentResult');
	Route::resource('student-result', 'studentResultController');
	Route::resource('/message', 'studentResultController');

	Route::get('/employee/create/ajax-state',function()
{
    $state_id = session()->get('currentStateId');
    $subcategories = District::where('state_id','=',$state_id)->where('districts.deleted',0)->get();
    return $subcategories;
 
});
Route::get('/employee/create/district',function()
{
    $dist_id = Input::get('dist_id');
    $subcategories = City::where('district_id','=',$dist_id)->where('citys.deleted',0)->get();
    return $subcategories;
 
});
Route::get('/locations/create/district',function()
{
    $dist_id = Input::get('dist_id');
    $subcategories = City::where('district_id','=',$dist_id)->where('citys.deleted',0)->get();
    return $subcategories;
 
});
Route::get('/team/create/district',function()
{
    $city_id = Input::get('city_id');
    $subcategories = Location::where('city_id','=',$city_id)->where('locations.deleted',0)->where('locations.state_id',session()->get('currentStateId'))->get();
    return $subcategories;
 
});
Route::get('/team/edit/district',function()
{
    $city_id = Input::get('city_id');
    $subcategories = Location::where('city_id','=',$city_id)->where('locations.deleted',0)->where('locations.state_id',session()->get('currentStateId'))->get();
    return $subcategories;
 
});
Route::get('/teammember/create/city',function()
{
    $city_id = Input::get('city_id');
    $subcategories = Location::where('city_id','=',$city_id)->where('locations.deleted',0)->get();
    return $subcategories;
 
});
Route::get('/teammember/edit/city',function()
{
    $city_id = Input::get('city_id');
    $subcategories = Location::where('city_id','=',$city_id)->where('locations.deleted',0)->get();
    return $subcategories;
 
});
Route::get('/employee/edit/district',function()
{
    $dist_id = Input::get('dist_id');
    $subcategories = City::where('district_id','=',$dist_id)->where('citys.deleted',0)->get();
    return $subcategories;
 
});
Route::get('/employee/edit/ajax-state',function()
{
    $state_id =session()->get('currentStateId');
    $subcategories = District::where('state_id','=',$state_id)->where('districts.deleted',0)->get();
    return $subcategories;
 
});
Route::get('/locations/edit/ajax-state',function()
{
    $state_id =session()->get('currentStateId');
    $subcategories = District::where('state_id','=',$state_id)->where('districts.deleted',0)->get();
    return $subcategories;
 
});
Route::get('/locations/edit/district',function()
{
    $dist_id = Input::get('dist_id');
    $subcategories = City::where('district_id','=',$dist_id)->where('citys.deleted',0)->get();
    return $subcategories;
 
});

Route::get('/citys/create/ajax-state',function()
{
    $state_id =session()->get('currentStateId');
    $subcategories = District::where('state_id','=',$state_id)->where('districts.deleted',0)->get();
    return $subcategories;
 
});
Route::get('/citys/edit/ajax-state',function()
{
    $state_id =  session()->get('currentStateId');
    $subcategories = District::where('state_id','=',$state_id)->where('districts.deleted',0)->get();
    return $subcategories;
 
});
Route::get('/schools/create/schools',function()
{
    $emp_id = Input::get('emp_id');
    $subcategories = DB::table('phones')->where('phones.entityId',$emp_id)->where('phones.deleted',0)->get();
    return $subcategories;
 
});
Route::get('/schools/edit/schools',function()
{
    $emp_id = Input::get('emp_id');
    $subcategories = DB::table('phones')->where('phones.entityId',$emp_id)->where('phones.deleted',0)->get();
    return $subcategories;
 
});
    });
	
Route::get('/', function () 
{
	return view('auth.login');
});

Route::resource('resetPassword','resetpasswordController');

Route::auth();




Route::resource('studentLogin', 'studentController@studentLogin');
Route::resource('studentLoginData', 'studentController@studentLoginData');
Route::get('getStudentResult/{id}/{stream}','PDFController@getStudentResult');
