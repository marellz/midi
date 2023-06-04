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
        Schema::create('member_entity_product_purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->integer('entity_product_id');
            $table->integer('purchase_duration_id')->default(1); //  1 year
            $table->date('start_date');
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('member_entity_product_purchases');
    }
};
