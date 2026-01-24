<a {{ $attributes }} class="{{ request()->fullUrlIs(url($href)) ? 'active' : '' }}">
    {{ $slot }}
</a>