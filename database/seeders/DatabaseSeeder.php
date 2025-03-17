<?php

namespace Database\Seeders;


use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories = ['Fish', 'Seafood', 'Meat', 'Chicken', 'Pasta', 'Pizza', 'Pastries', 'Bread', 'Desserts', 'Smoothies', 'Breakfast', 'Icecream', 'Vegan', 'Dips', 'Drinks', 'Oriental'];

        foreach ($categories as $category){
            Category::create([
                'name' => $category,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
