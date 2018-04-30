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
use App\Inventory;
use App\StockAvailability;
use App\EmployeeDeduction;
use App\PersonDeduction;

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

        $deduct = DeductionType::all();

        $item = Inventory::join('stock_availabilities', function($join){
            $join->on('inventories.inventoryid','=','stock_availabilities.inventoryid');
        })->get();


        $user_deduction = PersonDeduction::join('deduction_types', function($join){
            $join->on('person_deductions.deduction_typeid','=','deduction_types.id');
        })
        ->where('partyid',$partyid)->get();



        return view('content.deduction.edit_employee_deduction',compact('data','deduct','item','user_deduction'));
    }

    public function generateSellingPrice($itemid,$quantity){




        $price = DB::select('
            SELECT (selling_price * "'.$quantity.'") as price
            FROM stock_availabilities
            WHERE inventoryid = "'.$itemid.'"
            
        ');
        return json_encode($price);

    }


    public function assignDeduction(Request $request){


        $genId = Uuid::uuid();

        $deduction = new PersonDeduction();

        $req_item = $request->qty;
        $inventId = Input::get('inventory_item');
$partyid = $request->partyid;

        $deduction->deductionid = $genId;
        $deduction->partyid = $request->partyid;
        $deduction->deduction_typeid = $request->deducttype;
        $deduction->inventoryid =$inventId;
        $deduction->amount = $request->qty;
        $deduction->remarks = $request->comments;
        $deduction->payment_schemeid =$request->terms;
        $deduction->status= 1;
        $deduction->save();



        DB::table('stock_availabilities')
            ->where('inventoryid' ,$inventId)
            ->update(['available_stock'=> DB::raw('available_stock - "'.$req_item.'"')]);


        //Going to Person Deduction Table
        $deduction_assignment = new EmployeeDeduction();




        return redirect('/addDeduction/'.$partyid);
    }
}
