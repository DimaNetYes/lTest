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
        $ingredients = Ingredient::all();

        return view("setting.create", compact('ingredients'));
    }

    public function create(Request $request)
    {
        $recipe = new Recipe; //DB:recipe
        $user_recipe = DB::table('user_recipe'); //DB:user_recipe
        $ingredient = new Ingredient;
        dd($request);
        if($request->has('submit')){ //Если форма отправлена
            $recipe->name = $request->title;
            $recipe->description = $request->desc;
            $recipe->save();

            $user_recipe->insert(['user_id' => auth()->user()->id, 'recipe_id' => $recipe->get('id')->last()->id]); //вставка в DB:user_recipe


        }



        return redirect('home');  //перенаправляем на home что бы HomeController@index подтянул с базы рецепты
    }
}
