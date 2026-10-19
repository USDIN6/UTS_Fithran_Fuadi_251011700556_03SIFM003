{{-- Pill kecil (badge lembut, latar pastel). Untuk badge di hero.
     Pemakaian:
       <x-ui.pill tone="mint">Rental Sepeda</x-ui.pill>
     Properti:
       - tone mint | cream | lavender | navy   (default: mint)
--}}

@props([
    'tone' => 'mint',
])

@php
    $class = 'rs-pill rs-pill--' . $tone;
@endphp

<span {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</span>
