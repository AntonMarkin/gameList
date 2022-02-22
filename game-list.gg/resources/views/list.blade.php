@extends('sample')

@section('title')
    Главная
@endsection

@section('navigation')
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/new" class="nav-link">Добавить запись</a></li>
    </ul>
@endsection

@section('content')
    <h2>Список гамесов:</h2>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Оценка</th>
                <th scope="col">Дата выхода</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($records->all() as $rec)
                    <tr>
                        <td>{{ $rec->game}}</td>
                        <td>{{ $rec->genre}}</td>
                        <td>{{ $rec->rating}}</td>
                        <td>{{ $rec->releaseDate}}</td>
                        <td><a href="/info/{{$rec->id}}">Подробнее</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
