<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('teamid')->unique();
            $table->string('name');
            $table->string('userpartyid')->nullable();
            $table->string('areaid');
            $table->boolean('isAdmin')->nullable();
            $table->string('updatedby');
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
        Schema::dropIfExists('employee_teams');
    }
}
