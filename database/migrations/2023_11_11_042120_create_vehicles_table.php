<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('id');
            $table->string('type');
            $table->string('model');
            $table->year('year');
            $table->integer('passenger_quantity');
            $table->string('manufacturer');
            $table->integer('price');
            $table->timestamps();
        });

        // Add foreign key constraints if needed
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
