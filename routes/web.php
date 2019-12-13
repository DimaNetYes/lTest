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

Route::get('/showRecipe', array('as' => 'showRecipe', 'uses' => 'Instruments\ShowRecipeController@index'));

Route::post('/recipe', ['as' => 'createRecipe', 'uses' => 'RecipeController@create']);

Route::post('/ingredientController', 'Setting\IngredientController@add');

