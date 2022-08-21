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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('trip_ref');
            $table->unsignedBigInteger('start_station');
            $table->unsignedBigInteger('end_station');
            $table->date('trip_start_date');
            $table->dateTime('trip_end_date'); //if trip completed on two days
            $table->timestamps();

            $table->foreign('start_station')
                ->references('id')
                ->on('stations')
                ->onUpdate('restrict')
                ->onDelete('cascade');

            $table->foreign('end_station')
                ->references('id')
                ->on('stations')
                ->onUpdate('restrict')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
};
