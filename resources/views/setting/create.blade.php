@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div><a href="{{route('home')}}"> Мои рецепты</a></div>
                <div><a href=""> Ингредиенты</a></div>
            </div>
            <div class="col">
                <p>Добавление рецепта</p>
                <form action="{{route('createRecipe')}}" method="POST">
                    {{ csrf_field() }}
                    <lavel>Название</lavel>
                    <input name="title" value="" required><br><br>
                    <label for="">Описание</label>
                    <textarea name="desc" id="" cols="30" rows="10"></textarea>
                    <hr>

                    <select name="ingredients" id="">     //Нужно в select подтягивать option ингредиенты
                        @foreach($ingredients as $val)
                            <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    </select>
                    <input type="text" required style="width:100px;">
                    <button class="cross">X</button><br><br>

                    <select name="ingredients1" id="">     //Нужно в select подтягивать option ингредиенты
                        @foreach($ingredients as $val)
                            <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    </select>
                    <input type="text" required style="width:100px;">
                    <button class="cross">X</button><br><br>

                    <button id="addSelectIngredient">Добавить</button>
                    <button>Создать новый ингредиент</button>
                    <hr>
                    <input name="submit" type="submit" value="Сохранить рецепт">
                </form>

            </div>
        </div>
    </div>
@endsection















