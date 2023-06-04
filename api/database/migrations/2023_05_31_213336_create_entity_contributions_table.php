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
        Schema::create('entity_contributions', function (Blueprint $table) {
            $table->id();
            $table->integer('entity_id');
            $table->string('name')->default("Default");
            $table->text('info')->nullable();
            $table->float('amount');
            $table->string('payment_frequency_id')->default(4); // monthly
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
        Schema::dropIfExists('entity_contributions');
    }
};
