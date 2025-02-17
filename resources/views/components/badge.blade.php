@props(['status'])
@php
    if ($status == 'unpaid') {
        $classes = 'font-bold text-amber-400 capitalize';
    } else {
        $classes = 'font-bold text-green-500 capitalize';
    }
@endphp

<p class="{{ $classes }}">
    {{ $status }}
</p>
