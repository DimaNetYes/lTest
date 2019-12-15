@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div><a href="{{route('home')}}"> Мои рецепты</a></div>
                <div><a href="{{route('ingredients')}}"> Ингредиенты</a></div>
            </div>

            <div class="col-8">
                <h3>Ингредиенты</h3>
                {{--<button style="position:absolute; top:0px; left: 340px;">Добавить ингредиент</button>--}}
                <a href="{{url('lists/createIngredient')}}" style="position:absolute; top:0px; left: 340px;">Добавить Ингредиент</a>
                <table class="table table-bordered" style='border:3px solid black;'>
                    <tr style="background: lightgrey; line-height: 5px;">
                        <td>Меню</td>
                        <td>Действия</td>
                    </tr>
                    {{--{{dd($ingredients)}}--}}
                    @foreach($ingredients as $val)
                    <tr>
                        <td style="width: 80%;">{{$val->name}}</td>
                        <td><a href="{{route('lists/editIngredient', ['ingredient_id' => $val->id])}}">
                                <img src="https://img.icons8.com/ios/50/000000/edit.png">
                            </a>
                            <a href="{{route('lists/deleteIngredient', ['ingredient_id' => $val->id])}}">
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

























