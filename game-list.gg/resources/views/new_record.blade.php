@extends('layouts.main_layout')

@section('title', 'Добавление записи')

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
            <input type="text" name="game" size="25" maxlength="100" placeholder="Не более 100 символов" value="{{ old('game') }}" required>
        </p>
        <p>Жанр(ы):
            <ol class="list-group">
            @foreach($genres as $genre)
                <li><input type="checkbox" name="genres[]" value="{{$genre->id}}"> {{$genre->genre_name}}</li>
            @endforeach
        </ol></p>
        <p>Издатель:<br>
            <select name="publisher" required>
                <option selected disabled>Выберите издателя</option>
                @foreach($publishers as $publisher)
                    <option value="{{$publisher->id}}">{{$publisher->publisher_name}}</option>
                @endforeach
            </select>
        </p>
        <p>Разработчик:<br>
            <select name="developer" required>
                <option selected disabled>Выберите разработчика</option>
                @foreach($publishers as $publisher)
                    <optgroup label="{{$publisher->publisher_name}}">
                        @foreach($publishers->find($publisher->id)->developers as $developer)
                            <option value="{{$developer->id}}">{{$developer->developer_name}}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </p>
        <p>Дата выхода:<br>
            <input type="date" name="release_date" id="release_date" min="1950-01-01" value="{{ old('release_date') }}" required>
        </p>
        <p>Оценка:<br>
        <input type="number" name="rating" id="rating" min="1" max="10" step="0.1" value="{{ old('rating') }}" required>
        </p>
        <p>Изображение:<br>
            <input type="file" name="image" accept="image/*"><br>`````
        </p>
        <p>Описание:<br>
            <textarea name="description" id="description" cols="50" rows="5" maxlength="500" value="{{ old('description') }} placeholder="Не более 500 символов" required ></textarea></p>
        <input type="submit">
    </form>

@endsection
