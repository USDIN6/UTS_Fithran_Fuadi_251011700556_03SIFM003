{{-- Pill statistik solid (gelap/hijau) untuk ringkasan unit.
     Pemakaian:
       <x-ui.stat-pill variant="navy" icon="bike">6 unit</x-ui.stat-pill>
       <x-ui.stat-pill variant="green" icon="check">5 ready</x-ui.stat-pill>
     Properti:
       - variant navy | green   (default: navy)
       - icon    nama ikon (lihat x-ui.icon), opsional
--}}

@props([
    'variant' => 'navy',
    'icon' => '',
])

@php
    $class = 'rs-stat rs-stat--' . $variant;
@endphp

<span {{ $attributes->merge(['class' => $class]) }}>
    @if ($icon)
        <x-ui.icon :name="$icon" />
    @endif
    {{ $slot }}
</span>
