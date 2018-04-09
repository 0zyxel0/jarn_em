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
        $data = Area::select('areaid','name','address')->whereNull('parentareaid')->get();

        return view('content.area.view_area',compact('data'));
    }

    public function createArea(){
        return view('content.area.new_area');
    }

    public function viewChildArea($areaid){
        $area = Area::select('areaid','name')->where('areaid',$areaid)->get();

        $areaData = Area::select('areaid','name','address','size')->where('parentareaid',$areaid)->get();

        return view('content.area.view_child_area',compact('areaData','area'));
    }


    public function saveChildAreaRecord(Request $request){

        $childId = Uuid::uuid();
        $area = new Area();
$id = $request->parentid;
        $area->areaid = $childId;
        $area->parentareaid = $request->parentid;
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
        return redirect('/areadetails/'.$id);

    }

    public function saveAreaDetails(Request $request){
        $areaId =  Uuid::uuid();

        $area = new Area;

        $area->areaid = $areaId;
        $area->name = $request->areaname;
        $area->address = $request->areaaddress;
        $area->city = $request->city;
        $area->country = $request->country;
        $area->updatedby = $request->username;
        $area->createdby = $request->username;

        $area->save();

        $request->session()->flash('alert-success', 'Record was successful added!');
        return redirect('/area');



    }



}
