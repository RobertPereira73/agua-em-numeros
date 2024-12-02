<?php

namespace Database\Seeders;

ini_set('memory_limit', '4024M');

use App\Http\Services\FillDatabaseService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FillDatabaseSeeder extends Seeder
{
    public function __construct(
        private FillDatabaseService $fillDatabaseService = new FillDatabaseService()
    )
    {}

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = storage_path('app/data/2015-01-01-15.json');
        $content = file_get_contents($path);
        $data = json_decode($content, true);

        foreach ($data as $item) {
            $this->fillDatabaseService->fill($item);
        }

        dd("Importacao concluída!");
    }
}