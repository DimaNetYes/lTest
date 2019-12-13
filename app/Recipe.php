<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_recipe', 'user_id', 'recipe_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'recipe_ingredient', 'ingredient_id', 'receipt_id');
    }
}
