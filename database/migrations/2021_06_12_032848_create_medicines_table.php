<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('medicine_name');
            $table->string('genric_name');
            $table->string('category_id');
            $table->string('manufecture');
            $table->string('self_number');
            $table->string('qty');
            $table->string('strength');
            $table->string('sell_price');
            $table->string('buy_price');
            $table->string('Images');
            $table->string('Product_code');
            $table->string('buy_date');
            $table->string('expire_date');
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
        Schema::dropIfExists('medicines');
    }
}
