<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-4 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Портал РИО</h5>
    <nav class="my-2 my-md-0 mr-md-3">
            @if (Auth::user()->isAdmin())
                <a class="p-2 text-dark" href="{{ route('home') }}">Вернуться на сайт</a>
                <a class="p-2 text-dark" href="{{ route('admin.index') }}">Главная</a>
                <a class="p-2 text-dark" href="{{ route('news.index') }}">Новости</a>
                <a class="p-2 text-dark" href="{{ route('work.index') }}">Публикации</a>
                <a class="p-2 text-dark" href="{{ route('documents.index') }}">Документы</a>
                <a class="p-2 text-dark" href="{{ route('users.index') }}">Пользователи</a>

        @endif
    </nav>
        @if (Auth::user()->isAdmin())
            <a href="#" class="nav-link">{{ Auth::user()->getName() }}</a>
            <a href="{{ route('auth.signout') }}" class="btn btn-sm btn-outline-danger mr-2">Выйти</a>
        @endif
</div>
