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

class ScheduleAttendanceController extends Controller
{
    public function test(Request $request){

        $genid = Uuid::uuid();

        $input = $request->all();
        $partyid = $request->get('partyid');
        $scheduleid = $request->get('scheduleid');
        $username = $request->get('username');
        $area = $request->get('areaid');
        $startdate = $request->get('startdate');
        $enddate = $request->get('enddate');
        $ispresent = $request->get('ispresent');
        $projectid = $request->get('projectid');

        $dataset = [];

        foreach ($ispresent as $key => $value) {
            $dataset[] = ['scheduleattendanceid'=>$genid
                          ,'scheduleid'=>$scheduleid
                          ,'partyid'=>$partyid
                          ,'ispresent'=>$ispresent[$key]
                          ,'startdate' => $startdate[$key]
                          ,'enddate'=>$enddate[$key]
                          ,'areaid'=>$area[$key]
                          ,'projectid'=>$projectid[$key]
                          ,'createdby'=>$username
            ];
        }

        dd($dataset);




        return $input;

    }
}
