@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div><a href="{{route('home')}}"> Мои рецепты</a></div>
                <div><a href=""> Ингредиенты</a></div>
            </div>
            <div class="col-8" style="word-break: break-word;">
                <div class="wrapper_showRecipe">
                    <div class="recipeName">{{$recipe->name}}</div>
                    <div class="recipeDesc">{{$recipe->description}}</div>
                </div>


                <h3>Ингредиенты</h3>
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











