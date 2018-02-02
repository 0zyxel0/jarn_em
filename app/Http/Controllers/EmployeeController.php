<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Provider\Uuid;
use DB;
use App\Employees;
use App\EmployeeSalary;
use App\Area;

class EmployeeController extends Controller
{
   public function saveEmployeeDetails(Request $request){
       $genId =  Uuid::uuid();

       $employee = new Employees;

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

        $salary = new EmployeeSalary;

      $salaryId = Uuid::uuid();

      $salary->salaryid = $salaryId;
      $salary->daily_rate= $request->salary_rate;
      $salary->partyid = $genId;
      $salary->updatedby = $request->username;
     $salary->save();
       $request->session()->flash('alert-success', 'Record was successful added!');
       return redirect('/showEmployeeList');
   }


public function showEmployeeList(){


       $query = Employees::all('partyid','givenname','familyname','contactnumber','startdate','enddate','salary');
       $json = json_encode($query);

       return view('content.employee.employee_list',['data'=>json_decode($json ,true)]);
}

public function editEmployeeDetails($id){

$data = Employees::where('partyid',$id)->get();
return view('content.employee.edit_employee',compact('data'));

}


public function viewProfile($id){


    $data2 = EmployeeSalary::where('partyid',$id)->get();


    $data = Employees::where('partyid',$id)->get();

    return view('content.employee.view_employee' ,compact('data','data2'));
}

public function newEmployee(){

    $query = Area::all('name','areaid');



    return view('content.employee.new_employee',compact('query'));
}


}
