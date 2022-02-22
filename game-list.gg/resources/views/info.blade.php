@extends('sample')

@section('title')
    {{$record->game}}
@endsection

@section('navigation')
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link">Главная</a></li>
    </ul>
@endsection

@section('content')
    <p>{{$record->game}}</p>
    <p>Жанр: {{$record->genre}}</p>
    <p>Дата выхода: {{$record->releaseDate}}</p>
    <p>Разработчик: {{$record->developer}}</p>
    <p>Оценка: {{$record->rating}}</p>
    <p>Описание:<br><textarea readonly="readonly" cols="50" rows="5">{{$record->description}}</textarea></p>
@endsection
