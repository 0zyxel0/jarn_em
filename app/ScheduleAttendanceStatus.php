<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleAttendanceStatus extends Model
{
    public $timestamps = true;
    protected $table = 'schedule_attendance_statuses';
    protected $fillable = ['attendance_statusid','scheduleattendanceid','status','comments','updatedby'];
}
