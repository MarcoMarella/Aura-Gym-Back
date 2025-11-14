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
            'name' => 'Gym Anime',
            'slug' => 'gym-anime',
            'description' => 'Collezione ispirata agli anime più iconici',
            'parent_id' => null,
        ]);

        $videogiochi = Category::create([
            'name' => 'Gym Game',
            'slug' => 'gym-game',
            'description' => 'Collezione ispirata ai videogiochi cult',
            'parent_id' => null,
        ]);

        // Sottocategorie per Gym Anime
        Category::create([
            'name' => 'Maglie Oversize',
            'slug' => 'gym-anime-maglie-oversize',
            'description' => 'Maglie oversize con stampe anime',
            'parent_id' => $anime->id,
        ]);

        Category::create([
            'name' => 'Maglie Fit',
            'slug' => 'gym-anime-maglie-fit',
            'description' => 'Maglie fit con stampe anime',
            'parent_id' => $anime->id,
        ]);

        Category::create([
            'name' => 'Maglia Cosplay',
            'slug' => 'gym-anime-maglia-cosplay',
            'description' => 'Maglie cosplay di personaggi anime',
            'parent_id' => $anime->id,
        ]);

        // Sottocategorie per Gym Game
        Category::create([
            'name' => 'Maglie Oversize',
            'slug' => 'gym-game-maglie-oversize',
            'description' => 'Maglie oversize con stampe da videogiochi',
            'parent_id' => $videogiochi->id,
        ]);

        Category::create([
            'name' => 'Maglie Fit',
            'slug' => 'gym-game-maglie-fit',
            'description' => 'Maglie fit con stampe da videogiochi',
            'parent_id' => $videogiochi->id,
        ]);

        Category::create([
            'name' => 'Maglia Cosplay',
            'slug' => 'gym-game-maglia-cosplay',
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
