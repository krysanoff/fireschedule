<header class="a-header">
    <div class="a-header__logo">
        <h1 class="a-header__title">
            <a href="{{ url('admin') }}">{{ config('app.name') }}</a>
        </h1>
    </div>
    <div class="a-header__user">
        <button class="a-header__user-button pointer">
            {{ Auth::user()->name }}
        </button>

        <div class="a-header__user-dropdown">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="pointer" type="submit">{{ __('Logout') }}</button>
            </form>
        </div>
    </div>
</header>

