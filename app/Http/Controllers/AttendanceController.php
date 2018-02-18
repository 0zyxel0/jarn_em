<?php

namespace App\Http\Controllers;

use App\EmployeeAttendance;
use App\EmployeeImage;
use App\EmployeeTeam;
use App\EmployeeTeamAssignment;
use App\Schedule;
use Illuminate\Http\Request;
use Faker\Provider\Uuid;
use DB;
use App\Employees;
use App\EmployeeSalary;
use App\Area;
use Illuminate\Support\Facades\Input;
use App\Project;

class AttendanceController extends Controller
{
   public function getEmployeeAttendanceList(){

       $query = DB::table('employee_teams')
           ->select('employee_teams.teamid','employee_teams.name as Teamname')
           ->join('areas', 'employee_teams.areaid', '=', 'areas.areaid')
           ->get();
       $convs = json_encode($query);

       $proj = Project::all('projectid','project_code');
       $convs_prj = json_encode($proj);

       $area = Area::all('areaid','name');
       $convs_area = json_encode($area);

       $emps = Employees::all('partyid','givenname','familyname');
       $convs_emps = json_encode($emps);

       return view("content.attendance.view_employee_attendancelist", ['data'=>json_decode($convs ,true),'data2'=>json_decode($convs_prj ,true),'area'=>json_decode($convs_area,true),'emps'=>json_decode($convs_emps,true)]);
   }



   public function createWeeklist(){


       $sked = Schedule::all();


       return view('content.attendance.create_attendancelist',compact('sked'));
   }
}
