<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ingredient;

class IngredientController extends Controller
{
    public function add(Request $request)
    {
        if($request->ingredient == null){
            return redirect("recipe");
        }else if($request->main == 1){
            $ingredient = new Ingredient();
            $ingredient->name = $request->ingredient;
//        dd($request->ingredient);
            $ingredient->user_id = auth()->user()->id;
            $ingredient->save();
            return redirect("lists/ingredients");
        }else if($request->main == 2){
            $ingredient = new Ingredient();
            $ingredient->name = $request->ingredient;
//        dd($request);
            $ingredient->user_id = auth()->user()->id;
            $ingredient->save();
            return redirect()->route("editRecipe", ['recipe_id' => $request->recipe_id]);
        }else {
            $ingredient = new Ingredient();
            $ingredient->name = $request->ingredient;
//        dd($request->ingredient);
            $ingredient->user_id = auth()->user()->id;
            $ingredient->save();
            return redirect("recipe");
        }
    }

}
