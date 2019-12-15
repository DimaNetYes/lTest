@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 delimiter">
                <table class="table">
                    <tr>
                        <td>
                            <div>
                                <img src="https://img.icons8.com/metro/26/000000/book.png">
                                <a href="{{route('home')}}"> Мои рецепты</a></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <img src="https://img.icons8.com/android/24/000000/puzzle.png">
                                <a href="{{route('ingredients')}}"> Ингредиенты</a></div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-8" style="word-break: break-word;">
                <div class="wrapper_showRecipe">
                    <div class="recipeName" style="font-weight: bold;">{{$recipe->name}}</div>
                    <div class="recipeDesc" style="margin-top: 40px;">{{$recipe->description}}</div>
                </div>


                <h3 style="margin-top: 40px;">Ингредиенты</h3>

                <table class="table">
                    <tbody>
                    <?php $superlogic = 0;?>
                    @foreach($ingredients as $val)
                        <tr>
                            <th scope="row">{{$val->name}}</th>
                            <td>{{$quantity[$superlogic++]->quantity}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection











