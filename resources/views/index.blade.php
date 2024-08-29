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
                        <div>
                            <x-input-label for="email" :value="__('Email')"/>
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                          :value="old('email')" required autofocus autocomplete="username"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <label for="">Пароль</label>

                            <x-text-input id="password" class="block mt-1 w-full"
                                          type="password"
                                          name="password"
                                          required autocomplete="current-password"/>

                            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
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