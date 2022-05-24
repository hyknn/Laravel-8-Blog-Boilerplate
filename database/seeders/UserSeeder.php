<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [[
                'name' => 'Administrator',
                'email' => 'admin@hyoth.com',
                'password' => Hash::make('admin1234'),
                'email_verified_at' => '2022-05-24 12:57:39',
            ],
            [
                'name' => 'Anita',
                'email' => 'anita@hyoth.com',
                'password' => Hash::make('admin1234'),
                'email_verified_at' => '2022-05-24 12:57:39',
            ]]
        );
    }
}
