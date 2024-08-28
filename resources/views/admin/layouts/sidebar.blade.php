<div class="sidebar">
    <ul>
        <li @routeactive('admin.dashboard')><a href="{{ route('admin.dashboard')}}">Консоль</a></li>
        <li @routeactive('admin-cat*')><a href="{{ route('admin-categories.index')}}">Категории</a></li>
        <li @routeactive('admin-post*')><a href="{{ route('admin-posts.index')}}">Библиотека</a></li>
        <li><a href="">История изменений</a></li>
{{--        <li><a href="{{ route('users.index')}}">Пользователи</a></li>--}}
        <li><a href="#">Контакты</a></li>
        <li><a href="{{ route('profile.edit') }}">Профиль</a></li>

    </ul>
</div>
