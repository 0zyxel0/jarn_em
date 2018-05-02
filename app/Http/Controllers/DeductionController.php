<?php

namespace App\Http\Controllers;
use App\EmployeeGovernmentDetail;
use App\EmployeeImage;
use App\EmployeeTeam;
use App\EmployeeTeamAssignment;
use Illuminate\Contracts\Auth\Authenticatable;
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
                    select e.partyid, e.givenname, e.familyname, ed.total_price
                    from employees e
                    left join 
                    (
                      select DISTINCT partyid,SUM(total_price) as total_price
                      from employee_deductions
                      Group by partyid
                      
                    ) ed on ed.partyid=e.partyid
                    
                    
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


        $user_deduction = EmployeeDeduction::join('deduction_types', function($join){
            $join->on('employee_deductions.deduction_typeid','=','deduction_types.id');
        })->where('partyid',$partyid)->get();







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



        $req_item = $request->qty;
        $inventId = Input::get('inventory_item');
        $partyid = $request->partyid;




        DB::table('stock_availabilities')
            ->where('inventoryid' ,$inventId)
            ->update(['available_stock'=> DB::raw('available_stock - "'.$req_item.'"')]);


        //Going to Person Deduction Table
        $deduction_assignment = new EmployeeDeduction();

        $deduction_assignment->deductionid = $genId;
        $deduction_assignment->deduction_typeid = $request->deducttype;
        $deduction_assignment->partyid = $request->partyid;
        $deduction_assignment->comments = $request->comments;
        $deduction_assignment->inventoryid = $inventId;
        $deduction_assignment->quantity = $request->qty;
        $deduction_assignment->total_price = $request->price;
        $deduction_assignment->status = 1;
        $deduction_assignment->createdby = $request->username;
        $deduction_assignment->save();






        return redirect('/addDeduction/'.$partyid);
    }
}
