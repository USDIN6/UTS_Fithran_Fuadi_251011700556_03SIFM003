{{-- Komponen tombol (Bootstrap murni, tanpa package).
     Pemakaian:
       <x-ui.button>Lihat detail</x-ui.button>
       <x-ui.button href="{{ route('bikes.daftar') }}" variant="outline">Kembali</x-ui.button>
       <x-ui.button size="lg" icon="arrow-right">Lihat Armada</x-ui.button>
     Properti:
       - href    (opsional) kalau diisi, dirender sebagai <a>, bukan <button>
       - variant default (oranye CTA) | primary (biru) | outline | teal   (default: oranye CTA)
       - size    sm | md | lg                      (default: md)
       - icon    nama ikon (lihat x-ui.icon), tampil SETELAH teks, opsional
--}}

@props([
    'href' => null,
    'variant' => 'default',
    'size' => 'md',
    'icon' => '',
])

@php
    $class = match ($variant) {
        'outline' => 'btn btn-outline-dark',
        'primary' => 'btn btn-rs',
        'teal'    => 'btn btn-rs',
        default   => 'btn btn-rs-cta',
    };

    $class .= match ($size) {
        'sm'  => ' btn-sm',
        'lg'  => ' btn-lg',
        default => '',
    };
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $class . ' d-inline-flex align-items-center gap-2']) }}>
        {{ $slot }}@if ($icon)<x-ui.icon :name="$icon" />@endif
    </a>
@else
    <button {{ $attributes->merge(['class' => $class . ' d-inline-flex align-items-center gap-2']) }}>
        {{ $slot }}@if ($icon)<x-ui.icon :name="$icon" />@endif
    </button>
@endif
