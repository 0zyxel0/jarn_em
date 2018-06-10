<?php

namespace App\Http\Controllers;

use App\EmployeeGovernmentDetail;
use App\EmployeeImage;
use App\EmployeeTeam;
use App\Area;
use App\EmployeeTeamAssignment;
use App\PersonDeduction;
use Illuminate\Http\Request;
use Faker\Provider\Uuid;
use DB;
use App\Employees;
use App\EmployeeSalary;
use Illuminate\Support\Facades\Input;
use App\EmployeeArea;
use Symfony\Component\Console\Tests\TerminalTest;

class EmployeeController extends Controller
{
   public function saveEmployeeDetails(Request $request){
       $genId =  Uuid::uuid();

       $deductions = new PersonDeduction;

       $deductionid = Uuid::uuid();

       $deductions->deductionid=$deductionid;
       $deductions->partyid=$genId;
       $deductions->amount = 0;
       $deductions->save();

       $employee = new Employees;

       $salary = new EmployeeSalary;
       $team = new EmployeeTeamAssignment();

      $employee->partyid = $genId;
      $employee->givenname = $request->givenname;
       $employee->familyname = $request->familyname;
      $employee->middlename = $request->middlename;
      $employee->gender = $request->gender;
      $employee->email = $request->email;
      $employee->contactnumber = $request->contactnumber;
      $employee->birthday = date("Y-m-d", strtotime($request->birthday));
      $employee->age = $request->age;
      $employee->religion = $request->religion;
      $employee->civilstatus = $request->civilstatus;
      $employee->address = $request->address;
      $employee->comments = $request->comments;
      $employee->startdate =date("Y-m-d", strtotime($request->startdate));
      $employee->enddate = $request->enddate;
      $employee->status = $request->emp_stat;
      $employee->isActive = '1';
      $employee->updatedby = $request->username;

      $employee->save();



      $salaryId = Uuid::uuid();

      $salary->salaryid = $salaryId;
      $salary->daily_rate= $request->salary_rate;
      $salary->partyid = $genId;
      $salary->updatedby = $request->username;
      $salary->save();

       $emp_areaid = Uuid::uuid();
       $emp_area = new EmployeeArea();

       $emp_area->employeeareaid = $emp_areaid;
       $emp_area->partyid = $genId;
       $emp_area->areaid = $request->areaid;
        $emp_area->createdby = $request->username;
        $emp_area->save();


      $team->partyid = $genId;
      $team->teamid = $request->assignteam;
      $team->updatedby = $request->username;
      $team->save();

       $gov1  = new EmployeeGovernmentDetail;
       $gov2  = new EmployeeGovernmentDetail;
       $gov3  = new EmployeeGovernmentDetail;
       $gov4  = new EmployeeGovernmentDetail;
       $detailid1 = Uuid::uuid();
       $detailid2 = Uuid::uuid();
       $detailid3 = Uuid::uuid();
       $detailid4 = Uuid::uuid();

        $gov1->detailid = $detailid1;
        $gov1->partyid = $genId;
        $gov1->name = 'SSS';
        $gov1->government_num = $request->sss_id;
        $gov1->createdby = $request->username;
        $gov1->save();

       $gov2->detailid = $detailid2;
       $gov2->partyid = $genId;
       $gov2->name = 'PHILHEALTH';
       $gov2->government_num = $request->philhealth_id;
       $gov2->createdby = $request->username;
       $gov2->save();
       $gov3->detailid = $detailid3;
       $gov3->partyid = $genId;
       $gov3->name = 'PAGIBIG';
       $gov3->government_num = $request->pagibig_id;
       $gov3->createdby = $request->username;
       $gov3->save();
       $gov4->detailid = $detailid4;
       $gov4->partyid = $genId;
       $gov4->name = 'TIN';
       $gov4->government_num = $request->tax_id;
       $gov4->createdby = $request->username;
       $gov4->save();




       $request->session()->flash('alert-success', 'Record was successful added!');

       return redirect('/showEmployeeList');
   }





public function showEmployeeList(){


       $query = Employees::all('partyid','givenname','familyname','contactnumber','startdate','enddate');
       $json = json_encode($query);

       return view('content.employee.employee_list',['data'=>json_decode($json ,true)]);
}

public function editEmployeeDetails($id){

$data = Employees::where('partyid',$id)->get();
$area = Area::all('areaid','name');

$area_spec = DB::table('employee_areas')
    ->select('areas.areaid','areas.name')
    ->join('areas','employee_areas.areaid','=','areas.areaid')
    ->where('employee_areas.partyid',$id)
    ->get();
$team = EmployeeTeam::all();
$salary = EmployeeSalary::where('partyid',$id)->get();

$governmentid = EmployeeGovernmentDetail::select('name','government_num')->where('partyid',$id)->get();


return view('content.employee.edit_employee',compact('data','area','area_spec','team','salary','governmentid'));

}


public function viewProfile($id){


    $data2 = EmployeeSalary::where('partyid',$id)->get();
    $data2_json  = json_encode($data2);
    $image = EmployeeImage::where('partyid',$id)->get();
    $image_json  = json_encode($image);
    $data = Employees::where('partyid',$id)->get();
    $data_json  = json_encode($data);
    $govid = EmployeeGovernmentDetail::select('name','government_num')->where('partyid',$id)->get();
    $govid_json  = json_encode($govid);

    $area =DB::table('employees')
            ->select('areas.name')
            ->leftJoin('employee_areas','employees.partyid','=','employee_areas.partyid')
            ->leftJoin('areas','employee_areas.areaid','=','areas.areaid')
            ->where('employees.partyid',$id)
            ->get();

        $area_json  = json_encode($area);

    return view('content.employee.view_employee' ,[
                                                            'data2'=>json_decode($data2_json,true),
                                                            'image'=>json_decode($image_json,true),
                                                            'data'=>json_decode($data_json,true),
                                                            'govid'=>json_decode($govid_json,true),
                                                            'area'=>json_decode($area_json,true)
                                                        ]);
}

public function newEmployee(){

    $query = Area::select('name','areaid')->whereNotNull('parentareaid')->get();
    $query2 = EmployeeTeam::all('teamid','name');
    return view('content.employee.create_new_employee',compact('query','query2'));
}

public function updateEmployeeDetails(Request $request){


}

}
