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
            $table->string('barcode_id');
            $table->string('strength');
            $table->string('generic_name')->nullable();
            $table->unsignedBigInteger('box_size');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('manufacturer_id');
            $table->string('product_location');
            $table->string('product_details');
            $table->string('price');
            $table->string('image')->nullable();
            $table->string('manufacturer_price');
            $table->string('tax0');
            $table->string('tax1');
            $table->string('status');
            $table->timestamps();

            $table->foreign('box_size')->references('id')->on('medicine_leaves')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('medicine_units')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('medicine_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('medicine_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onUpdate('cascade')->onDelete('cascade');

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
