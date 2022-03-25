<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = [
            [
                "user_id" => 1,
                "full_address" => "No 1, Jalan 1",
            ],
            [
                "user_id" => 2,
                "full_address" => "No 2, Jalan 2",
            ],
        ];
        DB::table('profiles')->insert($profiles);
    }
}
