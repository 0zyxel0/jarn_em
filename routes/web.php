<?php

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

Route::get('/dashboard', function () {
    return view('content.dashboard');
});

Route::get('/show','UploadController@show');



Route::get('/newEmployee','EmployeeController@newEmployee');

Route::get('/showEmployeeList', 'EmployeeController@showEmployeeList');
Route::get('/editEmployeeDetails/{id}', 'EmployeeController@editEmployeeDetails');
Route::get('/viewTeamList','TeamController@viewTeamList');
Route::get('/profile/{id}','EmployeeController@viewProfile');
Route::get('/area','AreaController@viewArea');
Route::get('/createarea','AreaController@createArea');
Route::get('/createteam','TeamController@createTeam');
Route::get('/viewMembers/{id}','TeamController@viewMembers');

Route::get('/attendancelist', 'AttendanceController@getEmployeeAttendanceList');

Route::post('/profile/{id}','UploadController@store');
Route::post('saveAreaDetails','AreaController@saveAreaDetails');
Route::post('saveEmployeeDetails', 'EmployeeController@saveEmployeeDetails');
Route::post('saveTeamRecord','TeamController@saveTeamRecord');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
