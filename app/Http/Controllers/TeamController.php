<?php

namespace App\Http\Controllers;


use App\EmployeeTeamAssignment;
use Illuminate\Http\Request;
use Faker\Provider\Uuid;
use DB;
use App\Employees;
use App\EmployeeSalary;
use App\Area;
use App\EmployeeTeam;


class TeamController extends Controller
{
    public function viewTeamList(){

        $query = DB::table('employee_teams')
            ->select('employee_teams.teamid','employee_teams.name as Teamname','areas.name as Areaname','employees.givenname','employees.familyname')
            ->join('areas', 'employee_teams.areaid', '=', 'areas.areaid')
            ->leftjoin('employees','employee_teams.userpartyid','=','employees.partyid')

            ->get();
        $convs2 = json_encode($query);


        return view('content.team.view_team',['data'=>json_decode($convs2,true)]);
    }




    public function createTeam(){
        $query = Area::all('name','areaid');
        $query2 = Employees::all('partyid','givenname','middlename','familyname');

        return view('content.team.create_team', compact('query','query2'));
    }

    public function viewMembers($id){
        $query = DB::table('employee_teams')
            ->select('employee_teams.teamid','employee_teams.name as Teamname','areas.name as Areaname','employees.givenname','employees.familyname','employees.contactnumber')
            ->leftjoin('areas', 'employee_teams.areaid', '=', 'areas.areaid')
            ->leftjoin('employees','employee_teams.userpartyid','=','employees.partyid')
            ->where('employee_teams.teamid','=',$id)
            ->get();
        $convs2 = json_encode($query);


        $query2 = Employees::all('partyid','givenname','familyname');


        $json = json_encode($query2);

        $query3 = DB::table('employee_team_assignments')
            ->select('employees.givenname','employees.familyname','employees.contactnumber')
            ->join('employee_teams', 'employee_teams.teamid', '=', 'employee_team_assignments.teamid')
            ->join('employees','employee_team_assignments.partyid','=','employees.partyid')
            ->where('employee_teams.teamid','=',$id)
            ->get();
        $convs3 = json_encode($query3);






        return view('content.team.view_members',['data'=>json_decode($convs2,true),'data2'=>json_decode($json,true),'data3'=>json_decode($convs3,true)]);
    }


    public function saveTeamRecord(Request $request){

        $genId =  Uuid::uuid();
        $team = new EmployeeTeam();

        $team->teamid = $genId;
        $team->name = $request->teamname;
        $team->userpartyid = $request->selectleader;
        $team->areaid = $request->selectarea;
        $team->isAdmin = 1 ;
        $team->updatedby = $request->username;

       $team->save();



        return redirect('/viewTeamList');
    }



    public function store(Request $request){




       $team = $request->get('teamid');
       $leader = $request->get('selectleader');
    //    dd($team,$leader);

       EmployeeTeam::where('teamid',$team)->update(['userpartyid'=>$leader]);
        return redirect('viewMembers/' .$team);
    }
}
