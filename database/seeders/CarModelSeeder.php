<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car_models = [
            [
                "name" => "model 1",
                "brand" => "brand 1",
            ],
            [
                "name" => "model 2",
                "brand" => "brand 2",
            ],
        ];
        DB::table('car_models')->insert($car_models);
    }
}
