<?php

namespace App\Http\Controllers;

use App\EmployeeGovernmentDetail;
use App\EmployeeImage;
use App\EmployeeTeam;
use App\Area;
use App\EmployeeTeamAssignment;
use Illuminate\Http\Request;
use Faker\Provider\Uuid;
use DB;
use App\Employees;
use App\EmployeeSalary;
use Illuminate\Support\Facades\Input;
use App\EmployeeArea;
use Symfony\Component\Console\Tests\TerminalTest;

class PayrollController extends Controller
{
    public function generateAttendanceSalary(){

        $query = DB::select('
        select distinct sa.partyid,e.givenname,e.familyname, x.hours,es.daily_rate 
        from schedule_attendances sa 
        left join 
        (SELECT s.partyid,SUM(pst.hours) as hours FROM `schedule_attendances` s
        LEFT JOIN present_status_types pst on s.presenttype = pst.id
        GROUP BY s.partyid
        ) as x
        on sa.partyid = x.partyid
        left join employees e on e.partyid = sa.partyid
        left join employee_salaries es on es.partyid = e.partyid

        
        ');

        $query_json = json_encode($query);

        return view('content.payroll.view_employee_area_payroll',['data'=>json_decode($query_json, true)]);   }

    public function viewPayrollList(){

        $area = Area::select('areaid','name')->whereNull('parentareaid')->get();

        return view('content.payroll.view_pickmonth_payroll',compact('area'));
    }


    public function getAreaSiteList(Request $request){


        $selected_area = $request->selectarea;

        if($request->ajax()){
            $area = Area::select('areaid','name')->where('parentareaid',$selected_area)->get();


        }
        return "N/A";

    }



}
