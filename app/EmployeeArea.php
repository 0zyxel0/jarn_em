<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeArea extends Model
{
        protected $table = 'employee_areas';
        protected $fillable = ['partyid','areaid','createdby'];
}
