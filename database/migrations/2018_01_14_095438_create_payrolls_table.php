<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->uuid('payrollid')->unique();
            $table->string('partyid');
            $table->date('coverage_start');
            $table->date('coverage_end');
            $table->date('paymentdate');
            $table->float('gross_amount')->nullable();
            $table->float('deduction_amount')->nullable();
            $table->float('net_amount')->nullable();
            $table->float('bonus_amount')->nullable();
            $table->float('total_paidamount')->nullable();
            $table->string('comments')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('payrolls');
    }
}
