@extends('layouts.main_layout')

@section('title', 'Войти')

@section('content')

    <form method="post">
        <h1 class="h3 mb-3 fw-normal">Вход</h1>
        @csrf
        <input type="email" name="email" class="form-control" placeholder="Email" required>
        <p></p>
        <input type="password" name="password" class="form-control" placeholder="Пароль" required>
        <p></p>
        <input type="hidden" name="remember" value="false">
        <input type="checkbox" name="remember" value="true"><label>Запомнить меня</label>
        <p></p>
        <button class="btn btn-primary" type="submit">Войти</button>
        <p></p>
        <a href="/reg">Регистрация</a>
    </form>

@endsection
