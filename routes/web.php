<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/recipe', 'RecipeController@index')->name('recipe');
Route::post('/recipe', ['as' => 'createRecipe', 'uses' => 'RecipeController@create']);

Route::get('/showRecipe', array('as' => 'showRecipe', 'uses' => 'Instruments\ShowRecipeController@index'));
Route::get('/editRecipe', 'Instruments\EditRecipeController@index')->name('edit');
Route::post('/editRecipe', 'Instruments\EditRecipeController@edit')->name('editRecipe');
Route::get('/deleteRecipe', array('as' => 'deleteRecipe', 'uses' => 'Instruments\DeleteRecipeController@index'));

Route::post('/ingredientController', 'Setting\IngredientController@add');

Route::get('lists/ingredients', 'Lists\IngredientListController@index')->name('ingredients');
Route::get('lists/createIngredient', function(){return view('lists.createIngredient');});


