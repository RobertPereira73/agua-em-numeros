<?php

namespace Database\Seeders;

ini_set('memory_limit', '4024M');

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FillDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = storage_path('app/data/teste.json');
        $content = file_get_contents($path);
        $data = json_decode($content, true);

        dd($data);
    }
}