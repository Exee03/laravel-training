<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maintenances = [
            [
                "car_id" => 1,
                "mileage" => 1111,
                "details" => "maintenance 1",
                "maintenance_at" => "2022-03-25 12:00:00",
            ],
            [
                "car_id" => 2,
                "mileage" => 2222,
                "details" => "maintenance 2",
                "maintenance_at" => "2022-03-25 12:00:00",
            ],
            [
                "car_id" => 1,
                "mileage" => 3333,
                "details" => "maintenance 3",
                "maintenance_at" => "2022-03-25 12:00:00",
            ],
        ];
        DB::table('maintenances')->insert($maintenances);
    }
}
