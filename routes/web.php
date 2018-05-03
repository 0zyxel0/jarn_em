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

Route::get('/createSchedule','ScheduleController@createSchedule');

Route::get('/showEmployeeList', 'EmployeeController@showEmployeeList');
Route::get('/editEmployeeDetails/{id}', 'EmployeeController@editEmployeeDetails');
Route::get('/viewTeamList','TeamController@viewTeamList');
Route::get('/profile/{id}','EmployeeController@viewProfile');

Route::get('/createteam','TeamController@createTeam');
Route::get('/viewMembers/{id}','TeamController@viewMembers');
Route::get('/viewprojects','ProjectsController@viewProjects');
Route::get('/newprojects','ProjectsController@createProjects');


//---------------------Inventory GET Routes-------------------------//



Route::get('/viewInventory','InventoryController@viewList');
//---------------------END Inventory GET Routes-------------------------//


//---------------------Inventory POST Routes-------------------------//
Route::post('store','InventoryController@saveItems');

//---------------------END Inventory POST Routes-------------------------//




//---------------------Deduction GET Routes-------------------------//
Route::get('/viewdeductionlist','DeductionController@viewEmployeeDeductionList');
Route::get('/createDeductionType','DeductionController@createDeductionType');
Route::get('/addDeduction/{partyid}','DeductionController@createDeduction');
Route::get('/addDeduction/price-ajax/{itemid}/{quantity}','DeductionController@generateSellingPrice');
//--------------------- END Deduction GET Routes-------------------------//

//---------------------Deduction POST Routes-------------------------//

Route::post('/saveDeductionType','DeductionController@store');

Route::post('/addDeduction/{partyid}','DeductionController@assignDeduction');
//---------------------END Deduction POST Routes-------------------------//

//---------------------Area GET Routes-------------------------//

Route::get('/area','AreaController@viewArea');
Route::get('/createarea','AreaController@createArea');
Route::get('/areadetails/{areaid}','AreaController@viewChildArea');
//--------------------- END Area GET Routes-------------------------//

//---------------------Area POST Routes-------------------------//

Route::post('/areadetails/{areaid}','AreaController@saveChildAreaRecord');

//---------------------END Area POST Routes-------------------------//

//---------------------Payroll GET Routes-------------------------//
Route::get('/viewList','PayrollController@viewPayrollList');
Route::get('generatePayslip','PayrollController@generateAttendanceSalary');
Route::get('area-ajax/{areaid}','PayrollController@getAreaSiteList');
Route::get('/viewEmployeePayslip/{partyid}/{startdate}/{enddate}','PayrollController@viewGeneratedPayslip');
//---------------------END Payroll GET Routes-------------------------//

//--------------------- Payroll POST Routes-------------------------//
Route::post('/viewList','PayrollController@generateAttendanceSalary');

//--------------------- END Payroll POST Routes-------------------------//


//---------------------Attendance GET Routes-------------------------//

Route::get('/attendancelist', 'AttendanceController@getEmployeeAttendanceList');
Route::get('/areatiles','AttendanceController@viewAreaTileList');
Route::get('/arealocation/{areaid}','AttendanceController@viewAreaLocationTileList');
Route::get('/weeklist/{areaid}/{id}/{week}','AttendanceController@createWeeklist');
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
Route::post('/weeklist/{id}/{week}/store','ScheduleAttendanceController@store');
//--------------------- END Attendance POST Routes-------------------------//



Route::post('/editEmployeeDetails/{id}', 'EmployeeController@updateEmployeeDetails');

Route::post('/viewMembers/{id}','TeamController@store');
Route::post('/saveSchedule','ScheduleController@store');

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
