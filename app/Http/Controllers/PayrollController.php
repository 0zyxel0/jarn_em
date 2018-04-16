<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


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
}
