@extends('admin.layouts.app')

@section('title')Публикации@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Публикации</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('work.create')}}" class="btn btn-primary">Новая публикация</a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Автор</td>
                    <td>Название</td>
                    <td>Описание</td>
                    <td>Издательство</td>
                    <td>Дата выпуска</td>
                    <td>Страниц</td>
                    <td colspan = 3>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($works as $work)
                    <tr>
                        <td>{{$work->id}}</td>
                        <td>{{$work->author}}</td>
                        <td>{{$work->name}}</td>
                        <td>{{ mb_strimwidth($work->description, 0, 15, "...") }}</td>
                        <td>{{$work->house}}</td>
                        <td>{{ date('M d Y', strtotime($work->date)) }}</td>
                        <td>{{$work->page}}</td>
                        <td>
                            <a href="{{ route('work.edit',$work->id)}}" class="btn btn-primary">Редактировать</a>
                        </td>
                        <td>
                            <form action="{{ route('work.destroy', $work->id)}}" method="post">
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
