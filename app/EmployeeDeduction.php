<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeDeduction extends Model
{
    protected $table='employee_government_details';
    protected $fillable=['detailid','partyid','name','government_num','createdby'];
}
