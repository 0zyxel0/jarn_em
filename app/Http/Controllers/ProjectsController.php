<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Faker\Provider\Uuid;
use DB;


class ProjectsController extends Controller
{
    public function viewProjects(){

        $query = Project::all();

        return view('content.projects.view_project',compact('query'));
    }

    public function createProjects(){
        return view('content.projects.create_project');
    }

    public function saveProjectDetails(Request $request){

        $id = Uuid::uuid();
        $proj = new Project();

        $proj->projectid = $id;
        $proj->project_name = $request->prjname;
        $proj->project_code = $request->prjcode;
        $proj->rate = $request->prjrate;
        $proj->updatedby = $request->username;
        $proj->save();

        return redirect('/viewprojects');
    }


}
