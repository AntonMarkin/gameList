<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <header class="d-flex justify-content-center py-3">
        <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-4">@yield('title')</span>
        </a>
        <x-main-header></x-main-header>
    </header>
    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="bg-secondary text-white">Вы вошли как: {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
    @endif

    @if(Session::has('message'))
        <div class="alert alert-success">
            <p>{{Session::get('message')}}</p>
        </div>
    @elseif(Session::has('cringe'))
        <div class="alert alert-warning">
            <p>{{Session::get('cringe')}}</p>
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


    @yield('content')
</div>

</body>
</html>
