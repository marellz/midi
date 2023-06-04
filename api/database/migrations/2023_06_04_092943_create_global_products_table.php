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
        Schema::create('global_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('global_brand_id')->nullable();
            $table->longText('description');
            // $table->integer('product_type_id');
            $table->integer('purchase_type_id');
            $table->integer('purchase_duration_id');
            $table->integer('payment_frequency_id')->nullable();
            $table->integer('sector_id')->nullable();
            $table->float('fee'); // per duration_type
            $table->float('fee_max')->nullable(); // if it is variable
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
        Schema::dropIfExists('global_products');
    }
};
