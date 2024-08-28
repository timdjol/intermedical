@extends('admin.layouts.master')

@isset($admin_category)
    @section('title', 'Редактировать категорию ' . $admin_category->title)
@else
    @section('title', 'Создать категорию')
@endisset

@section('content')

    <div class="page admin">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('admin.layouts.sidebar')
                </div>
                <div class="col-md-9">
                    @isset($admin_category)
                        <h1>Редактировать категорию {{ $admin_category->title }}</h1>
                    @else
                        <h1>Создать категорию</h1>
                    @endisset
                    <form method="post"
                          @isset($admin_category)
                              action="{{ route('admin-categories.update', $admin_category) }}"
                          @else
                              action="{{ route('admin-categories.store') }}"
                            @endisset
                    >
                        @isset($admin_category)
                            @method('PUT')
                        @endisset
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="">Заголовок</label>
                            <input type="text" name="title" value="{{ old('title', isset($admin_category) ? $admin_category->title :
                             null) }}">
                        </div>
                        @csrf
                        <button class="btn btn-primary">Отправить</button>
                        <a href="{{url()->previous()}}" class="btn btn-danger">Отмена</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
