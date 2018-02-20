<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleAttendance extends Model
{
    protected $table= "schedule_attendances";
    protected $fillable = ['scheduleid','partyid','isPresent','timein','timeout','startdate','enddate','areaid','projectid','createdby'];
}
