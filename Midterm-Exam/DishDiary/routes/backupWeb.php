<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('recipe.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/recipe', [RecipeController::class, 'index'])->name('recipe.index')->middleware(['auth', 'verified']);

Route::get('/recipe/create', [RecipeController::class, 'create'])->name('recipe.create')->middleware(['auth', 'verified']);
Route::post('/recipe', [RecipeController::class, 'store'])->name('recipe.store')->middleware(['auth', 'verified']);

Route::get('/recipe/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipe.edit')->middleware(['auth', 'verified']);
Route::put('/recipe/{recipe}/update', [RecipeController::class, 'update'])->name('recipe.update')->middleware(['auth', 'verified']);

Route::post('/recipes/{recipe}/incrementUpvotes', [RecipeController::class, 'incrementUpvotes'])->name('recipe.incrementUpvotes')->middleware(['auth', 'verified']);

Route::delete('/recipe/{recipe}/destroy', [RecipeController::class, 'destroy'])->name('recipe.destroy')->middleware(['auth', 'verified']);

Route::post('/recipes/{recipe}/bookmark', [RecipeController::class, 'bookmark'])->name('recipe.bookmark');
Route::delete('/recipes/{recipe}/unbookmark', [RecipeController::class, 'unbookmark'])->name('recipe.unbookmark');

Route::get('/recipe/bookmark', [RecipeController::class, 'bookmarkedRecipes'])->name('recipe.bookmarked');