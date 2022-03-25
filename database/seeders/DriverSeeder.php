<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drivers = [
            [
                "user_id" => 1,
                "car_id" => 1,
                "name" => "driver 1",
            ],
            [
                "user_id" => 2,
                "car_id" => 2,
                "name" => "driver 2",
            ],
        ];
        DB::table('drivers')->insert($drivers);
    }
}
