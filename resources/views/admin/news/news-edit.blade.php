@extends('admin.layouts.app')

@section('title')Редактирование новости@endsection

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Редактирование новости</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('news.update', $news->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" name="title" value={{ $news->title }} />
                </div>

                <div class="form-group">
                    <label for="author">Автор</label>
                    <input type="text" class="form-control" name="author" value={{ $news->author }} />
                </div>

                <div class="form-group">
                    <label for="text">Основной текст</label>
                    <textarea id="text" name="text" cols="40" class="form-control"
                              rows="5" placeholder="Текст">{{ $news->text }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection
