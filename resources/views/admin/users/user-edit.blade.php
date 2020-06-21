@extends('admin.layouts.app')

@section('title')Редактирование пользователя@endsection

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Редактирование пользователя</h1>

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
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Логин</label>
                    <input type="text" class="form-control" name="name" value={{ $user->name }} />
                </div>

                <div class="form-group">
                    <label for="email">Почта</label>
                    <input type="text" class="form-control" name="email" value={{ $user->email }} />
                </div>

                <div class="form-group">
                    <label for="text">Введите новый пароль, если это необходимо</label>
                    <input type="password" name="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           id="password" placeholder="минимум 8 символов">
                </div>
                <div class="form-group">
                    <label for="role">Роль</label>
                    <select id="role" name="role" class="form-control">
                        @foreach ($roles as $role)
                            <option value={{ $role->id }}
                            @if($role->id == $userrole[0]->role_id)
                                selected
                            @endif
                            >{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection
