<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Provider\Uuid;
use DB;
use App\Employees;
use App\EmployeeSalary;
use App\Area;

class AreaController extends Controller
{
    public function viewArea(){
        $query = Area::all('areaid','name','address','contact_person');
        $json = json_encode($query);
        return view('content.area.view_area',['data'=>json_decode($json,true)]);
    }

    public function createArea(){




        return view('content.area.new_area');
    }


    public function saveAreaDetails(Request $request){
        $areaId =  Uuid::uuid();

        $area = new Area;

        $area->areaid = $areaId;
        $area->name = $request->areaname;
        $area->address = $request->areaaddress;
        $area->city = $request->city;
        $area->country = $request->country;
        $area->size=$request->size;
        $area->acquiredDate =date("Y-m-d", strtotime( $request->acquiredate));
        $area->contact_person = $request->contactperson;
        $area->updatedby = $request->username;
        $area->createdby = $request->username;

        $area->save();

        $request->session()->flash('alert-success', 'Record was successful added!');
        return redirect('/area');



    }



}
