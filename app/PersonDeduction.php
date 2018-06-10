<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonDeduction extends Model
{
    protected $table = 'person_deductions';
    protected $fillable = ['deductionid','amount','partyid','updated_at'];
}
