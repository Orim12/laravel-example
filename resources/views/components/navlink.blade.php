@props(['active' => false, 'type' => 'a'])

@php
    $classes = ($active
        ? 'bg-gray-900 text-white'
        : 'text-gray-300 hover:bg-gray-700 hover:text-white'
    ) . ' px-3 py-1 rounded transition-colors duration-200 font-medium';
@endphp

@if($type === 'button')
    <button {{ $attributes->merge(['class' => $classes]) }} @if($active) aria-current="page" @endif>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge(['class' => $classes]) }} @if($active) aria-current="page" @endif>
        {{ $slot }}
    </a>
@endif
