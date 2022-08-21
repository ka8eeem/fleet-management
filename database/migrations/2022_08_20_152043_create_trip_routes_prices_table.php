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
        Schema::create('trip_routes_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_route_id');
            $table->bigInteger('price');

            $table->foreign('trip_route_id')
                ->references('id')
                ->on('trips_route_lines')
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
        Schema::dropIfExists('trip_routes_prices');
    }
};
