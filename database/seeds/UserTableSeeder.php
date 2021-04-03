<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'mobile' => '123456789',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'Mr. Demo',
            'email' => 'demo@gmail.com',
            'mobile' => '01889967514',
            'password' => Hash::make('123456'),
        ]);
    }
}
