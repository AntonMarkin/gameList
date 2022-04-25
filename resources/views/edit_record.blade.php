@extends('layouts.main_layout')

@section('title', $game_record->game_name)

@section('content')

    <form enctype="multipart/form-data" method="post" >
        @csrf
        <p>Название игры:<br>
            <input type="text" name="game" size="25" maxlength="100" placeholder="Не более 100 символов" value="{{ $game_record->game_name }}" required>
        </p>

        <p>Жанр(ы):
        <ol class="list-group">
            @foreach($genres as $genre)
                @if($game_record->genres->contains($genre->id))
                    <li><input checked type="checkbox" name="genres[]" value="{{$genre->id}}"> {{$genre->genre_name}}</li>
                @else
                    <li><input type="checkbox" name="genres[]" value="{{$genre->id}}"> {{$genre->genre_name}}</li>
                @endif
            @endforeach

        </ol></p>

        <p>Издатель:<br>
            <select name="publisher" required>
                <option disabled>Выберите издателя</option>
                @foreach($publishers as $publisher)
                    @if($game_record->publisher_id == $publisher->id)
                        <option selected value="{{$publisher->id}}">{{$publisher->publisher_name}}</option>
                    @else
                        <option value="{{$publisher->id}}">{{$publisher->publisher_name}}</option>
                    @endif
                @endforeach
            </select>
        </p>

        <p>Разработчик:<br>
            <select name="developer" required>
                <option disabled>Выберите разработчика</option>
                @foreach($publishers as $publisher)
                    <optgroup label="{{$publisher->publisher_name}}">
                        @foreach($publishers->find($publisher->id)->developer as $developer)
                            @if($game_record->developer_id == $developer->id)
                                <option selected value="{{$developer->id}}">{{$developer->developer_name}}</option>
                            @else
                                <option value="{{$developer->id}}">{{$developer->developer_name}}</option>
                            @endif
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </p>

        <p>Дата выхода:<br>
            <input type="date" name="release_date" id="release_date" min="1950-01-01" value="{{ $game_record->release_date }}" required>
        </p>
        <p>Оценка:<br>
            <input type="number" name="rating" id="rating" min="1" max="10" step="0.1" value="{{ $game_record->rating }}" required>
        </p>

        <p>Изображение:<br>

            @if($game_record->image_path != null)
                <img src="{{'/storage/'.$game_record->image_path}}" class="img-fluid" height="70">
            @else
                <img src="{{'/storage/images/no_image.png'}}" class="img-fluid" height="70">
            @endif

            <input type="hidden" name="deleteImage" value="0">
            <input type="checkbox" name="deleteImage" value="1">Удалить прежнее изображение?<br><br>
            <input type="file" name="image" accept="image/*"><br>
        </p>

        <p>Описание:<br>
            <textarea name="description" id="description" cols="50" rows="5" maxlength="500" placeholder="Не более 500 символов" required >{{ $game_record->description }}</textarea></p>
        <hr>

        <button type="submit" class="btn btn-success">Сохранить запись</button> <button name="delete" type="submit" value="1" class="btn btn-danger">Удалить запись</button>
    </form>


@endsection
