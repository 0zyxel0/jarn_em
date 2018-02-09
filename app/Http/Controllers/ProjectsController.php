<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function viewProjects(){
        return view('content.projects.view_project');
    }

    public function createProjects(){
        return view('content.projects.create_project');
    }
}
