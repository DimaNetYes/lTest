<?php

namespace App\Http\Controllers\Instruments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recipe;
use Illuminate\Support\Facades\DB;

class ShowRecipeController extends Controller
{
    public function index(Request $request)
    {
        $recipe = Recipe::find($request->input('recipe_id'));
//        $recipeTable = $recipe->where('id', $request->input('recipe_id'))->get();
        $ingredients = $recipe->ingredients;
        $quantity = DB::table('recipe_ingredient')->select("quantity")->where("recipe_id", $recipe->id)->get(); //superlogic

        return view('instruments.showRecipe', compact('recipe', 'ingredients', 'quantity'));
    }
}
