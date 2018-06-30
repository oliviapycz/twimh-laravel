<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ingredient'
    ];

    public function recipes() {
        return $this->belongsToMany('App\Recipe', 'recipes_ingredients', 'ingredient_id', 'recipe_id');
    }
}
