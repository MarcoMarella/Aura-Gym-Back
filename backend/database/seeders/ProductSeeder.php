<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categorie principali
        $anime = Category::where('slug', 'gym-anime')->first();
        $videogiochi = Category::where('slug', 'gym-game')->first();
        
        // Sottocategorie Gym Anime
        $animeMaglieOversize = Category::where('slug', 'gym-anime-maglie-oversize')->first();
        $animeMaglieFit = Category::where('slug', 'gym-anime-maglie-fit')->first();
        $animeCosplay = Category::where('slug', 'gym-anime-maglia-cosplay')->first();
        
        // Sottocategorie Gym Game
        $vgMaglieOversize = Category::where('slug', 'gym-game-maglie-oversize')->first();
        $vgMaglieFit = Category::where('slug', 'gym-game-maglie-fit')->first();
        $vgCosplay = Category::where('slug', 'gym-game-maglia-cosplay')->first();
        
        // Asciugamani
        $asciugamani = Category::where('slug', 'asciugamani')->first();

        $products = [
            // GYM ANIME - Maglie Oversize
            [
                'category_id' => $animeMaglieOversize->id,
                'name' => 'Maglia Oversize Naruto Hokage',
                'slug' => 'maglia-oversize-naruto-hokage',
                'description' => 'Maglia oversize con stampa Naruto Hokage, stile street wear',
                'price' => 34.99,
                'sale_price' => 29.99,
                'stock' => 50,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_id' => $animeMaglieOversize->id,
                'name' => 'Maglia Oversize One Piece Luffy',
                'slug' => 'maglia-oversize-one-piece-luffy',
                'description' => 'Maglia oversize con Rufy e la ciurma, taglio moderno',
                'price' => 34.99,
                'stock' => 45,
                'is_active' => true,
                'is_featured' => true,
            ],
            
            // GYM ANIME - Maglie Fit
            [
                'category_id' => $animeMaglieFit->id,
                'name' => 'Maglia Fit Attack on Titan',
                'slug' => 'maglia-fit-attack-on-titan',
                'description' => 'Maglia aderente con logo Scouting Legion',
                'price' => 29.99,
                'stock' => 60,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_id' => $animeMaglieFit->id,
                'name' => 'Maglia Fit Dragon Ball Z Saiyan',
                'slug' => 'maglia-fit-dragon-ball-z',
                'description' => 'Maglia fit con simbolo Saiyan, perfetta per il gym',
                'price' => 29.99,
                'sale_price' => 24.99,
                'stock' => 55,
                'is_active' => true,
                'is_featured' => false,
            ],
            
            // GYM ANIME - Cosplay
            [
                'category_id' => $animeCosplay->id,
                'name' => 'Maglia Cosplay Akatsuki',
                'slug' => 'maglia-cosplay-akatsuki',
                'description' => 'Maglia cosplay dell\'organizzazione Akatsuki con nuvole rosse',
                'price' => 39.99,
                'stock' => 40,
                'is_active' => true,
                'is_featured' => true,
            ],
            
            // GYM GAME - Maglie Oversize
            [
                'category_id' => $vgMaglieOversize->id,
                'name' => 'Maglia Oversize GTA V Logo',
                'slug' => 'maglia-oversize-gta-v',
                'description' => 'Maglia oversize con icone di GTA V, stile urban',
                'price' => 34.99,
                'stock' => 50,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_id' => $vgMaglieOversize->id,
                'name' => 'Maglia Oversize Fortnite Victory',
                'slug' => 'maglia-oversize-fortnite',
                'description' => 'Maglia oversize con grafica Victory Royale',
                'price' => 34.99,
                'sale_price' => 29.99,
                'stock' => 45,
                'is_active' => true,
                'is_featured' => false,
            ],
            
            // GYM GAME - Maglie Fit
            [
                'category_id' => $vgMaglieFit->id,
                'name' => 'Maglia Fit League of Legends',
                'slug' => 'maglia-fit-league-of-legends',
                'description' => 'Maglia fit con loghi dei campioni LoL',
                'price' => 29.99,
                'stock' => 60,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_id' => $vgMaglieFit->id,
                'name' => 'Maglia Fit Valorant Agents',
                'slug' => 'maglia-fit-valorant',
                'description' => 'Maglia fit con design degli agenti Valorant',
                'price' => 29.99,
                'stock' => 55,
                'is_active' => true,
                'is_featured' => false,
            ],
            
            // GYM GAME - Cosplay
            [
                'category_id' => $vgCosplay->id,
                'name' => 'Maglia Cosplay Mario Bros',
                'slug' => 'maglia-cosplay-mario',
                'description' => 'Maglia cosplay di Mario con dettagli autentici',
                'price' => 39.99,
                'sale_price' => 34.99,
                'stock' => 35,
                'is_active' => true,
                'is_featured' => true,
            ],
            
            // ASCIUGAMANI
            [
                'category_id' => $asciugamani->id,
                'name' => 'Asciugamano Sportivo Gaming',
                'slug' => 'asciugamano-sportivo-gaming',
                'description' => 'Asciugamano in microfibra con logo gaming',
                'price' => 19.99,
                'stock' => 70,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'category_id' => $asciugamani->id,
                'name' => 'Asciugamano Anime Limited',
                'slug' => 'asciugamano-anime-limited',
                'description' => 'Asciugamano edizione limitata con stampe anime',
                'price' => 24.99,
                'sale_price' => 19.99,
                'stock' => 50,
                'is_active' => true,
                'is_featured' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
