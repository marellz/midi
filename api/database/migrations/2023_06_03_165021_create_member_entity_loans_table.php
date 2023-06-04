<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_entity_loans', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->integer('payment_frequency_id');
            $table->integer('entity_loan_id');
            $table->integer('member_entity_loan_request_id');
            $table->integer('intervals');
            $table->float('per_interval_payment'); 
            $table->float('amount_payable');
            $table->float('balance_due');
            $table->date('start_date');
            $table->date('due_date');
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
        Schema::dropIfExists('member_entity_loans');
    }
};
