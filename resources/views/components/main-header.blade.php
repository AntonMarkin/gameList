<ul class="nav nav-pills">
    @if(Route::current()->getName() == 'list')
        <li class="nav-item"><a href="/" class="nav-link active">Главная</a></li>
        <li class="nav-item"><a href="/new" class="nav-link">Добавить запись</a></li>
        @if(\Illuminate\Support\Facades\Auth::check())
            <li class="nav-item"><a href="/logout" class="nav-link">Выйти</a></li>
        @else
            <li class="nav-item"><a href="/auth" class="nav-link">Войти</a></li>
        @endif
    @elseif(Route::current()->getName() == 'new_record')
        <li class="nav-item"><a href="/" class="nav-link">Главная</a></li>
        <li class="nav-item"><a href="/new" class="nav-link active">Добавить запись</a></li>
        @if(\Illuminate\Support\Facades\Auth::check())
            <li class="nav-item"><a href="/logout" class="nav-link">Выйти</a></li>
        @else
            <li class="nav-item"><a href="/auth" class="nav-link">Войти</a></li>
        @endif
    @elseif(Route::current()->getName() == 'auth')
        <li class="nav-item"><a href="/" class="nav-link">Главная</a></li>
        <li class="nav-item"><a href="/new" class="nav-link">Добавить запись</a></li>
        <li class="nav-item"><a href="/auth" class="nav-link active">Войти</a></li>
    @else
        <li class="nav-item"><a href="/" class="nav-link">Главная</a></li>
        <li class="nav-item"><a href="/new" class="nav-link">Добавить запись</a></li>
        @if(\Illuminate\Support\Facades\Auth::check())
            <li class="nav-item"><a href="/logout" class="nav-link">Выйти</a></li>
        @else
            <li class="nav-item"><a href="/auth" class="nav-link">Войти</a></li>
        @endif
    @endif
</ul>

