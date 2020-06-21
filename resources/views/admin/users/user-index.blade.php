@extends('admin.layouts.app')

@section('title')Создание новости@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Пользователи</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Логин</td>
                    <td>Email</td>
                    <td>Дата регистрации</td>
                    <td>Дата обновления</td>
                    <td colspan = 2>Действия</td>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ date('M d Y', strtotime($user->created_at)) }}</td>
                        <td>{{ date('M d Y', strtotime($user->updated_at)) }}</td>
                        <td>
                            <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Редактировать</a>
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection
