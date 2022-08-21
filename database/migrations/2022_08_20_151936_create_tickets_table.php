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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->unsignedBigInteger('trip_id');
            $table->unsignedBigInteger('route_line_id');
            $table->string('customer_number');
            $table->string('seat_number');
            $table->bigInteger('price');
            $table->timestamps();

            $table->foreign('trip_id')
                ->references('id')
                ->on('trips')
                ->onUpdate('restrict')
                ->onDelete('cascade');

            $table->foreign('route_line_id')
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
        Schema::dropIfExists('tickets');
    }
};
