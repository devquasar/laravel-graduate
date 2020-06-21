@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-4 mx-auto">
            <h3>Регистрация</h3>
            <form method="POST" action="{{ route('auth.signup.submit') }}" novalidate>
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           id="email" placeholder="например, user@gmail.com"
                           value="{{ Request::old('email') ?: '' }}">

                    @if ($errors->has('email'))
                        <span class="help-block text-danger">
                            {{ $errors->first('email') }}
                        </span>
                    @endif

                </div>
                <div class="form-group">
                    <label for="name">Логин</label>
                    <input type="text" name="name"
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           id="name" placeholder="ваш логин"
                           value="{{ Request::old('name') ?: '' }}">

                    @if ($errors->has('name'))
                        <span class="help-block text-danger">
                            {{ $errors->first('name') }}
                        </span>
                    @endif

                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" name="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           id="password" placeholder="минимум 6 символов">

                    @if ($errors->has('password'))
                        <span class="help-block text-danger">
                            {{ $errors->first('password') }}
                        </span>
                    @endif

                </div>
                <button type="submit" class="btn btn-primary">Создать аккаунт</button>
            </form>
        </div>
    </div>
@endsection
