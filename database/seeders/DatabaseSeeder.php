<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Definiamo le categorie e le immagini
        $categories = [
            ['name' => 'Fish', 'image' => '/images/popular-cat/fish.png'],
            ['name' => 'Seafood', 'image' => '/images/popular-cat/seafood.png'],
            ['name' => 'Meat', 'image' => '/images/popular-cat/meat.png'],
            ['name' => 'Chicken', 'image' => '/images/popular-cat/chicken.png'],
            ['name' => 'Pasta', 'image' => '/images/popular-cat/pasta.png'],
            ['name' => 'Pizza', 'image' => '/images/popular-cat/pizza.png'],
            ['name' => 'Pastries', 'image' => '/images/popular-cat/pastries.png'],
            ['name' => 'Bread', 'image' => '/images/popular-cat/bread.png'],
            ['name' => 'Desserts', 'image' => '/images/popular-cat/cake.png'],
            ['name' => 'Smoothies', 'image' => '/images/popular-cat/smoothie.png'],
            ['name' => 'Breakfast', 'image' => '/images/popular-cat/toast.png'],
            ['name' => 'Icecream', 'image' => '/images/popular-cat/icecream.png'],
            ['name' => 'Vegan', 'image' => '/images/popular-cat/green.png'],
            ['name' => 'Dips', 'image' => '/images/popular-cat/dips.png'],
            ['name' => 'Drinks', 'image' => '/images/popular-cat/drinks.png'],
            ['name' => 'Oriental', 'image' => '/images/popular-cat/oriental.png'],
        ];

        // Creiamo le categorie con le immagini
        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'image' => $category['image'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
