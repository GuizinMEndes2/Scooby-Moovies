<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'name' => 'Terror',
            ],
            [
                'name' => 'Ação',
            ],
            [
                'name' => 'Musical',
            ],
            [
                'name' => 'Suspense',
            ],
            [
                'name' => 'Comédia',
            ],
            [
                'name' => 'Desenho Animado',
            ],
            [
                'name' => 'Fantasia',
            ],
            [
                'name' => 'Documentário',
            ],
        ]);
    }
}