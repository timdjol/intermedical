<div class="sidebar">
    <ul>
        <li @routeactive('admin.dashboard')><a href="{{ route('admin.dashboard')}}">Консоль</a></li>
        <li @routeactive('admin-cat*')><a href="{{ route('admin-categories.index')}}">Категории</a></li>
        <li @routeactive('admin-post*')><a href="{{ route('admin-posts.index')}}">Библиотека</a></li>
        <li @routeactive('admin-user*')><a href="{{ route('admin-users.index')}}">Пользователи</a></li>
        <li @routeactive('prof*')><a href="{{ route('profile.edit') }}">Профиль</a></li>
        <li @routeactive('admin-event*')><a href="{{ route('admin-events.index')}}">История событий</a></li>
    </ul>
</div>
