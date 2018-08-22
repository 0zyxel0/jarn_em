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

       $input = $request->all();
        $date_set = [];
       foreach($input['startdate'] as $key => $value){
            array_push($date_set,(date("Y-m-d", strtotime($value))));
       }

       $model = ScheduleAttendance::where([
               ['startdate', $date_set],
               ['partyid',$request->get('partyid')],
               ['presenttype',$request->get('presenttype')]
           ])

         ->first();



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
                          ,'created_at' => date('Y-m-d H:i:s')
                          ,'updated_at' => date('Y-m-d H:i:s')
            ];
        }




        $statusid = Uuid::uuid();

        $status = new ScheduleAttendanceStatus();
        $status->attendance_statusid = $statusid;
        $status->scheduleid = $scheduleid;
        $status->partyid = $partyid;
        $status->status = "Submitted";
        $status->updatedby = $username;

        if($model != null){

            //$request->session()->flash('alert-danger', 'Error, Record Exists!');

            //return redirect('/weeklist/'.$partyid.'/'.$scheduleid);
           return redirect()->back()->with('alert-danger', 'Error, Record Exists!');
           // return Redirect::back()->withErrors(['alert-danger', 'Error, Record Exists!']);
//dd('Record Exists',$status);
        }else{
            DB::table('schedule_attendances')->insert($dataset);
            $status->save();
            $request->session()->flash('alert-success', 'Successful Added!');
            //dd('New Object',$status);
            return redirect('/viewEmployeeAttendanceList/'.$partyid.'/'.$scheduleid);

        }


    }




}
