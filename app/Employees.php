<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'partyid';
    protected $fillable   = ['partyid',
                            'givenname',
                            'familyName',
                            'middlename',
                            'birthday',
                            'age',
                            'gender',
                            'religion',
                            'address',
                            'contactnumber',
                            'email',
                            'civilstatus',
                            'comments',
                            'statusid',
                            'startdate',
                            'enddate',
                            'updatedby',
                            'created_at',
                            'updated_at'
                            ];

}
