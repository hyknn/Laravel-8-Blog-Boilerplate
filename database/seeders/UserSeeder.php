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
            [
                'name' => 'Administrator',
                'email' => 'admin@hyoth.com',
                'password' => Hash::make('admin1234'),
            ],
            [
                'name' => 'Anita',
                'email' => 'admin@hyoth.com',
                'password' => Hash::make('admin1234'),
            ],
        );
    }
}
