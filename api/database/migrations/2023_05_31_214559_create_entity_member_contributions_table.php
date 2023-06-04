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
        Schema::create('entity_member_contributions', function (Blueprint $table) {
            $table->id();
            $table->integer('entity_member_id');
            $table->integer('entity_contribution_id');
            $table->float('amount');
            $table->string('phone');
            $table->string('transaction_code');
            $table->string('contribution_period')->nullable();
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
        Schema::dropIfExists('entity_member_contributions');
    }
};
