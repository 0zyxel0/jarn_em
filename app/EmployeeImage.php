<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeImage extends Model
{
    protected $table= 'employee_images';

    protected $fillable = ['imageid','imageurl','partyid','updatedBy'];
}
