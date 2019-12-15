@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div><a href="{{route('home')}}"> Мои рецепты</a></div>
                <div><a href="{{route('ingredients')}}"> Ингредиенты</a></div>
            </div>

            <div class="col-8">
                <h3>Добавление ингредиента</h3>
                {{--{{dd($ingredient)}}--}}
                <form action="{{action('Setting\IngredientController@edit')}}" method="post">
                    {{--{{$ingredients}}--}}
                    {{csrf_field()}}
                    <input type="hidden" name="ingredient_id" value="{{$ingredient->id}}">
                    <label for="">Название</label>
                    <input type="text" name="ingredient" value="{{$ingredient->name}}" required>
                    <hr>
                    <input type="submit" value="Сохранить">
                </form>


            </div>
        </div>
    </div>
@endsection




















