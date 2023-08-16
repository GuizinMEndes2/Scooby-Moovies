<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m-categorias')->insert([
            [
                'movie_id' => '1',
                'categoria_id' => '5',
            ],
            [
                'movie_id' => '1',
                'categoria_id' => '6',
            ],
            [
                'movie_id' => '4',
                'categoria_id' => '2',
            ],
            [
                'movie_id' => '4',
                'categoria_id' => '7',
            ],
            [
                'movie_id' => '4',
                'categoria_id' => '4',
            ],
            [
                'movie_id' => '5',
                'categoria_id' => '5',
            ],
            [
                'movie_id' => '6',
                'categoria_id' => '2',
            ],
        ]);
    }
}