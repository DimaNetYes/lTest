<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ingredient;
use Illuminate\Support\Facades\DB;
use App\Recipe;

class IngredientController extends Controller
{

    public function add(Request $request)
    {
        $request->flash();
        if ($request->ingredient == null) {
            if (isset($request->hiddenTitle) || isset($request->hiddenDesc)) { //поля другой формы
                $hiddenTitle = $request->hiddenTitle;
                $hiddenDesc = $request->hiddenDesc;
                return redirect("recipe")->with('hiddenTitle', $hiddenTitle)->with('hiddenDesc', $hiddenDesc);
            }
            return redirect("recipe");
        } else if ($request->main == 1) {
            $ingredient = new Ingredient();
            $ingredient->name = $request->ingredient;
            $ingredient->user_id = auth()->user()->id;
            $ingredient->save();
            return redirect("lists/ingredients");
        } else if ($request->main == 2) {
            $ingredient = new Ingredient();
            $ingredient->name = $request->ingredient;
            $ingredient->user_id = auth()->user()->id;
            $ingredient->save();
            return redirect()->route("editRecipe", ['recipe_id' => $request->recipe_id]);
        } else {
            $ingredient = new Ingredient();
            $ingredient->name = $request->ingredient;
            $ingredient->user_id = auth()->user()->id;
            $ingredient->save();

            if (isset($request->hiddenTitle) || isset($request->hiddenDesc)) { //поля другой формы
                $hiddenTitle = $request->hiddenTitle;
                $hiddenDesc = $request->hiddenDesc;
                return redirect("recipe")->with('hiddenTitle', $hiddenTitle)->with('hiddenDesc', $hiddenDesc);
            }
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

    public function editQuantity(Request $request)
    {
        $recipe_ingredient = explode(",", $request->recipe_ingredient);
        $recipe_id = $recipe_ingredient[0];
        $ingredient_id = $recipe_ingredient[1];
        $el_val = $recipe_ingredient[2];

        DB::table('recipe_ingredient')->where('recipe_id', $recipe_id)->where('ingredient_id', $ingredient_id)->update( ['quantity' => $el_val]);
//        return redirect('home');

        $recipe = Recipe::find($recipe_id);
        $ingredients = $recipe->ingredients;
        $quantity = DB::table('recipe_ingredient')->select("quantity")->where("recipe_id", $recipe_id)->get(); //superlogic

        return view('instruments.showRecipe', compact('recipe', 'ingredients', 'quantity'));



    }

}
