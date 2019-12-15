<?php

namespace App\Http\Controllers\Lists;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ingredient;

class IngredientListController extends Controller
{
    public function index()
    {
        $ingredient = new Ingredient();
        $ingredients = $ingredient->where('user_id', auth()->user()->id)->get();

        return view('lists.ingredients', compact('ingredients'));
    }


}
