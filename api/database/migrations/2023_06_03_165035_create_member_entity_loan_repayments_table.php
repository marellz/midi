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
        Schema::create('member_entity_loan_repayments', function (Blueprint $table) {
            $table->id();
            $table->integer('member_entity_loan_id');
            $table->string('payment_period');
            $table->float('amount_paid');
            $table->string('transaction_code');
            $table->date('received_date');
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
        Schema::dropIfExists('member_entity_loan_repayments');
    }
};
