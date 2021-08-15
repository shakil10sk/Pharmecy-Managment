<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('designation_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('salary_type');
            $table->string('salary_value');
            $table->string('email')->nullable();
            $table->string('blood')->nullable();
            $table->string('address')->nullable();
            $table->string('address2')->nullable();
            $table->string('country')->nullable();
            $table->string('image')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->enum('status',['active','inactive']);
            $table->timestamps();
            $table->foreign('designation_id')->references('id')->on('designations')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
