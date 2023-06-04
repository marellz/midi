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
        Schema::create('member_entity_loan_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->integer('entity_loan_id');
            $table->integer('intervals')->nullable();
            $table->integer('payment_frequency_id');
            $table->integer('principal_amount');
            $table->boolean('approved')->default(false);
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
        Schema::dropIfExists('member_entity_loan_requests');
    }
};
