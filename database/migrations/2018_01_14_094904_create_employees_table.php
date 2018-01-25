<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('partyid')->unique();
            $table->string('givenname');
            $table->string('familyName');
            $table->string('middlename');
            $table->date('birthday');
            $table->integer('age');
            $table->string('gender');
            $table->string('religion')->nullable();
            $table->text('address');
            $table->string('contactnumber');
            $table->string('email');
            $table->string('civilstatus');
            $table->text('comments')->nullable();
            $table->string('statusid');
            $table->date('startdate');
            $table->date('enddate')->nullable();
            $table->integer('isActive');
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
        Schema::dropIfExists('employees');
    }
}
