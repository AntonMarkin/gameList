@extends('layouts.main_layout')

@section('title', 'Регистрация')

@section('content')

    <form method="post">
        @csrf
        <p></p>
        <input type="email" name="email" class="form-control" placeholder="Email" required>
        <p></p>
        <input type="password" name="password" class="form-control" placeholder="Пароль" required>
        <p></p>
        <input type="text" name="name" class="form-control" placeholder="Имя" required>
        <p></p>

        <button class="btn btn-primary" type="submit">Зарегистрироваться</button>
        <p></p>

    </form>

@endsection
