@props(['route', 'href'])

@php
    $baseClasses = 'flex items-center gap-3 px-4 py-3 rounded-lg transition-all';
    $activeClasses = 'bg-white text-primary font-semibold shadow-sm';
    $inactiveClasses = 'hover:bg-white/10 text-white/80 hover:text-white';
    
    $finalClasses = request()->routeIs($route) 
        ? "{$baseClasses} {$activeClasses}" 
        : "{$baseClasses} {$inactiveClasses}";
@endphp

<a 
    {{ $attributes->merge(['class' => $finalClasses]) }}
    href="{{ $href }}"
>
    {{ $slot }}
</a>