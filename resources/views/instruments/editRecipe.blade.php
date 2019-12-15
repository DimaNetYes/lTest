@extends('layouts.app')
@section('head')
    @push('csss')
        <link href="{{ asset('css/create.css') }}" rel="stylesheet">
    @endpush
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div><a href="{{route('home')}}"> Мои рецепты</a></div>
                <div><a href="{{route('ingredients')}}"> Ингредиенты</a></div>
            </div>
            <div class="col">
                <p>Добавление рецепта</p>
                <form action="{{ route('editRecipe') }}" method="POST">
                    {{ csrf_field() }}
                    {{--{{dd($recipe_id)}}--}}
                    <input type="hidden" value="{{$recipe_id}}" name="recipe_id">
                    <lavel>Название</lavel>
                    <input name="title" value="{{$recipe[0]->name}}" required><br><br>
                    <label for="">Описание</label>
                    <textarea name="desc" id="" cols="30" rows="10" value="">{{$recipe[0]->description}}</textarea>
                    <hr>
                    <div id="selects">
                        <?php $superlogic = 0; ?>
                            @foreach($ingredientsAll as $elem)
                                <div class="wrap">
                                    <select name="ingredients[]">
                                        @foreach($ingredients as $val)
                                            @if($val->id == $elem->id)
                                                <option value="{{$val->id}}" selected>{{$val->name}}</option>
                                            @else
                                                <option value="{{$val->id}}">{{$val->name}}</option>
                                            @endif
                                        @endforeach
                                    <input type="text" name="quantity[]" value="{{$quantity[$superlogic++]->quantity}}" required style="width:100px;">
                                    <input type="button" class="cross" value="X" onclick="deleteIngredeient(this)"><br><br>
                                    </select>
                                </div>
                            @endforeach
                    </div>

                    <input type="button" id="addSelectIngredient" onclick="addIngredient()" value="Добавить">
                    <hr>
                    <input name="submit" type="submit" value="Сохранить рецепт">
                </form>
                <button style="position:absolute; top:425px; left: 320px;" onclick="showIngredient()">Создать новый ингредиент</button>

            </div>
        </div>
        <div id="module_ingredient" data-set="1">
            <div id="ingredient">
                <h3>Добавление ингредиента</h3>
                <form action="{{action('Setting\IngredientController@add')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="main" value="2">
                    <input type="hidden" name="recipe_id" value="{{$recipe_id}}">
                    <label for="">Название</label>
                    <input type="text" name="ingredient">
                    <hr>
                    <input type="submit" value="Сохранить">
                </form>
            </div>
        </div>
    </div>

    {{--<script src="{{ URL::asset('js/create.js') }}"></script>--}}
    <script>
        function addIngredient() {
            let select = document.createElement('select');
            select.name = "ingredients[]";
            let inp = document.createElement('input');
            inp.name = "quantity[]";
            let btn = document.createElement('button');
            btn.className = "cross";
            btn.innerHTML = "X";
            btn.addEventListener('click', deleteIngredeient); //delete function
            let br = "<br><br>";

            var data = JSON.parse('{!!  $ingredients !!}');
            for (let o in data) {
                let option = document.createElement('option');
                option.value = data[o].id;
                option.innerHTML = data[o].name;
                select.appendChild(option);
            }

            let wrap = document.createElement('div');
            wrap.className = "wrap";
            wrap.appendChild(select);
            wrap.appendChild(inp);
            wrap.appendChild(btn);
            wrap.insertAdjacentHTML('beforeend', br);
            let insertDiv = document.getElementById('selects');

            insertDiv.appendChild(wrap);
            // insertDiv.appendChild(inp);
            // insertDiv.appendChild(btn);

        }

        function deleteIngredeient() {
            event.target.parentNode.remove();
            // console.log(event.target.parentNode);
        }

        function showIngredient(){
            let moduleIngredient = document.getElementById('module_ingredient');
            moduleIngredient.style.display = "block";
            moduleIngredient.addEventListener('click', function(){
                if(event.target.dataset.set == 1){
                    moduleIngredient.style.display = "none";
                }
            });
        }
    </script>
@endsection