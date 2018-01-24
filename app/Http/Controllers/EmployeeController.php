<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Provider\Uuid;
use DB;
use App\Employees;

class EmployeeController extends Controller
{
   public function saveEmployeeDetails(Request $request){

      $employee = new Employees;

      $employee->partyid = Uuid::uuid();
      $employee->givenname = $request->givenname;
       $employee->familyname = $request->familyname;
      $employee->middlename = $request->middlename;
      $employee->gender = $request->gender;
      $employee->email = $request->email;
      $employee->contactnumber = $request->contactnumber;
      $employee->birthday = date("Y-m-d", strtotime($request->birthday));
      $employee->age = $request->age;
      $employee->religion = $request->religion;
      $employee->civilstatus = $request->civilstatus;
      $employee->address = $request->address;
      $employee->comments = $request->comments;
      $employee->startdate =date("Y-m-d", strtotime($request->startdate));
      $employee->enddate = $request->enddate;
      $employee->statusid = $request->emp_stat;
      $employee->updatedby = $request->username;
      $employee->save();

   }
}
