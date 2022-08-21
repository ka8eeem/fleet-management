<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripsRouteLinesPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trip_routes_prices')->insert([
            [
                'trip_route_id' => 1,
                'price' => 100
            ],
            [
                'trip_route_id' => 2,
                'price' => 200
            ],
            [
                'trip_route_id' => 3,
                'price' => 300
            ],
            [
                'trip_route_id' => 4,
                'price' => 300
            ],
            [
                'trip_route_id' => 5,
                'price' => 600
            ],
            [
                'trip_route_id' => 5,
                'price' => 400
            ],
        ]);
    }
}
