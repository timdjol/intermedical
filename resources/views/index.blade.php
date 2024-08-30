@extends('admin/layouts.master')

@section('title', 'Вход в систему')

@section('content')

    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2>Войти в систему</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}">
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="">Пароль</label>
                            <input type="password" name="password" value="{{ old('password') }}" autocomplete="current-password">
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                   href="{{ route('password.request') }}">
                                    Забыли пароль?
                                </a>
                            @endif

                            <button class="btn btn-primary">Войти</button>
                            <a href="{{ route('register') }}" class="btn btn-warning">Регистрация</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn {
            display: block;
            margin-top: 20px;
        }
    </style>
@endsection