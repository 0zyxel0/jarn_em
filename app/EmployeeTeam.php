<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeTeam extends Model
{
    protected $table = 'employee_teams';
    // protected $primaryKey = 'teamid';
    protected $fillable   = ['teamid',
        'name',
        'userpartyid',
        'areaid',
        'isAdmin',
        'updatedby'
    ];
}
