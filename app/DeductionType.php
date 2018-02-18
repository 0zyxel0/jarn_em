<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeductionType extends Model
{
    protected $table = 'deduction_types';

    protected $fillable = ['name','createdby'];

}
