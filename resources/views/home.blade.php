@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div><a href="{{route('home')}}"> Мои рецепты</a></div>
                <div><a href=""> Ингредиенты</a></div>
            </div>
            <div class="col">
                <p>Мои рецепты</p>
                <div style="position: absolute; top: 10px; right: 50px;"><a href="{{route('recipe')}}" style="border: 1px solid black; box-shadow: 1px 5px 5px 0px rgba(0, 0, 0, 1)">Добавить рецепт</a></div>

                <table class="table table-bordered">
                    <tr>
                        <td>Рецепт</td>
                        <td>Описание</td>
                        <td>Действия</td>
                    </tr>

                    @foreach($recipes as $val)
                        <tr>
                            <td>{{$val->name}}</td>
                            <td>{{$val->description}}</td>
                            <td>
                                <a href="{{route('showRecipe')}}" class="bi bi-alert-triangle">
                                    <img src="https://img.icons8.com/ios/50/000000/search--v1.png">
                                </a>
                                <a href="{{route('recipe')}}">
                                    <img src="https://img.icons8.com/ios/50/000000/edit.png">
                                </a>
                                <a href="">
                                    <img src="https://img.icons8.com/ios/50/000000/delete-sign.png">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
@endsection
