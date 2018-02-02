<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    //protected $primaryKey = 'areaid';
    protected $fillable   = ['areaid','name','address','city','country','size','acquiredDate','status','contact_person','updatedby','createdby'];
}
