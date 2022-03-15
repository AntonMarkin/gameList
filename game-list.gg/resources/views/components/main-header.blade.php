    <ul class="nav nav-pills">
    @if(Route::current()->getName() == 'list')
            <li class="nav-item"><a href="/" class="nav-link active" >Главная</a></li>
            <li class="nav-item"><a href="/new" class="nav-link" >Добавить запись</a></li>
    @elseif(Route::current()->getName() == 'new_record')
            <li class="nav-item"><a href="/" class="nav-link" >Главная</a></li>
            <li class="nav-item"><a href="/new" class="nav-link active">Добавить запись</a></li>
    @else
            <li class="nav-item"><a href="/" class="nav-link" >Главная</a></li>
            <li class="nav-item"><a href="/new" class="nav-link" >Добавить запись</a></li>
    @endif
    </ul>

