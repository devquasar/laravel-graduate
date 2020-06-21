@extends('admin.layouts.app')

@section('title')Создание новости@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Новости</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('news.create')}}" class="btn btn-primary">Новая новость</a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Заголовок</td>
                    <td>Автор</td>
                    <td>Текст</td>
                    <td>Создана</td>
                    <td>Обновлена</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $record)
                    <tr>
                        <td>{{$record->id}}</td>
                        <td>{{$record->title}}</td>
                        <td>{{$record->author}}</td>
                        <td>{{ mb_strimwidth($record->text, 0, 30, "...") }}</td>
                        <td>{{ date('M d Y', strtotime($record->created_at)) }}</td>
                        <td>{{ date('M d Y', strtotime($record->updated_at)) }}</td>
                        <td>
                            <a href="{{ route('news.edit',$record->id)}}" class="btn btn-primary">Редактировать</a>
                        </td>
                        <td>
                            <form action="{{ route('news.destroy', $record->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
