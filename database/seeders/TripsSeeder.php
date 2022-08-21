<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TripsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trips')->insert([
            'trip_ref' => Str::random('6'),
            'start_station' => 1,
            'end_station' => 4,
            'trip_start_date' => Carbon::tomorrow()->toDate(),
            'trip_end_date' => Carbon::tomorrow()->toDate(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
