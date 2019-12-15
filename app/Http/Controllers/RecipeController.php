<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;
use App\User;
use App\Recipe;
use App\User_Recipe;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    //
    public function index()
    {
        $ingredients = Ingredient::where("user_id", auth()->user()->id)->get();

        return view("setting.create", compact('ingredients'));
    }

    public function create(Request $request)
    {
        $request->flash();
        $recipe = new Recipe; //DB:recipe
        $user_recipe = DB::table('user_recipe'); //DB:user_recipe
        $recipe_ingredient = DB::table('recipe_ingredient'); //DB

        if ($request->has('submit')) { //Если форма отправлена
            $recipe->name = $request->input('title');
            $recipe->description = $request->input('desc');
            $recipe->save();

            $user_recipe->insert(['user_id' => auth()->user()->id, 'recipe_id' => $recipe->get('id')->last()->id]); //вставка в DB:user_recipe

            $ingredient_quantity = $request->only(['ingredients', 'quantity']);
            $index = 0;
            foreach ($ingredient_quantity['ingredients'] as $key => $elem) {
                $recipe_ingredient->insert(['recipe_id' => $recipe->get('id')->last()->id, 'ingredient_id' => $ingredient_quantity['ingredients'][$index], 'quantity' => $ingredient_quantity['quantity'][$index++]]); //в DB:recipe_ingredien
            }
        }

        return redirect('home');  //перенаправляем на home что бы HomeController@index подтянул с базы рецепты
    }
}
