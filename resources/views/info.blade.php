@extends('layouts.main_layout')

@section('title', $game_record->game_name)

@section('content')

    @if($game_record->image_path != null)
        <img src="{{'/storage/'.$game_record->image_path}}" class="img-fluid" height="70">
    @else
        <img src="{{'/storage/images/no_image.png'}}" class="img-fluid" height="70">
    @endif

    <h3><b>{{$game_record->game_name}}</b></h3>

    <p><ul class="list-group"><b>Жанры:</b>
    @foreach($game_record->genres as $genre)
            <li>{{$genre->genre_name}}</li>
    @endforeach
    </ul></p>

    <p><b>Дата выхода:</b> {{$game_record->release_date}}</p>

    <p><b>Издатель:</b> {{$game_record->publisher->publisher_name}}</p>
    <p><b>Разработчик:</b> {{$game_record->developer->developer_name}}</p>

    <p><b>Оценка:</b> {{$game_record->rating}}</p>
    <p><b>Описание:</b><br>{{$game_record->description}}</p>

    <a href="{{route('edit_record',['id' => $game_record->id])}}">Редактировать запись</a>
    <p></p>
@endsection
