<?php

namespace App\Http\Controllers;

use App\EmployeeArea;
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

       $sched = Schedule::all('scheduleid','week_number','startdate','enddate');
       $convs_sched = json_encode($sched);
       return view("content.attendance.view_employee_attendancelist", ['data'=>json_decode($convs ,true),'data2'=>json_decode($convs_prj ,true),'area'=>json_decode($convs_area,true),'emps'=>json_decode($convs_emps,true),'sched'=>json_decode($convs_sched,true)]);
   }



   public function createWeeklist($id){

        $emp = Employees::all()->where('partyid',$id);
       $sked = Schedule::all()->take(1);
        $area = Area::all('areaid','name');
        $project = Project::all('projectid','project_name');


       return view('content.attendance.create_attendancelist',compact('sked','emp','area','project'));
   }



   public function createEmployeeAttendance(){
       return view('content.attendance.view_attendanceweeklist');
   }

    public function generateWeekSchedule(Request $request){

       $areaid = $request->get('areaid');
       $scheduleid = $request->get('scheduleid');

        $list = DB::table('employees')
            ->select('employees.partyid','employees.givenname','employees.familyname')
            ->join('employee_areas' ,'employees.partyid' ,'=','employee_areas.partyid')
            ->where ('employee_areas.areaid',$areaid)
            ->get();
        $conv_list = json_encode($list);

       return view('content.attendance.view_employee_attendancelist',['data'=>json_decode($conv_list,true)]);
    }


    public function viewAreaAttendance()
    {

        $area = Area::all('areaid','name');
        $schedule = Schedule::all('scheduleid','week_number');

        return view('content.attendance.view_select_weeklist',compact('area','schedule'));
    }

    public function generateWeekList(Request $request){
        return $input = $request->all();

    }



}
