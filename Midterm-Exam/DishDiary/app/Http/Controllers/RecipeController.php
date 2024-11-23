<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\User;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
  public function index(Request $request) {
    $search = $request->query('search');

    if ($search) {
        $recipes = Recipe::where('title', 'like', '%' . $search . '%')->get();
    } else {
        $recipes = Recipe::all();
    }

    return view('recipes.index', compact('recipes'));
  }

  public function create() {
    return view('recipes.create');
  }

  public function store(Request $request) {
    $request->validate([
      'title' => 'required|string|max:255',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validate image file
      'ingredients' => 'required|string',
      'instructions' => 'required|string',
    ]);

    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imagePath = $image->store('images', 'public');
    }

    $recipe = new Recipe([
      'title' => $request->input('title'),
      'image' => $imagePath,  // Store the image path
      'ingredients' => $request->input('ingredients'),
      'instructions' => $request->input('instructions'),
    ]);

    $recipe->save();

    return redirect()->route('recipe.index')->with('success', 'Recipe created successfully!');
  }


  public function edit(Recipe $recipe) {
    return view('recipes.edit', ['recipe' => $recipe]);
  }

  public function update(Recipe $recipe, Request $request) {
    $data = $request->validate([
      'title' => 'required|string|max:255',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'ingredients' => 'required|string',
      'instructions' => 'required|string',
    ]);

    if ($request->hasFile('image')) {
      if ($recipe->image && \Storage::exists('public/' . $recipe->image)) {
        \Storage::delete('public/' . $recipe->image);
      }

      $imagePath = $request->file('image')->store('images', 'public');
      $data['image'] = $imagePath;
    }

    $recipe->update($data);

    return redirect(route('recipe.index'))->with('success', 'Recipe Updated Successfully');
  }


  public function incrementUpvotes(Recipe $recipe) {
    $user = auth()->user();

    if ($user->hasUpvoted($recipe)) {
      return redirect()->back()->with('message', 'You have already upvoted this recipe.');
    }

    $recipe->upvotes += 1;
    $recipe->save();

    $user->upvotedRecipes()->attach($recipe->id);

    return redirect()->back()->with('message', 'Upvote successful!');
  }

  
  public function destroy(Recipe $recipe) {
    $recipe->delete();
    return redirect(route('recipe.index'))->with('success', 'Recipe Deleted Successfully');
  }

  public function bookmark(Request $request, Recipe $recipe) {
    $user = auth()->user();
    if (!$user->bookmarkedRecipes()->where('recipe_id', $recipe->id)->exists()) {
        $user->bookmarkedRecipes()->attach($recipe->id);
    }
    return redirect()->back()->with('success', 'Recipe bookmarked!');
  }

  public function unbookmark(Request $request, Recipe $recipe) {
    $user = auth()->user();
    $user->bookmarkedRecipes()->detach($recipe->id);
    return redirect()->back()->with('success', 'Recipe unbookmarked!');
  }

  public function bookmarkedRecipes() {
    $user = auth()->user();
    $bookmarkedRecipes = $user->bookmarkedRecipes()->get();

    return view('recipes.bookmarked', ['bookmarkedRecipes' => $bookmarkedRecipes]);
  }
}
