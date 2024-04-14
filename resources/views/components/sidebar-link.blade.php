@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block py-2 px-4 no-underline text-base text-white pr-6'
            : 'block py-2 px-4 no-underline text-base text-white pr-6 hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>