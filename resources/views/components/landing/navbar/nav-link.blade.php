<a {{ $attributes }} class="{{ request()->routeIs($route) ? 'active' : '' }}">
    {{ $slot }}
</a>