@extends('admin.layouts.app')

@section('title')Панель администратора@endsection

@section('content')
    <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Здравствуйте, {{ Auth::user()->getName() }}!</h1>
                <p>Вы попали на страницу панели администратора.</p>
                <p>Ниже, а также в панели навигации вы можете увидеть все разделы доступные для администрирования.</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-3">
                    <h2>Новости</h2>
                    <p>В данном разделе представлена возможность администрирования блока новостей.</p>
                </div>
                <div class="col-md-3">
                    <h2>Публикации</h2>
                    <p>В данном разделе представлена возможность администрирования блока публикаций.</p>
                </div>
                <div class="col-md-3">
                    <h2>Документы</h2>
                    <p>В данном разделе представлена возможность администрирования блока документов.</p>
                </div>
                <div class="col-md-3">
                    <h2>Пользователи</h2>
                    <p>Использую данный раздел панели администратора вы можете получить информацию обо всех пользователях а также изменять их роли и корректировать данные.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <p><a class="btn btn-secondary" href="{{ route('news.index') }}" role="button"><i class="fa fa-pencil"></i>Администрировать</a></p>
                </div>
                <div class="col-md-3">
                    <p><a class="btn btn-secondary" href="{{ route('work.index') }}" role="button"><i class="fa fa-pencil"></i>Администрировать</a></p>
                </div>
                <div class="col-md-3">
                    <p><a class="btn btn-secondary" href="{{ route('documents.index') }}" role="button"><i class="fa fa-pencil"></i> Администрировать</a></p>
                </div>
                <div class="col-md-3">
                    <p><a class="btn btn-secondary" href="{{ route('users.index') }}" role="button"><i class="fa fa-pencil"></i> Администрировать</a></p>
                </div>
            </div>

            <hr>

        </div> <!-- /container -->

    </main>
@endsection
