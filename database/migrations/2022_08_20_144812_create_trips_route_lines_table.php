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
        Schema::create('trips_route_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_id');
            $table->unsignedBigInteger('from_station_id');
            $table->unsignedBigInteger('to_station_id');
            $table->unsignedBigInteger('bus_id');
            $table->date('trip_date');
            $table->timestamps();

            $table->foreign('trip_id')
                ->references('id')
                ->on('trips')
                ->onUpdate('restrict')
                ->onDelete('cascade');

            $table->foreign('from_station_id')
                ->references('id')
                ->on('stations')
                ->onUpdate('restrict')
                ->onDelete('cascade');

            $table->foreign('to_station_id')
                ->references('id')
                ->on('stations')
                ->onUpdate('restrict')
                ->onDelete('cascade');

            $table->foreign('bus_id')
                ->references('id')
                ->on('buses')
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
        Schema::dropIfExists('trips_route_lines');
    }
};
