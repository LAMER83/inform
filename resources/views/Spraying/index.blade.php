@extends('layouts.base')
@section('title', 'Текущие данные об опрыскивание ')

@section('info')


    <div class="container gx-4">

            <div class="row">
                @can('viewAny', 'App\Models\spraying')
                <div class="col-4 p-3"><a class="btn btn-outline-success" href="{{route('spraying.create')}}">Внести
                        опрыскивание</a></div>
                <div class="col-4 p-3"><a class="btn btn-outline-success" href="/spraying/report">Отчеты</a></div>
                @endcan
                    @can('myView', 'App\Models\spraying')
                <div class="col-4 p-3">


                <div class="dropdown">
                    <button type="button" class="btn btn-outline-info dropdown-toggle" data-bs-toggle="dropdown">
                        Справочники
                    </button>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="/pole">Поля/севооборот</a></li>
                        <li class="dropdown-item"><a href="/nomenklature">Номенклатура</a></li>
                        <li class="dropdown-item"><a href="/szr">СЗР</a></li>
                    </ul>
                </div>

                </div>
                @endcan
            </div>

        <div class="container gx-4">
            <div class="row">


               <div class="col-xl-10">
                    <div class="row">
                        @foreach($arr as $filial => $name)
                            <div class="col"> {{$filial}}
                                @foreach($name as $item)
                                    <div><a href="spraying/{{$item['pole']['id']}}">{{$item['pole']['name']}}</a></div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('info')
