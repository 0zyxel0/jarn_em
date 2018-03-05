<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleAttendance extends Model
{
    public $timestamps = true;
    protected $table= "schedule_attendances";
    protected $fillable = ['scheduleid','partyid','isPresent','timein','timeout','startdate','enddate','areaid','projectid','createdby'];
}
