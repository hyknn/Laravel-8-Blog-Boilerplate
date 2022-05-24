@props(['active'])

@php
$classes = $active ?? false ? 'border-gray-500 text-gray-600 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
