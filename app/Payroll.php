<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $table = 'payrolls';
    protected $primaryKey = 'payrollid';
    protected $fillable = ['partyid','paymentdate','gross_amount','deduction_amount','net_amount','bonus_amount','total_paidamount','comments','status','updatedby','createdby','created_at','updated_at'];


}
