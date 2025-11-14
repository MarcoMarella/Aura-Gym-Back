<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Abbigliamento',
                'slug' => 'abbigliamento',
                'description' => 'Abbigliamento sportivo per la palestra',
            ],
            [
                'name' => 'Integratori',
                'slug' => 'integratori',
                'description' => 'Integratori alimentari per il fitness',
            ],
            [
                'name' => 'Accessori',
                'slug' => 'accessori',
                'description' => 'Accessori per l\'allenamento',
            ],
            [
                'name' => 'Attrezzatura',
                'slug' => 'attrezzatura',
                'description' => 'Attrezzatura per il fitness',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
