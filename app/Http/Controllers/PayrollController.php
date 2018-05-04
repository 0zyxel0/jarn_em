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
use App\Schedule;
use App\Employees;
use App\EmployeeSalary;
use Illuminate\Support\Facades\Input;
use App\EmployeeArea;
use Symfony\Component\Console\Tests\TerminalTest;

class PayrollController extends Controller
{
    public function generateAttendanceSalary(Request $request){
        $areaid = $request->selectsite;
        $wFrom = $request->dateFrom;
        $wTo = $request->dateTo;

      // dd($areaid,$wFrom,$wTo);
        $query = DB::select('
        select distinct sa.partyid,e.givenname,e.familyname, x.hours,es.daily_rate, ed.total_price
        from schedule_attendances sa 
        left join 
                    (
                        SELECT s.partyid,SUM(pst.hours) as hours 
                        FROM `schedule_attendances` s
                        LEFT JOIN present_status_types pst on s.presenttype = pst.id
                        WHERE s.startdate between "'.$wFrom.'" and "'.$wTo.'" 
                        GROUP BY s.partyid
                    ) as x on sa.partyid = x.partyid
        left join employees e on e.partyid = sa.partyid
        left join employee_salaries es on es.partyid = e.partyid
        left join 
                    (
                      select DISTINCT partyid,SUM(total_price) as total_price
                      from employee_deductions
                      Group by partyid
                      
                    ) ed on ed.partyid=e.partyid
        where sa.areaid = "'.$areaid.'"
       
        
        ');

        $query_json = json_encode($query);


        $fromDate = DB::select('
            select scheduleid,startdate, enddate
            from schedules
            where startdate = "'.$wFrom.'"
            
            
        ');
        $fromDate_json = json_encode($fromDate);
        $toDate = DB::select('
            select scheduleid ,startdate, enddate
            from schedules
            where enddate = "'.$wTo.'" 

            
        ');
        $toDate_json = json_encode($toDate);



        return view('content.payroll.view_employee_area_payroll',['data'=>json_decode($query_json, true),'toDate'=>json_decode($toDate_json,true),'fromDate'=>json_decode($fromDate_json,true
        )]);

    }

    public function viewGeneratedPayslip($partyid,$startdate,$enddate){

        $query = DB::select('
        select distinct sa.partyid,e.givenname,e.familyname, x.hours,es.daily_rate, ed.total_price
        from schedule_attendances sa 
        left join 
                    (
                        SELECT s.partyid,SUM(pst.hours) as hours 
                        FROM `schedule_attendances` s
                        LEFT JOIN present_status_types pst on s.presenttype = pst.id
                         WHERE s.startdate between "'.$startdate.'" and "'.$enddate.'" 
                        GROUP BY s.partyid
                    ) as x on sa.partyid = x.partyid
        left join employees e on e.partyid = sa.partyid
        left join employee_salaries es on es.partyid = e.partyid
        left join 
                    (
                      select DISTINCT partyid,SUM(total_price) as total_price
                      from employee_deductions
                      Group by partyid
                      
                    ) ed on ed.partyid=e.partyid
        where sa.partyid = "'.$partyid.'"
       
        
        ');

        $query_json = json_encode($query);

        return view('content.payroll.view_employee_payslipdetails',['data'=>json_decode($query_json,true)]);
    }

    public function viewPayrollList(){



        $area = Area::select('areaid','name')->whereNull('parentareaid')->get();
        $weekTo = Schedule::all();



        return view('content.payroll.view_pickmonth_payroll',compact('area','weekTo'));
    }


    public function getAreaSiteList($areaid){
            $area = DB::table('areas')->select('name','areaid')->where('parentareaid',$areaid)->get();

       return json_encode($area);




    }





}
