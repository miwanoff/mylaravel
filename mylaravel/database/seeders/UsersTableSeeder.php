<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('users')->insert([
            'name' => 'admin user',
            'email' => 'iamadmin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'subscriber user',
            'email' => 'iamsubscriber@gmail.com',
            'role' => 'subscriber',
            'password' => Hash::make('password'),
        ]);

    }
}