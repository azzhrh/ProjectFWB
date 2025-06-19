<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('plants')->insert([
        [
            'category_id' => 1,
            'name' => 'Monstera Deliciosa',
            'description' => 'Tanaman indoor dengan daun berlubang unik.',
            'image' => 'monstera.jpg',
            'price' => 55000,
            'stock' => 10,
        ],
        [
            'category_id' => 1,
            'name' => 'Sansevieria',
            'description' => 'Dikenal juga sebagai lidah mertua, mudah dirawat.',
            'image' => 'sansevieria.jpg',
            'price' => 35000,
            'stock' => 15,
        ],
        [
            'category_id' => 3,
            'name' => 'Kaktus Mini',
            'description' => 'Tanaman kecil berduri, cocok untuk hiasan meja.',
            'image' => 'kaktus_mini.jpg',
            'price' => 20000,
            'stock' => 20,
        ],
    ]);

    }
}
