@extends('layouts.main_layout')

@section('title', $record->game_name)

@section('content')

    <img src="{{$image_path}}" class="img-fluid" height="150">

    <p><b>{{$record->game_name}}</b></p>

    <p><ul class="list-group"><b>Жанры:</b>
    @foreach($record->genres as $genre)
            <li>{{$genre->genre_name}}</li>
    @endforeach
    </ul></p>

    <p><b>Дата выхода:</b> {{$record->release_date}}</p>

    <p><b>Издатель:</b> {{$record->publishers->publisher_name}}</p>
    <p><b>Разработчик:</b> {{$record->developers->developer_name}}</p>

    <p><b>Оценка:</b> {{$record->rating}}</p>
    <p><b>Описание:</b><br>{{$record->description}}</p>

    <a href="/edit/{{$record->id}}">Редактировать запись</a>
    <p></p>
@endsection
