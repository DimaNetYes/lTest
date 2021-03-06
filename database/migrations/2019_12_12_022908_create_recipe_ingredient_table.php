<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_ingredient', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('recipe_id')->unsigned()->onDelete('recipe');
            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->bigInteger('ingredient_id')->unsigned()->onDelete('ingredient');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
            $table->string('quantity')->nullable()->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_ingredient');
    }
}
