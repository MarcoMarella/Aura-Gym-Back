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
        $abbigliamento = Category::where('slug', 'abbigliamento')->first();
        $integratori = Category::where('slug', 'integratori')->first();
        $accessori = Category::where('slug', 'accessori')->first();
        $attrezzatura = Category::where('slug', 'attrezzatura')->first();

        $products = [
            // Abbigliamento
            [
                'category_id' => $abbigliamento->id,
                'name' => 'T-Shirt Fitness Pro',
                'slug' => 't-shirt-fitness-pro',
                'description' => 'T-shirt tecnica traspirante per allenamenti intensi',
                'price' => 29.99,
                'sale_price' => 24.99,
                'stock' => 50,
                'image' => '/images/products/tshirt.jpg',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_id' => $abbigliamento->id,
                'name' => 'Pantaloni da Training',
                'slug' => 'pantaloni-da-training',
                'description' => 'Pantaloni elasticizzati per massima libertà di movimento',
                'price' => 49.99,
                'stock' => 40,
                'image' => '/images/products/pants.jpg',
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'category_id' => $abbigliamento->id,
                'name' => 'Felpa con Cappuccio',
                'slug' => 'felpa-con-cappuccio',
                'description' => 'Felpa comoda per il riscaldamento e il defaticamento',
                'price' => 59.99,
                'sale_price' => 49.99,
                'stock' => 30,
                'image' => '/images/products/hoodie.jpg',
                'is_active' => true,
                'is_featured' => true,
            ],
            
            // Integratori
            [
                'category_id' => $integratori->id,
                'name' => 'Proteine Whey 1kg',
                'slug' => 'proteine-whey-1kg',
                'description' => 'Proteine del siero del latte di alta qualità',
                'price' => 39.99,
                'sale_price' => 34.99,
                'stock' => 100,
                'image' => '/images/products/protein.jpg',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_id' => $integratori->id,
                'name' => 'BCAA Aminoacidi',
                'slug' => 'bcaa-aminoacidi',
                'description' => 'Aminoacidi ramificati per il recupero muscolare',
                'price' => 24.99,
                'stock' => 80,
                'image' => '/images/products/bcaa.jpg',
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'category_id' => $integratori->id,
                'name' => 'Pre-Workout Energy',
                'slug' => 'pre-workout-energy',
                'description' => 'Formula energetica per allenamenti intensi',
                'price' => 29.99,
                'stock' => 60,
                'image' => '/images/products/preworkout.jpg',
                'is_active' => true,
                'is_featured' => true,
            ],
            
            // Accessori
            [
                'category_id' => $accessori->id,
                'name' => 'Guanti da Palestra',
                'slug' => 'guanti-da-palestra',
                'description' => 'Guanti con grip antiscivolo per sollevamento pesi',
                'price' => 19.99,
                'sale_price' => 14.99,
                'stock' => 70,
                'image' => '/images/products/gloves.jpg',
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'category_id' => $accessori->id,
                'name' => 'Borraccia Sportiva 1L',
                'slug' => 'borraccia-sportiva-1l',
                'description' => 'Borraccia termica per idratazione durante l\'allenamento',
                'price' => 14.99,
                'stock' => 90,
                'image' => '/images/products/bottle.jpg',
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'category_id' => $accessori->id,
                'name' => 'Fascia da Polso',
                'slug' => 'fascia-da-polso',
                'description' => 'Fascia elastica di supporto per i polsi',
                'price' => 12.99,
                'stock' => 100,
                'image' => '/images/products/wristband.jpg',
                'is_active' => true,
                'is_featured' => false,
            ],
            
            // Attrezzatura
            [
                'category_id' => $attrezzatura->id,
                'name' => 'Tappetino Yoga',
                'slug' => 'tappetino-yoga',
                'description' => 'Tappetino antiscivolo per yoga e pilates',
                'price' => 34.99,
                'sale_price' => 29.99,
                'stock' => 45,
                'image' => '/images/products/mat.jpg',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_id' => $attrezzatura->id,
                'name' => 'Manubri 2x5kg',
                'slug' => 'manubri-2x5kg',
                'description' => 'Set di manubri rivestiti in neoprene',
                'price' => 44.99,
                'stock' => 35,
                'image' => '/images/products/dumbbells.jpg',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_id' => $attrezzatura->id,
                'name' => 'Elastici Fitness Set',
                'slug' => 'elastici-fitness-set',
                'description' => 'Set di 5 elastici con diverse resistenze',
                'price' => 24.99,
                'stock' => 55,
                'image' => '/images/products/bands.jpg',
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
