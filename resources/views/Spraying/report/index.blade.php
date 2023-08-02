@extends('layouts.base')
@section('title', 'Отчеты о опрыскивание ')

@section('info')

    <div class="container px-5">
        <div class="row row-cols-2 gy-5">


            <div class="col-6">
                <form action="{{route('spraying.report.show', ['id' => 1])}}" method="POST">
                    @csrf
                    <label for="dateSelect">Выберите дату</label>
                    <input class="form-control" type="date" name="date"
                           value="{{\Illuminate\Support\Carbon::today()->format('Y-m-d')}}" id="dateSelect">
                    <input class="btn btn-primary" type="submit" value="Показать">
                </form>
            </div>
            <div class="col-12">
                <a class="btn btn-info" href="/spraying">Назад</a>
            </div>


            <div class="col-12">
                @forelse($arr_value as $filial_id => $item)
                    @if ($loop->first)
                        <table class="table table-bordered">
                            @endif
                            <tr>
                                <td colspan="3"><b>{{\App\Models\filial::where('id', $filial_id)->value('name')}}</b>
                                </td>
                            </tr>
                            @foreach($item as $pole_name => $szr)
                                @foreach($szr as $name => $value)
                                    @if($loop->first)
                                        <tr>
                                            <td rowspan="{{count($szr)+1}}">{{$pole_name}}</td>
                                    @endif
                                    <tr>
                                        <td>{{$name}} </td>
                                        <td> {{$value}}</td>
                                    </tr>
                                    @if($loop->last)
                                    </tr>
                                    @endif
                                @endforeach



                            @endforeach

                            @if($loop->last)
                        </table>
                    @endif
                @empty
                    <p>Нет данных по опрыскиванию на эту дату</p>

                @endforelse

            </div>


        </div>
    </div>










@endsection('info')
