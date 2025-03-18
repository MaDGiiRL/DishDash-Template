<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::orderBy('created_at', 'desc')->paginate(12);
        return view('recipe.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('recipe.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required',
            'ingredients' => 'required|array',
            'ingredients.*.name' => 'required|string|max:255',
            'ingredients.*.quantity' => 'required|numeric',
            'ingredients.*.unit' => 'required|string|max:50',
            'categories' => 'required|array',
            'img' => 'nullable|image',
            'prep_hours' => 'nullable|integer|min:0',
            'prep_minutes' => 'nullable|integer|min:0|max:59',
            'cook_hours' => 'nullable|integer|min:0',
            'cook_minutes' => 'nullable|integer|min:0|max:59',
        ]);

        $recipe = Auth::user()->recipes()->create([
            'title' => $request->title,
            'body' => $request->body,
            'img' => $request->has('img') ? $request->file('img')->store('images', 'public') : '/images/default.png',
            'ingredients' => $data['ingredients'],
            'prep_time' => ($request->prep_hours * 60) + $request->prep_minutes,
            'cook_time' => ($request->cook_hours * 60) + $request->cook_minutes,
            'servings' => $request->input('servings', 4),
        ]);

        $recipe->categories()->sync($data['categories']);

        return redirect(route('recipe.index'))->with('message', 'Recipe Posted.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        $categories = Category::take(6)->get();
        return view('recipe.show', compact('recipe', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        $categories = Category::all();
        return view('recipe.edit', compact('recipe', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'ingredients' => 'required|array',
            'ingredients.*.name' => 'required|string',
            'ingredients.*.quantity' => 'required|numeric',
            'ingredients.*.unit' => 'required|string',
            'cooking_time_hours' => 'nullable|integer|min:0',
            'cooking_time_minutes' => 'nullable|integer|min:0|max:59',
            'preparation_time_hours' => 'nullable|integer|min:0',
            'preparation_time_minutes' => 'nullable|integer|min:0|max:59',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
            'img' => 'nullable|image|max:2048',
        ]);

        $recipe->update([
            'title' => $request->title,
            'body' => $request->body,
            'ingredients' => json_encode($request->ingredients),
            'cooking_time' => ($request->cooking_time_hours * 60) + $request->cooking_time_minutes,
            'preparation_time' => ($request->preparation_time_hours * 60) + $request->preparation_time_minutes,
        ]);


        if ($request->has('categories')) {
            $recipe->categories()->sync($request->categories);
        }

        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('public/recipes');
            $recipe->update(['img' => $path]);
        }

        return redirect()->route('recipe.show', compact('recipe'))->with('success', 'Recipe updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->categories()->detach();
        $recipe->user()->dissociate();
        $recipe->delete();

        return redirect(route('recipe.index'))->with('message', ' Recipe Deleted with Success!');
    }

    public function recipesByCategory(Category $category)
    {
        $recipes = $category->recipes;
        return view('recipe.category', compact('recipes', 'category'));
    }
}
