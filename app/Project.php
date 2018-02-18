<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table='projects';

    protected $fillable = ['projectid','project_code','rate','updatedby','created_at','updated_at'];
}
