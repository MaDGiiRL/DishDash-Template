<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage()
    {
        $categories = Category::take(6)->get();
        $recipes = Recipe::inRandomOrder()->take(3)->get();
        
        return view('homepage', compact('categories' , 'recipes'));
    }

    public function account()
    {

        return view('account');
    }

    public function categories()
    {
        return view('categories');
    }
}
