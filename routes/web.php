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
Route::get('/weeklist/{areaid}/{id}/{week}','AttendanceController@createWeeklist');
Route::get('/createSchedule','ScheduleController@createSchedule');
Route::get('/createDeductionType','DeductionController@createDeductionType');
Route::get('/showEmployeeList', 'EmployeeController@showEmployeeList');
Route::get('/editEmployeeDetails/{id}', 'EmployeeController@editEmployeeDetails');
Route::get('/viewTeamList','TeamController@viewTeamList');
Route::get('/profile/{id}','EmployeeController@viewProfile');

Route::get('/createteam','TeamController@createTeam');
Route::get('/viewMembers/{id}','TeamController@viewMembers');
Route::get('/viewprojects','ProjectsController@viewProjects');
Route::get('/newprojects','ProjectsController@createProjects');




//---------------------Area GET Routes-------------------------//

Route::get('/area','AreaController@viewArea');
Route::get('/createarea','AreaController@createArea');
Route::get('/areadetails/{areaid}','AreaController@viewChildArea');
//--------------------- END Area GET Routes-------------------------//

//---------------------Area POST Routes-------------------------//

Route::post('/areadetails/{areaid}','AreaController@saveChildAreaRecord');

//---------------------END Area POST Routes-------------------------//




//---------------------Attendance GET Routes-------------------------//

Route::get('/attendancelist', 'AttendanceController@getEmployeeAttendanceList');
Route::get('/areatiles','AttendanceController@viewAreaTileList');
Route::get('/arealocation/{areaid}','AttendanceController@viewAreaLocationTileList');

Route::get('/weektiles/{areaid}','AttendanceController@viewAreaTileWeekList');
Route::get('/areaEmployee/{areaid}','AttendanceController@getAreaEmployeeList');
Route::get('/attendance/{areaid}/{employeeid}','AttendanceController@viewAttendanceWeekList');
Route::get('/viewEmployeeAttendanceList/{partyid}/{scheduleid}','AttendanceController@viewEmployeeAttendanceList');

Route::get('generateWeekSchedule/{areaid}/{scheduleid}','AttendanceController@generateWeekSchedule');
Route::get('/viewareaattendance','AttendanceController@viewAreaAttendance');
Route::get('/generateWeekSchedule','AttendanceController@generateWeekSchedule');

//--------------------- END Attendance GET Routes-------------------------//

//---------------------Attendance POST Routes-------------------------//


Route::post('generateWeekSchedule','AttendanceController@generateWeekSchedule');
Route::post('generateWeekList','AttendanceController@generateWeekList');

//--------------------- END Attendance POST Routes-------------------------//


Route::post('/weeklist/{id}/{week}/store','ScheduleAttendanceController@store');
Route::post('/editEmployeeDetails/{id}', 'EmployeeController@updateEmployeeDetails');

Route::post('/viewMembers/{id}','TeamController@store');
Route::post('/saveSchedule','ScheduleController@store');
Route::post('/saveDeductionType','DeductionController@store');
Route::post('/saveProjectDetails' ,'ProjectsController@saveProjectDetails');
Route::post('/profile/{id}','UploadController@store');
Route::post('saveAreaDetails','AreaController@saveAreaDetails');
Route::post('saveEmployeeDetails', 'EmployeeController@saveEmployeeDetails');
Route::post('saveTeamRecord','TeamController@saveTeamRecord');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
