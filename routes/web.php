<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RecipeController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/my-account', [PublicController::class, 'account'])->name('account');
Route::delete('/user/destroy', [PublicController::class, 'user_destroy'])->name('user.destroy');

Route::get('/recipe/create', [RecipeController::class, 'create'])->name('recipe.create')->middleware('auth');
Route::post('/recipe/store', [RecipeController::class, 'store'])->name('recipe.store')->middleware('auth');
Route::get('/recipe/index', [RecipeController::class, 'index'])->name('recipe.index');
Route::get('/recipe/show/{recipe}', [RecipeController::class, 'show'])->name('recipe.show')->middleware('auth');