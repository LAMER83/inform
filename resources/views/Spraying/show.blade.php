@extends('layouts.base')
@section('title', 'Текущие данные об опрыскивание ')

@section('info')


    <div class="row">
        <div class="col-2">
            <a class="btn btn-info" href="/spraying">Назад</a>
        </div>

    </div>

    <div class="row m-4">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                @forelse($sprayings as $name => $watering)
                    @if($loop->first)
                        <button class="nav-link active" id="nav-{{$name}}-tab" data-bs-toggle="tab" data-bs-target="#nav-{{$name}}" type="button" role="tab" aria-controls="nav-{{$name}}" aria-selected="true">{{$name}}</button>
                    @else
                        <button class="nav-link" id="nav-{{$name}}-tab" data-bs-toggle="tab" data-bs-target="#nav-{{$name}}" type="button" role="tab" aria-controls="nav-{{$name}}" aria-selected="false">{{$name}}</button>
                    @endif
                @empty
                @endforelse
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            @forelse($sprayings as $name => $spraying)

                @if($loop->first)
                    <div class="tab-pane fade show active"  id="nav-{{$name}}" role="tabpanel" aria-labelledby="nav-{{$name}}-tab">
                        <table class="table table-bordered table-striped">
                            <caption class="caption-top">Поле: <b>{{$spraying[0]->pole->name}}</b></caption>
                            <thead>
                            <th>Дата</th>
                            <th>Культура</th>
                            <th>Препарат</th>
                            <th>Дозировка</th>
                            <th>Объем</th>
                            <th>Комментарий</th>

                            @if($harvest_show[$spraying[0]->Sevooborot->HarvestYear->id])
                                <th>Действия</th>
                            @endif
                            </thead>
                            @else
                                <div class="tab-pane fade "  id="nav-{{$name}}" role="tabpanel" aria-labelledby="nav-{{$name}}-tab">
                                    <table class="table table-bordered table-striped">
                                        <caption class="caption-top">Поле: <b>{{$spraying[0]->pole->name}}</b></caption>
                                        <thead>
                                        <th>Дата</th>
                                        <th>Культура</th>
                                        <th>Препарат</th>
                                        <th>Дозировка</th>
                                        <th>Объем</th>
                                        <th>Комментарий</th>
                                        @if($harvest_show[$spraying[0]->Sevooborot->HarvestYear->id])
                                            <th>Действия</th>
                                        @endif
                                        </thead>
                                        @endif
                                        <tbody>
                                        @foreach($spraying as $value)
                                            <tr>
                                                <td>{{\Carbon\Carbon::parse($value->date)->translatedFormat('d-m-Y')}}</td>
                                                <td>{{$value->Cultivation->name}} {{$value->Nomenklature->name}} {{$value->Reproduktion->name ?? null }} ({{$value->Sevooborot->square}} Га)</td>
                                                <td>{{$value->szr->name}}</td>
                                                <td>{{$value->doza}}</td>
                                                <td>{{$value->volume}}</td>
                                                <td>{{$value->comments}}</td>
                                                @if($harvest_show[$spraying[0]->Sevooborot->HarvestYear->id])
                                                <td align="center">
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-sm btn-outline-info dropdown-toggle" data-bs-toggle="dropdown">
                                                            Действия
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <form action="{{ route('spraying.destroy', ['spraying' => $value->id])}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <li><input type="submit" class="dropdown-item text-danger" value="Удалить"></li>
                                                            </form>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                            @if($loop->last)
                                        </tbody>
                                    </table>
                                    @endif
                                    @endforeach
                                </div>

                        @empty
                        @endforelse
                    </div>
        </div>









@endsection('info')
