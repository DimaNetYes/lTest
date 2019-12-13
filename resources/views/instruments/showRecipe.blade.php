@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div><a href="{{route('home')}}"> Мои рецепты</a></div>
                <div><a href=""> Ингредиенты</a></div>
            </div>
            <div class="col">
                <table class="table">
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection











