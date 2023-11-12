<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('motorcycles', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('vehicle_id')->constrained('vehicles');
            $table->integer('fuel_capacity');
            $table->integer('trunk_size');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('motorcycles');
    }
};
