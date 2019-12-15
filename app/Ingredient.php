<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name', 'user_id',
    ];
    public function recipe()
    {
        return $this->belongsToMany('App\Recipe', 'recipe_ingredient', 'receipt_id');
    }
}
