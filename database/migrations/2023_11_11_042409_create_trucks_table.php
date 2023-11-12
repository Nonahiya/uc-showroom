<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('vehicle_id')->constrained('vehicles');
            $table->string('wheel_quantity');
            $table->integer('cargo_area');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trucks');
    }
};
