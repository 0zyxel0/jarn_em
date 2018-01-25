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

Route::get('/newEmployee', function () {
    return view('content.employee.new_employee');
});

Route::get('/showEmployeeList', 'EmployeeController@showEmployeeList');
Route::get('/editEmployeeDetails/{id}', 'EmployeeController@editEmployeeDetails');


Route::post('saveEmployeeDetails', 'EmployeeController@saveEmployeeDetails');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
