<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class BusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buses')->insert([
            'ref' => Str::random(5),
            'license' => Str::random('4'),
            'seats_count' => 12,
            'seat_map' => json_encode([
                [
                    [
                        [
                            "key" => 1,
                            "numbering" => 1,
                            "cols" => 0,
                            "rows" => 0
                        ],
                        [
                            "key" => 2,
                            "numbering" => 2,
                            "cols" => 1,
                            "rows" => 0
                        ],
                        [
                            "key" => 3,
                            "numbering" => 3,
                            "cols" => 2,
                            "rows" => 0,
                        ],
                        [
                            "key" => 4,
                            "numbering" => 4,
                            "cols" => 3,
                            "rows" => 0
                        ]
                    ],
                    [
                        [
                            "key" => 5,
                            "numbering" => 5,
                            "cols" => 0,
                            "rows" => 1
                        ],


                        [
                            "key" => 6,
                            "numbering" => 6,
                            "cols" => 1,
                            "rows" => 1
                        ],


                        [
                            "key" => 7,
                            "numbering" => 7,
                            "cols" => 2,
                            "rows" => 1
                        ],


                        [
                            "key" => 8,
                            "numbering" => 8,
                            "cols" => 3,
                            "rows" => 1
                        ],

                    ],
                    [
                        [
                            "key" => 9,
                            "numbering" => 9,
                            "cols" => 0,
                            "rows" => 2
                        ],


                        [
                            "key" => 10,
                            "numbering" => 10,
                            "cols" => 1,
                            "rows" => 2
                        ],


                        [
                            "key" => 11,
                            "numbering" => 1,
                            "cols" => 2,
                            "rows" => 2
                        ],

                        [
                            "key" => 12,
                            "numbering" => 12,
                            "cols" => 3,
                            "rows" => 2
                        ]
                    ]
                ]
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
