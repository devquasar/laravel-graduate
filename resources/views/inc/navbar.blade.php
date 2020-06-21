<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-4 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a class="text-decoration-none" href="{{ route('home') }}">Портал РИО</a></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        @if (Auth::check())
            @if (Auth::user()->isAdmin() OR Auth::user()->isPublisher())
                <a class="p-2 text-dark" href="{{ route('home') }}">Главная</a>
                <a class="p-2 text-dark" href="{{ route('about') }}">Об отделе</a>
                <a class="p-2 text-dark" href="{{ route('works') }}">Публикации</a>
                <a class="p-2 text-dark" href="{{ route('contact') }}">Контакты</a>
                <a class="p-2 text-dark" href="#">Издателю</a>
            @elseif (Auth::user()->isUser())
                <a class="p-2 text-dark" href="#">Главная</a>
                <a class="p-2 text-dark" href="{{ route('about') }}">Об отделе</a>
                <a class="p-2 text-dark" href="{{ route('works') }}">Публикации</a>
                <a class="p-2 text-dark" href="{{ route('contact') }}">Контакты</a>
            @elseif (Auth::user()->isDisabled())
                <a class="p-2 text-dark" href="#">Главная</a>
            @endif
        @else
            <a class="p-2 text-dark" href="#">Главная</a>
        @endif
    </nav>
    @if (Auth::check())
        @if (Auth::user()->isAdmin())
            <a href="#" class="nav-link">{{ Auth::user()->getName() }}</a>
            <a href="#" class="btn btn-sm btn-outline-primary mr-2">Обновить профиль</a>
            <a href="{{ route('admin.index') }}" class="btn btn-sm btn-outline-info mr-2">Панель администратора</a>
            <a href="{{ route('auth.signout') }}" class="btn btn-sm btn-outline-danger mr-2">Выйти</a>
        @elseif (Auth::user()->isPublisher() OR Auth::user()->isUser())
            <a href="#" class="nav-link">{{ Auth::user()->getName() }}</a>
            <a href="#" class="btn btn-sm btn-outline-primary mr-2">Обновить профиль</a>
            <a href="{{ route('auth.signout') }}" class="btn btn-sm btn-outline-danger mr-2">Выйти</a>
        @endif
    @else
        <a class="btn btn-sm btn-outline-primary mr-2" href="{{ route('auth.signin') }}">Войти</a>
        <a class="btn btn-sm btn-outline-secondary mr-2" href="{{ route('auth.signup') }}">Зарегистрироваться</a>
    @endif
</div>
