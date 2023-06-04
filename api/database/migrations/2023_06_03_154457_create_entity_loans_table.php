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
        Schema::create('entity_loans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Basic');
            $table->integer('entity_id');
            $table->longText('details');
            $table->integer('purchase_duration_id');
            $table->float('min_amount')->default(1000);
            $table->float('max_amount')->nullable();
            $table->float('rate_pa');
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
        Schema::dropIfExists('entity_loans');
    }
};
