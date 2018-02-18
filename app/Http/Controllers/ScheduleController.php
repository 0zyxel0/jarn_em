<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\EmployeeGovernmentDetail;
use App\EmployeeImage;
use App\EmployeeTeam;
use App\EmployeeTeamAssignment;
use Illuminate\Http\Request;
use Faker\Provider\Uuid;
use DB;
use App\Employees;
use App\EmployeeSalary;
use App\Area;
use Illuminate\Support\Facades\Input;


class ScheduleController extends Controller
{
    public function createSchedule(){

        $data = Schedule::select('year_number','week_number','startdate','enddate')->get();

        return view('content.schedule.create_schedule',compact('data'));
    }

    public function store(Request $request){

        $newid = Uuid::uuid();
        $data = new Schedule();

        $data->scheduleid = $newid;
        $data->year_number = $request->yearnum;
        $data->week_number = $request->weeknum;
        $data->startdate=  date("Y-m-d", strtotime($request->startdate));
        $data->enddate= date("Y-m-d", strtotime($request->enddate));
        $data->createdby= $request->username;
        $data->save();

        $request->session()->flash('alert-success', 'successful added!');
        return redirect('/createSchedule');
    }
}
