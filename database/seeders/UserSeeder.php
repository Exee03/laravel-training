<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name" => "user 1",
                "email" => "user1@example.com",
                "password" => Hash::make('user111'),
            ],
            [
                "name" => "user 2",
                "email" => "user2@example.com",
                "password" => Hash::make('user222'),
            ],
        ];
        DB::table('users')->insert($users);
    }
}
