<?php

namespace App\Http\Controllers;
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
use App\DeductionType;

class DeductionController extends Controller
{
    public function createDeductionType(){

        $data = DeductionType::select('name','created_at')->get();

        return view('content.deduction.create_deduction_type',compact('data'));
    }


    public function store(Request $request){

        $deduct = new DeductionType();

        $deduct->name = $request->deducttype;
        $deduct->createdby =$request->username;
        $deduct->save();
        $request->session()->flash('alert-success', 'Record was successful added!');


        return redirect('/createDeductionType');
    }


    public function viewEmployeeDeductionList(){

        $query = DB::select('
                    select e.partyid, e.givenname, e.familyname, amount
                    from employees e
                    left join employee_deductions ed on e.partyid = ed.partyid
        ');

        $query_json = json_encode($query);

        return view('content.deduction.view_employeelist_deduction',['data'=>json_decode($query_json,true)]);
    }

    public function createDeduction($partyid){

        $data = Employees::where('partyid',$partyid)->get();

        return view('content.deduction.edit_employee_deduction',compact('data'));
    }
}
