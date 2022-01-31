<nav class="navbar">
    <div class="navbar--title">
        <a href="{{ route('home') }}" class="navbar--link">
            Продукты
        </a>
    </div>
    <div class="navbar--links">
        @guest
            <a href="{{ route('login') }}">Войти</a>
            <a href="{{ route('register') }}">Регистрация</a>
        @else
            <a href="{{ route('basket.index') }}">Корзина</a>
            <a href="{{ route('logout') }}">Выход</a>
        @endif
    </div>
</nav>