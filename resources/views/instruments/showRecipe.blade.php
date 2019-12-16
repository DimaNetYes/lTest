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
                <form action="{{action('Setting\IngredientController@editQuantity')}}" method="post" name="ingredients">
                    {{csrf_field()}}
                    <button style="display:none;"></button>
                </form>
                <table class="table">
                    <tbody>
                    <?php $superlogic = 0;?>

                    @foreach($ingredients as $val)
                        <tr>
                            <th scope="row">{{$val->name}}</th>
                            <td class="quantity"><span onclick="cquantity()" style="padding:5px;" class="cquantity" data-ingredientId="{{$val->id}}" data-recipeId="{{$recipe->id}}">{{$quantity[$superlogic++]->quantity}}</span></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{--<script type="text/javascript" src="{{asset('js/show.js')}}"></script>--}}
    <script src="{{asset('js/show.js')}}"></script>
@endsection











