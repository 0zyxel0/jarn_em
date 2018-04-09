<?php

namespace App\Http\Controllers;

use App\EmployeeArea;
use App\EmployeeAttendance;
use App\EmployeeImage;
use App\EmployeeTeam;
use App\EmployeeTeamAssignment;
use App\Schedule;
use App\ScheduleAttendanceStatus;
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



   public function createWeeklist($id, $week){

        $emp = Employees::all()->where('partyid',$id);
       $sked = Schedule::all()->where('scheduleid',$week);
        $area = Area::select('areaid','name')->where('parentareaid',$id)->get();
        $project = Project::all('projectid','project_name');

       return view('content.attendance.create_attendancelist',compact('sked','emp','area','project'));
   }



   public function viewEmployeeAttendanceList($partyid, $scheduleid){

$employee_name = Employees::all('givenname','familyname','partyid')->where('partyid',$partyid);
       $conv_name = json_encode($employee_name);

        $schedule_name = Schedule::all('scheduleid','week_number','year_number')->where('scheduleid',$scheduleid);
       $conv_week = json_encode($schedule_name);


       $attendance_data = DB::table('employees')
           ->select('employees.partyid','employees.givenname','employees.familyname','areas.name','projects.project_name','schedule_attendances.startdate','schedule_attendances.isPresent','schedule_attendances.presenttype','schedules.week_number','schedules.year_number')
           ->leftJoin('schedule_attendances','employees.partyid','=','schedule_attendances.partyid')
           ->leftJoin('schedules','schedule_attendances.scheduleid','=','schedules.scheduleid')
           ->leftJoin('projects','schedule_attendances.projectid','=','projects.projectid')
           ->leftJoin('areas','areas.areaid','=','schedule_attendances.areaid')
           ->where('employees.partyid',$partyid)
           ->where('schedules.scheduleid',$scheduleid)
       ->get();

        $conv_data = json_encode($attendance_data);

       return view('content.attendance.view_employee_attendancelist',['data'=>json_decode($conv_data,true),'emp_data'=>json_decode($conv_name,true),'week_data'=>json_decode($conv_week,true)]);
   }

    //public function generateWeekSchedule(Request $request){
        public function generateWeekSchedule($areaid,$scheduleid){
            $week = DB::table('schedules')
                ->where('scheduleid',$scheduleid)
                ->get();

        $conv_week = json_encode($week);
        $list = DB::select('
                           SELECT 
                           x.partyid 
                           , x.givenname
                           , x.familyname
                           , "a" as status            
                           FROM (
                            SELECT
                            e.partyid as partyid,
                            e.givenname as givenname,
                            e.familyname as familyname
                            ,s.scheduleid as scheduleid
                          
                            From employees e
                            LEFT Join employee_areas ea on ea.partyid = e.partyid
                            LEFT JOIN schedule_attendances sa on e.partyid = sa.partyid
                            LEFT join schedules s on s.scheduleid = sa.scheduleid
                            LEFT join (
                select s1.scheduleid,sas.status
                                        from schedules s1
                                        left join schedule_attendance_statuses sas on sas.scheduleid = s1.scheduleid
                                        where s1.scheduleid = "'.$scheduleid.'" 
                                       
                                      ) t1 on sa.scheduleid = t1.scheduleid
                            where ea.areaid = "'.$areaid.'" OR sa.areaid is NULL
                
            and s.scheduleid ="'.$scheduleid.'")x
           group by x.scheduleid
                            ');







        $conv_list = json_encode($list);


        return view('content.attendance.update_employee_attendance',['data'=>json_decode($conv_list,true),'data_week'=>json_decode($conv_week,true)]);
    }







public function viewAreaTileList(){
    $area = Area::select('areaid','name')->whereNull('parentareaid')->get();

        return view('content.attendance.view_areatile', compact('area'));
}

public function viewAreaLocationTileList($parentid){
    $area = Area::select('areaid','name')->where('parentareaid',$parentid)->get();

    return view('content.attendance.view_arealocationtile', compact('area'));
}


public function viewAreaTileWeekList($areaid){

    $area = Area::all('areaid','name')->where('areaid',$areaid);
    $week = Schedule::all();
    return view('content.attendance.view_areatile_weeklist',compact('week','area'));
}

public function getEmployeeAreaCount(){
    $employee = DB::table('employees')
        ->select(DB::raw('count(*) as user_count'))
        ->leftJoin('employee_areas','employees.partyid','=','employee_areas.partyid')
        ->leftJoin('areas','employee_areas.areaid','=','areas.areaid')
        ->get();
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


public function getAreaEmployeeList($areaid){

    $area = DB::select('
        SELECT areaid, name
        FROM areas
        WHERE areaid = "'.$areaid.'"
    ');
    $area_json = json_encode($area);


    $employeelist = DB::select('
          select a.areaid,a.name,e.partyid, e.givenname,e.familyname 
from employee_areas eas
left join areas a on eas.areaid = a.areaid
left join employees e on eas.partyid = e.partyid
where eas.areaid = "'.$areaid.'"


    ');

    $employee_json = json_encode($employeelist);

    return view('content.attendance.view_employeelist',['employee'=>json_decode($employee_json,true),'area'=>json_decode($area_json,true)]);
}

public function viewAttendanceWeekList($areaid,$employeeid){

    $employee = Employees::all('givenname','familyname','partyid')->where('partyid',$employeeid);
    $area = Area::all('areaid','name')->where('areaid',$areaid);
    $week = Schedule::all();







    return view('content.attendance.view_employee_weeklist',compact('week','area','employee'));
}



}
