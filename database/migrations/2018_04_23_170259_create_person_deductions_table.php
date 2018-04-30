<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonDeductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_deductions', function (Blueprint $table) {
            $table->string('deductionid');
            $table->string('partyid');
            $table->integer('deduction_typeid');
            $table->string('inventoryid')->nullable();
            $table->float('amount')->nullable();
            $table->string('remarks')->nullable();
            $table->string('payment_schemeid')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('person_deductions');
    }
}
