<?php

namespace App\Http\Controllers\Instruments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Recipe;

class DeleteRecipeController extends Controller
{
    public function index(Request $request)
    {
        $recipe_ingredient = DB::table('recipe_ingredient');
        $user_recipe = DB::table('user_recipe');

        $recipe = Recipe::find($request->input('recipe_id'));
        $ingredients = $recipe->ingredients;

        $recipe_ingredient->where('recipe_id', $recipe->id)->delete(); //recipe_ingredient DELETE
        $user_recipe->where('id', $recipe->id)->delete();
        DB::table('recipes')->where('id', $request->input('recipe_id'))->delete(); //Удаляю recipe

//        foreach ($ingredients as $val){
//            DB::table('ingredients')->where('id', $val->id)->delete(); //ЭТО НЕ НАДО Удаление ингредиентов
//        }
        return redirect('home');
    }
}
