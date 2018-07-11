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

class ReportsController extends Controller
{
    public function viewReportInventory(){
        return view('content.reports.view_reports_page');
    }

    public function viewPayrollReport(){
        $area = Area::select('areaid','name')->whereNull('parentareaid')->get();
        $weekTo = Schedule::all();


        return view('content.reports.view_payroll_report',compact('area','weekTo'));
    }

    public function generatePayrollReport(Request $request){
        $areaid = $request->selectsite;
        $wFrom = $request->dateFrom;
        $wTo = $request->dateTo;


        $query = DB::select('
        select distinct sa.partyid,e.givenname,e.familyname, x.hours,es.daily_rate, rice.total_price as \'rice\', corn.total_price as \'corn\', material.total_price as \'material\', paluwagan.total_price as \'paluwagan\', pds.amount as \'total_deductions\'
        from schedule_attendances sa 
        left join 
                    (
                        SELECT s.partyid,SUM(pst.hours) as hours 
                        FROM `schedule_attendances` s
                        LEFT JOIN present_status_types pst on s.presenttype = pst.id
                         WHERE s.startdate BETWEEN "'.$wFrom.'" and "'.$wTo.'" 
                        GROUP BY s.partyid
                    ) as x on sa.partyid = x.partyid
        left join employees e on e.partyid = sa.partyid
				left join employee_areas eas on eas.partyid = e.partyid
        left join employee_salaries es on es.partyid = e.partyid
				LEFT JOIN employee_deductions ed on ed.partyid = e.partyid
				LEFT JOIN deduction_types dt on dt.id = ed.deduction_typeid
        left join areas a on eas.areaid = a.areaid
        left join person_deductions pds on pds.partyid = e.partyid 
        left join (
                        select partyid,SUM(total_price) as total_price
                        from employee_deductions
                        where deduction_typeid = 1
                         and status = 1
                        group by partyid
                    ) as rice on e.partyid = rice.partyid
		left join (
                        select partyid,SUM(total_price) as total_price
                        from employee_deductions
                        where deduction_typeid = 2
                         and status = 1
                        group by partyid
                    ) as corn on e.partyid = corn.partyid
        left join (
                        select partyid,SUM(total_price) as total_price
                        from employee_deductions
                        where deduction_typeid = 3
                         and status = 1
                        group by partyid
                    ) as material on e.partyid = material.partyid							
		left join (
                        select partyid,SUM(total_price) as total_price
                        from employee_deductions
                        where deduction_typeid = 4
                        and status = 1
                        group by partyid
                    ) as paluwagan on e.partyid = paluwagan.partyid							
						     				            							
									
									
        where eas.areaid = "'.$areaid.'"
        ');

        $query_json = json_encode($query);

        return view('content.reports.report_generated_payroll_list',['data'=>json_decode($query_json, true)]);
    }


}
