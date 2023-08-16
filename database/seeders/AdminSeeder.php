<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@admin',
                'password' => '$2y$10$WX09RNx9LFULvTi4S7N6heu.KujrjNVYSxwc2efRSuW74cVZSCmrS',
                'isAdm' => 1,
            ],
        ]);
    }
}