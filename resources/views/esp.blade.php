@extends('layouts.base')
@section('title', 'Активация корпоративных пользователей')

@section('info')
    <div class="container">
        <form action="{{route('addresses')}}" method="post" enctype="multipart/form-data">
            <button class="form-control" type="submit" name="save">Сохранить</button>
        </form>
    </div>
@endsection('info')
