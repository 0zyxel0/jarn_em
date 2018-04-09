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
use App\ScheduleAttendance;
use App\ScheduleAttendanceStatus;

class ScheduleAttendanceController extends Controller
{
    public function store(Request $request){




        $genid = Uuid::uuid();

      // $input = $request->all();
        $partyid = $request->get('partyid');
        $scheduleid = $request->get('scheduleid');
        $username = $request->get('username');
        $area = $request->get('areaid');
        $startdate = $request->get('startdate');
        $enddate = $request->get('enddate');
        $ispresent = $request->get('ispresent');
        $presenttype = $request->get('presenttype');
        $projectid = $request->get('projectid');

        $dataset = [];

        foreach ($ispresent as $key => $value) {
            $dataset[] = ['scheduleattendanceid' => Uuid::uuid()
                          ,'scheduleid'=>$scheduleid
                          ,'partyid'=>$partyid
                          ,'ispresent'=>$ispresent[$key]
                          ,'presenttype'=>$presenttype[$key]
                          ,'startdate' => date("Y-m-d", strtotime($startdate[$key]))
                          ,'enddate'=>date("Y-m-d", strtotime($startdate[$key]))
                          ,'areaid'=>$area[$key]
                          ,'projectid'=>$projectid[$key]
                          ,'createdby'=>$username
            ];
        }


       DB::table('schedule_attendances')->insert($dataset);


        $statusid = Uuid::uuid();

        $status = new ScheduleAttendanceStatus();
        $status->attendance_statusid = $statusid;
        $status->scheduleid = $scheduleid;
        $status->partyid = $partyid;
        $status->status = "Submitted";
        $status->updatedby = $username;
        $status->save();

       return redirect('/viewEmployeeAttendanceList/'.$partyid.'/'.$scheduleid);

    }
}
