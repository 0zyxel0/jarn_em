<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
   public function getEmployeeAttendanceList(){
       return view("content.attendance.view_employee_attendancelist");
   }
}
