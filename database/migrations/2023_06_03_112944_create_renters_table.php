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
        Schema::create('renters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('car_detail_id');
            $table->string('name');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('day');
            $table->string('cost')->default(0);
            $table->foreign('car_detail_id')->references('id')->on('car_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renters');
    }
};
