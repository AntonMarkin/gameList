@extends('layouts.main_layout')

@section('title', 'Главная')

@section('content')
    <h2>Список гамесов:</h2>
    <p>Фильтрация</p>
    <form>

        <select name="publisher_filter">
            <option selected disabled>По издателю</option>
            @foreach($publishers as $publisher)
                <option value="{{$publisher->id}}">{{$publisher->publisher_name}}</option>
            @endforeach
        </select>

        <select name="order_by_date">
            <option selected disabled>По дате выхода</option>
            <option value="asc">По возрастанию</option>
            <option value="desc">По убыванию</option>
        </select>

        <button type="submit" class="btn btn-primary">Фильтровать</button>
    </form>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Издатель</th>
                <th scope="col">Оценка</th>
                <th scope="col">Дата выхода</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($records->all() as $rec)
                    <tr>
                        <td>{{ $rec->game_name}}</td>
                        <td>{{ $rec->publishers->publisher_name}}</td>
                        <td>{{ $rec->rating}}</td>
                        <td>{{ $rec->release_date}}</td>
                        <td><a href="/info/{{$rec->id}}">Подробнее</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
