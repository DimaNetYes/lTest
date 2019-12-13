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
                    <input name="title" value="{{old('title')}}" required><br><br>
                    <label for="">Описание</label>
                    <textarea name="desc" id="" cols="30" rows="10"></textarea>
                    <hr>
                    <div id="selects">
                        <select name="ingredients[]">     //Нужно в select подтягивать option ингредиенты
                            @foreach($ingredients as $val)
                                <option value="{{$val->id}}">{{$val->name}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="quantity[]" required style="width:100px;">
                        <button class="cross">X</button><br><br>

                    </div>

                    <button id="addSelectIngredient" onclick="addIngredient()">Добавить</button>
                    <button>Создать новый ингредиент</button>
                    <hr>
                    <input name="submit" type="submit" value="Сохранить рецепт">
                </form>

            </div>
        </div>
    </div>

    <script>
        function addIngredient(){
            let select = document.createElement('select');
            select.name = "ingredients[]";
            let inp = document.createElement('input');
            inp.name = "quantity[]";
            let btn = document.createElement('button');
            btn.className = "cross";
            btn.innerHTML = "X";
            let br = "<br><br>";
            var data = JSON.parse('{!!  $ingredients !!}');
            console.log(data);

            for(let o in data){
                let option = document.createElement('option');
                option.value = data[o].id;
                option.innerHTML = data[o].name;
                select.appendChild(option);
            }

            let insertDiv = document.getElementById('selects');

            insertDiv.appendChild(select);
            insertDiv.appendChild(inp);
            insertDiv.appendChild(btn);
            insertDiv.insertAdjacentHTML('beforeend', br);
        }
    </script>
@endsection















