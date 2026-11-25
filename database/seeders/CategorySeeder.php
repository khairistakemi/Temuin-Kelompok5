<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $names = ['Elektronik', 'Dompet/Tas', 'Kunci', 'Dokumen/Kartu', 'Pakaian', 'Lainnya'];

        foreach ($names as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}