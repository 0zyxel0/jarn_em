<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    protected $table = 'employee_salaries';

    protected $fillable   = ['salaryid',
        'daily_rate',
        'partyid',
        'updatedBy',
        'created_at',
        'updated_at'
    ];
}

