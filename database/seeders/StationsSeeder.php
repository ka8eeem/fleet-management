<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = ['Cairo', 'Giza', 'Assyout', 'Luxor'];

        foreach ($cities as $city) {
            DB::table('stations')->insert([
                'city' => $city,
                'name' => "{$city}-stations",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
