@extends('sample')

@section('title')
    Добавление записи
@endsection

@section('navigation')
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link">На главную</a></li>
    </ul>
@endsection

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

    <form method="post" action="/new/check">
        @csrf
        <p>Название игры:<br>
            <input type="text" name="game" id="game" size="25" maxlength="100" placeholder="Не более 100 символов" required></p>
        <p>Жанр:<br>
            <input type="text" name="genre" id="genre" size="25" maxlength="50" placeholder="Не более 50 символов" required></p>
        <p>Дата выхода:<br>
            <input type="date" name="releaseDate" id="releaseDate" min="1950-01-01" required></p>
        <p>Разработчик:<br>
            <input type="text" name="developer" id="developer" size="25" maxlength="100" placeholder="Не более 100 символов" required></p>
        <p>Оценка:<br>
        <input type="number" name="rating" id="rating" min="1" max="10" step="1" required></p>
        <p>Описание:<br>
            <textarea name="description" id="description" cols="50" rows="5" maxlength="500" placeholder="Не более 500 символов" required></textarea></p>
        <input type="submit">
    </form>

@endsection
