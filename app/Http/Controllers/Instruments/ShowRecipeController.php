<?php

namespace App\Http\Controllers\Instruments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowRecipeController extends Controller
{
    public function index()
    {

        return view('instruments.showRecipe');
    }
}
