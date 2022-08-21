<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripsRouteLinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trips_route_lines')->insert([
            [
                'trip_id' => 1,
                'from_station_id' => 1,
                'to_station_id' => 2,
                'bus_id' => 1,
                'trip_date' => Carbon::tomorrow()->toDate(),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'trip_id' => 1,
                'from_station_id' => 1,
                'to_station_id' => 3,
                'bus_id' => 1,
                'trip_date' => Carbon::tomorrow()->toDate(),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'trip_id' => 1,
                'from_station_id' => 1,
                'to_station_id' => 4,
                'bus_id' => 1,
                'trip_date' => Carbon::tomorrow()->toDate(),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'trip_id' => 1,
                'from_station_id' => 2,
                'to_station_id' => 3,
                'bus_id' => 1,
                'trip_date' => Carbon::tomorrow()->toDate(),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'trip_id' => 1,
                'from_station_id' => 2,
                'to_station_id' => 4,
                'bus_id' => 1,
                'trip_date' => Carbon::tomorrow()->toDate(),
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'trip_id' => 1,
                'from_station_id' => 3,
                'to_station_id' => 4,
                'bus_id' => 1,
                'trip_date' => Carbon::tomorrow()->toDate(),
                'updated_at' => now(),
                'created_at' => now(),
            ],

        ]);
    }
}
