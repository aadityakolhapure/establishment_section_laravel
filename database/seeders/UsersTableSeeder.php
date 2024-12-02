<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //admin
            [
                'name' =>  'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],

            //agent
            [
                'name' =>  'faculty',
                'email' => 'faculty@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'faculty',
            ],

            //user
            [
                'name' =>  'Hod',
                'email' => 'hod@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'hod',
            ],
            [
                'name' =>  'principal',
                'email' => 'principal@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'principal',
            ]
        ]);
    }
}
