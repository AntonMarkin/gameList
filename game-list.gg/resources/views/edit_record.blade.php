@extends('layouts.main_layout')

@section('title', $record->game_name)

@section('content')

    @if(Session::has('message'))
        <div class="alert alert-success">
            <p>{{Session::get('message')}}</p>
        </div>
    @elseif($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form enctype="multipart/form-data" method="post" >
        @csrf
        <p>Название игры:<br>
            <input type="text" name="game" size="25" maxlength="100" placeholder="Не более 100 символов" value="{{ $record->game_name }}" required>
        </p>

        <p>Жанр(ы):
        <ol class="list-group">
            @foreach($genres as $genre)
                @if($record->genres->contains($genre->id))
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
                    @if($record->publisher_id == $publisher->id)
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
                        @foreach($publishers->find($publisher->id)->developers as $developer)
                            @if($record->developer_id == $developer->id)
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
            <input type="date" name="release_date" id="release_date" min="1950-01-01" value="{{ $record->release_date }}" required>
        </p>
        <p>Оценка:<br>
            <input type="number" name="rating" id="rating" min="1" max="10" step="0.1" value="{{ $record->rating }}" required>
        </p>

        <p>Изображение:<br>
            <img src="{{$image_path}}" class="img-fluid" height="150"><br>
            <input type="hidden" name="img_save" value="0">
            <input type="checkbox" name="img_save" value="1">Оставить прежнее изображение?<br>
            <input type="file" name="image" accept="image/*" value="{{$image_path}}"><br>
        </p>

        <p>Описание:<br>
            <textarea name="description" id="description" cols="50" rows="5" maxlength="500" placeholder="Не более 500 символов" required >{{ $record->description }}</textarea></p>
        <input type="submit">
    </form>

@endsection
