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
