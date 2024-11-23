<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\SavedRecipe;
use App\Models\Recipe;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [    
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function bookmarkedRecipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'saved_recipes', 'user_id', 'recipe_id')->withTimestamps();
    }

    public function upvotedRecipes()
    {
        return $this->belongsToMany(Recipe::class, 'upvotes')->withTimestamps();
    }

    // Function to check if a user has already upvoted a recipe
    public function hasUpvoted(Recipe $recipe)
    {
        return $this->upvotedRecipes->contains($recipe->id);
    }
}
