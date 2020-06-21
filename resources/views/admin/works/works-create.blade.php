@extends('admin.layouts.app')

@section('title')Создание публикации@endsection

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Добавить публикацию</h1>
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
                <form method="post" action="{{ route('work.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="author">Автор</label>
                        <input type="text" class="form-control" name="author"/>
                    </div>
                    <div class="form-group">
                        <label for="name">Название публикации</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <input type="text" class="form-control" name="description"/>
                    </div>
                    <div class="form-group">
                        <label for="house">Издательство</label>
                        <input type="text" class="form-control" name="house"/>
                    </div>
                    <div class="form-group">
                        <label for="date">Дата издания</label>
                        <input type="date" name="date"
                               placeholder="Дата издания" id="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="page">Кол-во страниц</label>
                        <input type="number" id="page" name="page"
                               min="1" class="form-control">
                    </div>
                    <label for="image">Картинка: </label>
                    <div class="form-group">
                        <label class="btn btn btn-outline-dark btn-file">
                            Загрузить <input type="file" style="display: none;" name="image" id="image" class="form-control">
                        </label>
                    </div>
                    <button type="submit" class="btn btn btn-outline-primary"><i class="fa fa-plus"></i> Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
