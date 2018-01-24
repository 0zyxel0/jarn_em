<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->uuid('areaid')->unique();
            $table->string('name');
            $table->text('address');
            $table->text('city');
            $table->text('country');
            $table->text('size');
            $table->date('acquiredDate');
            $table->string('status');
            $table->string('contact_person');
            $table->string('updatedby');
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
        Schema::dropIfExists('areas');
    }
}
