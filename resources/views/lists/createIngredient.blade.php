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

            <div class="col-8">
                <h3>Добавление ингредиента</h3>
                <form action="{{action('Setting\IngredientController@add')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="main" value="1">
                    <label for="">Название</label>
                    <input type="text" name="ingredient">
                    <hr>
                    <input type="submit" value="Сохранить">
                </form>


            </div>
        </div>
    </div>
@endsection





