@extends('admin.layouts.app')

@section('title')Создание новости@endsection

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Добавить новость</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('news.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input type="text" class="form-control" name="title"/>
                    </div>

                    <div class="form-group">
                        <label for="author">Автор</label>
                        <input type="text" class="form-control" name="author"/>
                    </div>
                    <div class="form-group">
                        <label for="text">Основной текст</label>
                        <textarea id="text" name="text" cols="40" class="form-control"
                                  rows="5" placeholder="Текст"></textarea>
                    </div>
                    <button type="submit" class="btn btn btn-outline-primary"><i class="fa fa-plus"></i> Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
