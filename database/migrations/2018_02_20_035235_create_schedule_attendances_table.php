<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_attendances', function (Blueprint $table) {
            $table->string('scheduleattendanceid')->unique();
            $table->string('scheduleid');
            $table->string('partyid');
            $table->boolean('isPresent');
            $table->string('timein')->nullable();
            $table->string('timeout')->nullable();
            $table->date('startdate');
            $table->date('enddate');
            $table->string('areaid');
            $table->string('projectid');
            $table->string('createdby');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_attendances');
    }
}
