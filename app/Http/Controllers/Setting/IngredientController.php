<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ingredient;
use Illuminate\Support\Facades\DB;

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

    public function index(Request $request)
    {
        $ingredient = new Ingredient();
        $ingredient = $ingredient->find($request->ingredient_id);
        return view('lists.editIngredient', compact('ingredient'));
    }

    public function edit(Request $request)
    {
        Ingredient::find($request->ingredient_id)->update(['name' => $request->ingredient]);
        return redirect('lists/ingredients');
    }

    public function delete(Request $request)
    {
        DB::table('recipe_ingredient')->where('ingredient_id', $request->ingredient_id)->delete();
        Ingredient::find($request->ingredient_id)->delete();
//        dd($request);
        return redirect('lists/ingredients');
    }

}
