<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


//employee
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profileupdate', 'UserController@update')->name('updateprofile');
Route::get('/director/viewemployee', 'UserController@view')->name('employee');
Route::get('/director/{users}', 'UserController@show')->name('employee/show');
Route::delete('/employee/{id}','UserController@destroy')->name('employee/destroy');

//task
Route::get('/task/list', 'TaskController@view')->name('task');
Route::get('/task/create', 'TaskController@viewcreatetask')->name('createtask');
Route::post('task/store', 'TaskController@store')->name('storetask');
Route::delete('/task/delete/{id}','TaskController@destroy')->name('taskdestroy');
Route::get('/task/details/{assign}', 'TaskController@show')->name('taskshow');
Route::get('task/edit/{assign}', 'TaskController@edit')->name('task.edit');
Route::post('task/update', 'TaskController@update')->name('taskupdate');
Route::get('task/delete/file/{id}', 'TaskController@delete')->name('file.delete');
Route::post('task/update/role', 'TaskController@role')->name('updaterole');
Route::post('task/update/helpstatus/{taskid}', 'TaskController@helpstatus')->name('updatehelp');
Route::post('task/update/progress/{adminassign}', 'TaskController@updateprogress')->name('task.updateprogress');

//property
Route::get('/property', 'PropertyController@viewProperty')->name('property');
Route::get('/property/create', 'PropertyController@viewCreateProperty')->name('createproperty');
Route::post('/property/store', 'PropertyController@storeproperty')->name('storeproperty');
Route::get('/property/edit/{property}', 'PropertyController@viewedit')->name('propertyedit');
Route::post('property/update', 'PropertyController@update')->name('propertyupdate');

//sales
Route::get('/sales/{property}', 'SalesController@viewSales')->name('salesview');
Route::get('/createsales', 'SalesController@createsales')->name('sales/create');
Route::delete('/sales/delete/{sales}','SalesController@destroy')->name('destroy');
Route::post('sales/store', 'SalesController@storeSales')->name('sales/store');
Route::get('/viewdetails/{sales}', 'SalesController@show')->name('salesdetails');
Route::get('/editsales/{sales}', 'SalesController@editsales')->name('salesedit');
Route::post('sales/update', 'SalesController@update')->name('sales/update');

//attendance
Route::get('/attendance/list', 'AttendanceController@listattendance')->name('listattendance');
Route::post('/attendance/store', 'AttendanceController@store')->name('attendance/store');
Route::get('/attendance/show/{attendance}', 'AttendanceController@show')->name('showattendance');
Route::post('/attendance/tick/{attendance}', 'AttendanceController@update')->name('attendanceupdate');

//plan
Route::get('/plan/list', 'PlanningController@listplanning')->name('listplanning');
Route::get('/plan/show/{id}', 'PlanningController@showplanning')->name('showplanning');
Route::get('/plan/edit/{id}', 'PlanningController@editplanning')->name('editplanning');
Route::post('/plan/store', 'PlanningController@storeplanning')->name('storeplanning');
Route::put('/plan/update/{id}', 'PlanningController@updateplanning')->name('updateplanning');
Route::delete('/plan/delete/{id}', 'PlanningController@deleteplanning')->name('deleteplanning');

//plan activities
Route::get('/activity/list/{id}', 'PlanningActivityController@listactivities')->name('listactivities');
Route::get('/activity/edit/{id}', 'PlanningActivityController@editactivities')->name('editactivities');
Route::post('/activity/store/{id}', 'PlanningActivityController@storeactivities')->name('storeactivities');
Route::put('/activity/update/{id}', 'PlanningActivityController@updateactivities')->name('updateactivities');
Route::delete('/activity/delete/{id}', 'PlanningActivityController@deleteactivities')->name('deleteactivities');

//evaluation
Route::get('/evaluation', 'EvaluationController@listevaluation')->name('listevaluation');
Route::get('/evaluation/edit/{evaluation}', 'EvaluationController@editevaluation')->name('editevaluation');
Route::get('/evaluation/create/{evaluation}', 'EvaluationController@createevaluation')->name('createevaluation');
Route::post('/evaluation/store', 'EvaluationController@store')->name('evaluation/store');
Route::get('/evaluation/show/{id}', 'EvaluationController@showEvaluation')->name('showevaluation');
Route::get('/evaluation/rubric', 'EvaluationController@rubric')->name('rubric');
Route::post('/evaluation/update/{evaluation}', 'EvaluationController@update')->name('evaluation/update');

//performance
Route::get('/performance/list', 'PerformanceController@listperformance')->name('listperformance');
Route::get('/performance/form', 'PerformanceController@form')->name('formperformance');
Route::post('/performance/create', 'PerformanceController@store')->name('performance/create');
Route::get('/performance/edit/{performanceid}', 'PerformanceController@edit')->name('performance/edit');
Route::post('/performance/update/{performanceid}', 'PerformanceController@update')->name('performance/update');

//PDF
Route::get('/evaluation/generatepdf/{id}', 'PDFController@generatepdf')->name('generatepdf');


/*
director
view sales
evaluate
view evaluation

admin
create properties
view sales
view evaluation

sales
update sales
view sales
delete sales
view evaluation*/



//Route::get('/searchtask', 'TaskController@search')->name('searchtask');
//Route::get('students/{student}/edit', 'StudentController@edit')->name('students.edit');

//sales

//evaluation







