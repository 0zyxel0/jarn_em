<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeTeamAssignment extends Model
{
    protected $table = 'employee_team_assignments';
    // protected $primaryKey = 'id';
    protected $fillable   = ['partyid',
        'teamid',
        'created_at',
        'updated_at'
    ];


}
