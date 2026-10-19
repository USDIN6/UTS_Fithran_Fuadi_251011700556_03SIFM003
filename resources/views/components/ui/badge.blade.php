{{-- Komponen badge status (Bootstrap murni).
     Pemakaian:
       <x-ui.badge variant="success">Ready</x-ui.badge>
       <x-ui.badge variant="secondary">Disewa</x-ui.badge>
     Properti:
       - variant success | secondary   (default: secondary = abu-abu)
       - icon    opsional: 'check' tampil sebelum teks
--}}

@props([
    'variant' => 'secondary',
    'icon' => '',
])

@php
    $class = $variant === 'success'
        ? 'badge text-bg-success'
        : 'badge text-bg-secondary';
@endphp

<span {{ $attributes->merge(['class' => $class . ' d-inline-flex align-items-center gap-1']) }}>
    @if ($icon)<x-ui.icon :name="$icon" />@endif
    {{ $slot }}
</span>
