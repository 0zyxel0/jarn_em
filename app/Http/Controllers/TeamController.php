<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function viewTeamList(){
        return view('content.team.view_team');
    }
}
