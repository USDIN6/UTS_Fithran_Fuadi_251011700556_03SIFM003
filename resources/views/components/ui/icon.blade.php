{{-- Komponen ikon SVG inline (tanpa library, tanpa CDN).
     Pemakaian:
       <x-ui.icon name="bike" />                       -- ikut ukuran teks sekitarnya
       <x-ui.icon name="check" class="fs-5 text-success" />
     Nama tersedia:
       bike | coin | info | check | arrow-right | chevron-right | search
     Ikon ikut warna teks (currentColor) -- kasih class text-* untuk mewarnai.
--}}

@props(['name' => ''])

@php
    $icons = [
        'bike' => '<circle cx="6" cy="16.5" r="3.4"/><circle cx="18" cy="16.5" r="3.4"/><path d="M6 16.5 10.2 8.8h5.2M10.2 8.8 13.6 16.5h4.4M15.4 8.8l-1.4-2.3h-2.2"/>',
        'coin' => '<circle cx="12" cy="12" r="8.2"/><text x="12" y="16" text-anchor="middle" font-size="10" font-weight="bold" fill="currentColor" stroke="none">$</text>',
        'info' => '<circle cx="12" cy="12" r="8.2"/><path d="M12 11v5"/><circle cx="12" cy="7.8" r="1" fill="currentColor" stroke="none"/>',
        'check' => '<path d="M5 12.5 10 17.5 19 7"/>',
        'arrow-right' => '<path d="M4 12h15M13.5 6.5 19 12l-5.5 5.5"/>',
        'chevron-right' => '<path d="m9 5.5 6.5 6.5L9 18.5"/>',
        'search' => '<circle cx="11" cy="11" r="6.5"/><path d="m16 16 4.5 4.5"/>',
    ];

    $body = $icons[$name] ?? '';
@endphp

<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
     fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
     stroke-linejoin="round" aria-hidden="true" {{ $attributes->merge(['class' => 'rs-icon']) }}>
    {!! $body !!}
</svg>
