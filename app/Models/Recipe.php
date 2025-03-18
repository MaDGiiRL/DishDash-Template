<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title',
        'body',
        'ingredients',
        'img',
        'prep_time',
        'cook_time',
        'servings',
    ];
    protected $casts = [
        'ingredients' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // Metodo per accedere al tempo totale di preparazione (in ore e minuti)
    public function getPreparationTimeAttribute()
    {
        $hours = floor($this->prep_time / 60);
        $minutes = $this->prep_time % 60;
        return "{$hours} hrs {$minutes} min";
    }

    // Metodo per accedere al tempo totale di cottura (in ore e minuti)
    public function getCookingTimeAttribute()
    {
        $hours = floor($this->cook_time / 60);
        $minutes = $this->cook_time % 60;
        return "{$hours} hrs {$minutes} min";
    }
}
