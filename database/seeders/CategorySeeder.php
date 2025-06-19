<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
            DB::table('categories')->insert([
        ['name' => 'Indoor', 'description' => 'Tanaman untuk dalam ruangan'],
        ['name' => 'Outdoor', 'description' => 'Tanaman untuk luar ruangan'],
        ['name' => 'Kaktus', 'description' => 'Berbagai jenis kaktus'],
        ['name' => 'Gantung', 'description' => 'Tanaman gantung'],
        ['name' => 'Aquascape', 'description' => 'Tanaman untuk aquascape'],
    ]);

    }
}
