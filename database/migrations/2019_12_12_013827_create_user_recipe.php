<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRecipe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_recipe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('recipe_id');
            $table->foreign('recipe_id')->references('id')->on('recipes');
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
        Schema::dropIfExists('user_recipe');
    }
}
