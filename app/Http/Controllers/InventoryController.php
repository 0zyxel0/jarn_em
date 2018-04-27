<?php

namespace App\Http\Controllers;

use App\EmployeeGovernmentDetail;
use App\EmployeeImage;
use App\EmployeeTeam;
use App\Area;
use App\Inventory;
use App\EmployeeTeamAssignment;
use Illuminate\Http\Request;
use Faker\Provider\Uuid;
use DB;
use App\Employees;
use App\EmployeeSalary;
use Illuminate\Support\Facades\Input;
use App\EmployeeArea;
use App\StockAvailability;
use Symfony\Component\Console\Tests\TerminalTest;

class InventoryController extends Controller
{
    public function viewList(){

        $data = Inventory::join('stock_availabilities', function($join){
            $join->on('inventories.inventoryid','=','stock_availabilities.inventoryid');
        })->get();

       // dd($data);
        return view('content.inventory.view_inventory_list',compact('data'));
    }


    public function saveItems(Request $request)
    {
        $genId =  Uuid::uuid();

        $invent = new Inventory();

        $invent->inventoryid = $genId;
        $invent->item = $request->item_name;
        $invent->quantity = $request->qty;
        $invent->metric = $request->metric;
        $invent->price_amount = $request->price;


        $invent->save();

        $stock = new StockAvailability();

        $stock->inventoryid = $genId;
        $stock->available_stock = $request->qty;
        $stock->selling_price = $request->sell;
        $stock->save();


        $request->session()->flash('alert-success', 'Record was successful added!');

        return redirect('viewInventory');

    }
}
