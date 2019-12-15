<?php

namespace App\Http\Controllers\Instruments;

use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ingredient;
use Illuminate\Support\Facades\DB;

class EditRecipeController extends Controller
{
    public function index(Request $request)
    {
//        dd($request);
        $ingredients = Ingredient::where("user_id", auth()->user()->id)->get();

        $recipeDB = new Recipe();
        $recipe = $recipeDB->where('id', $request['recipe_id'])->get(); //вставочные данные

        $ingredientsAll = $recipeDB->find($request['recipe_id']);     //вставочные данные
        $quantity = DB::table('recipe_ingredient')->select("quantity")->where("recipe_id", $request['recipe_id'])->get();
        $ingredientsAll = $ingredientsAll->ingredients;
        $recipe_id = $request['recipe_id'];
        return view("instruments.editRecipe", compact('ingredients', 'recipe', 'ingredientsAll', 'quantity', 'recipe_id'));

    }

    public function edit(Request $request)
    {
        $recipe = new Recipe(); //DB:recipe
        $user_recipe = DB::table('user_recipe'); //DB:user_recipe
        $recipe_ingredient = DB::table('recipe_ingredient'); //DB

        $recipe = $recipe->find($request->recipe_id);//текущий рецепт
        $current_rec_ingr = $recipe_ingredient->where('recipe_id', $request->recipe_id)->get(); //Текущий recipe_ingredient массив с полями

        $count_ingredients = $request->ingredients; //кол-во пришедших ингредиентов
//dd($current_rec_ingr);
        dd($current_rec_ingr);
        if($request->has('submit')){ //Если форма отправлена
            $recipe->name = $request->input('title');
            $recipe->description = $request->input('desc');
            $recipe->save();


            if(count($current_rec_ingr) == count($count_ingredients)){  //Если при update пользователь не добавил ингредиенты

                foreach($current_rec_ingr as $key => $val){
                    DB::table('recipe_ingredient')->where('id', $val->id)->update(['ingredient_id' => $request->ingredients[$key], 'quantity' => $request->quantity[$key]]);
                }

            }else if(count($count_ingredients) > count($current_rec_ingr) ){

                foreach($current_rec_ingr as $key => $val){
                    DB::table('recipe_ingredient')->where('id', $val->id)->update(['ingredient_id' => $request->ingredients[$key], 'quantity' => $request->quantity[$key]]);
                }

                for($i = count($current_rec_ingr); $i < count($count_ingredients); $i++) {
                    DB::table('recipe_ingredient')->insert(['recipe_id' => $request->recipe_id, 'ingredient_id' => $request->ingredients[$i], 'quantity' => $request->quantity[$i]]);
                }

            }else if(count($count_ingredients) > count($current_rec_ingr) ){



            }
//            dd();

        }

        return redirect('home');  //перенаправляем на home что бы HomeController@index подтянул с базы рецепты
    }
}
