<?php

namespace App\Http\Controllers;

use App\EmployeeDeduction;
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
use App\Payroll;
use Symfony\Component\Console\Tests\TerminalTest;
use Carbon\Carbon;

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
        select distinct sa.partyid,e.givenname,e.familyname, x.hours,es.daily_rate, pds.amount
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
        
        left join person_deductions pds on pds.partyid = e.partyid 
        where sa.partyid = "'.$partyid.'"
       
        
        ');

        $query_json = json_encode($query);

      $getDeductions = DB::select('
      SELECT ed.deductionid,dt.name, ed.quantity, ed.total_price, ed.status, ed.comments
      FROM employee_deductions ed 
      JOIN deduction_types dt on dt.id = ed.deduction_typeid
      WHERE ed.status = 1
      and ed.partyid = "'.$partyid.'"
      ');

        $query_getDeductions = json_encode($getDeductions);


        $getDeductionsList = DB::select('
      SELECT ed.deductionid
      FROM employee_deductions ed 
      JOIN deduction_types dt on dt.id = ed.deduction_typeid
      WHERE ed.status = 1
      and ed.partyid = "'.$partyid.'"
      ');

        $query_getDeductionsList = json_encode($getDeductionsList);




        return view('content.payroll.view_employee_payslipdetails',['data'=>json_decode($query_json,true),'deduct'=>json_decode($query_getDeductions,true),'deductionList'=>json_decode($query_getDeductionsList,true)]);
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



    public function updatePayslipStatus(Request $request){

        $genid = Uuid::uuid();

        $payroll = new Payroll();



        $payroll->payrollid= $genid;
        $payroll->partyid = $request->partyid;
        $payroll->coverage_start =date("Y-m-d", strtotime($request->coverage_start));
        $payroll->coverage_end =date("Y-m-d", strtotime($request->coverage_end));
        $payroll->paymentdate =  date("Y-m-d", strtotime($request->paymentdate));
        $payroll->gross_amount = $request->grossSalaryField;
        $payroll->deduction_amount = $request->deductionField;
        $payroll->net_amount = $request->netSalaryField;
        $payroll->bonus_amount = $request-> bonusField;
        $payroll->total_paidamount = $request-> totalAmountField;
        $payroll->comments = $request->commentsField;
        $payroll->status = 'Paid';
        $payroll->updatedby = $request->username;
        $payroll->createdby = $request->username;
        $payroll->save();
        $dataset=[];
        foreach( $request->deductid_ as $key => $value)
            {
                $dataset[] = [$value ];
            }
      DB::table('employee_deductions')
            ->whereIn('deductionid', $dataset)
            ->update(['status' => 0]);
        DB::table('person_deductions')
            ->where('partyid',$request->partyid)
            ->update(['amount'=>0]);

        return redirect()->back();
    }




}
