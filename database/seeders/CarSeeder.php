<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = [
            [
                "user_id" => 1,
                "model_id" => 1,
                "no_plate" => "111",
            ],
            [
                "user_id" => 2,
                "model_id" => 2,
                "no_plate" => "222",
            ],
            [
                "user_id" => 1,
                "model_id" => 2,
                "no_plate" => "333",
            ],
        ];
        DB::table('cars')->insert($cars);
    }
}
