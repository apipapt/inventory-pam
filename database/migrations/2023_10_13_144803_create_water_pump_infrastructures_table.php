<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaterPumpInfrastructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_pump_infrastructures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('water_pump_id');
            $table->string('name');
            $table->string('location');
            $table->string('capacity')->nullable();
            $table->string('swl_dwl')->nullable();
            $table->string('mt')->nullable();
            $table->string('kw')->nullable();
            $table->string('overhead')->nullable();
            $table->string('lt')->nullable();
            $table->timestamps();

            $table->foreign('water_pump_id')->references('id')
                  ->on('water_pumps')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('water_pump_infrastructures');
    }
}
