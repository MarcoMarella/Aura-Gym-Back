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
        // Categorie Principali
        $anime = Category::create([
            'name' => 'Anime',
            'slug' => 'anime',
            'description' => 'Collezione ispirata agli anime più iconici',
            'parent_id' => null,
        ]);

        $videogiochi = Category::create([
            'name' => 'Videogiochi',
            'slug' => 'videogiochi',
            'description' => 'Collezione ispirata ai videogiochi cult',
            'parent_id' => null,
        ]);

        // Sottocategorie per Anime
        Category::create([
            'name' => 'Maglie Oversize',
            'slug' => 'anime-maglie-oversize',
            'description' => 'Maglie oversize con stampe anime',
            'parent_id' => $anime->id,
        ]);

        Category::create([
            'name' => 'Maglie Fit',
            'slug' => 'anime-maglie-fit',
            'description' => 'Maglie fit con stampe anime',
            'parent_id' => $anime->id,
        ]);

        Category::create([
            'name' => 'Maglia Cosplay',
            'slug' => 'anime-maglia-cosplay',
            'description' => 'Maglie cosplay di personaggi anime',
            'parent_id' => $anime->id,
        ]);

        // Sottocategorie per Videogiochi
        Category::create([
            'name' => 'Maglie Oversize',
            'slug' => 'videogiochi-maglie-oversize',
            'description' => 'Maglie oversize con stampe da videogiochi',
            'parent_id' => $videogiochi->id,
        ]);

        Category::create([
            'name' => 'Maglie Fit',
            'slug' => 'videogiochi-maglie-fit',
            'description' => 'Maglie fit con stampe da videogiochi',
            'parent_id' => $videogiochi->id,
        ]);

        Category::create([
            'name' => 'Maglia Cosplay',
            'slug' => 'videogiochi-maglia-cosplay',
            'description' => 'Maglie cosplay di personaggi videogiochi',
            'parent_id' => $videogiochi->id,
        ]);

        // Categoria Asciugamani (standalone)
        Category::create([
            'name' => 'Asciugamani',
            'slug' => 'asciugamani',
            'description' => 'Asciugamani sportivi per la palestra',
            'parent_id' => null,
        ]);
    }
}
