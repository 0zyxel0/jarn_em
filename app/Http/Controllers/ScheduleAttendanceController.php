<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScheduleAttendance;
class ScheduleAttendanceController extends Controller
{
    public function test(Request $request){


        $input = $request->all();

        $scheduleid = $request->get('scheduleid');
        $username = $request->get('username');
        $area = $request->get('areaid');
        $startdate = $request->get('startdate');
        $enddate = $request->get('enddate');
        $ispresent = $request->get('ispresent');
        $projectid = $request->get('projectid');

        $dataset = [];

        foreach ($area as $value) {
            $dataset[] =  [ ''

            ];
        }

        dd($area,$startdate,$enddate,$ispresent,$projectid);




        return $input;

    }
}
