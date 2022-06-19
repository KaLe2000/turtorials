<!-- Primary Navigation Menu -->
<div class="flex justify-between items-center py-2">
    <div class="flex justify-between items-center py-2">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
            <a href="{{ route('cabinet') }}">
                <x-application-logo class="block h-16 w-auto fill-current text-gray-600" />
            </a>
            <span class="ml-2">Turtorials</span>
        </div>
    </div>

    <a href="{{ route('cabinet') }}">{{ __('Кабинет') }}</a>
    <div>{{ Auth::user()->name }}</div>

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Выйти') }}
        </a>
    </form>
</div>
