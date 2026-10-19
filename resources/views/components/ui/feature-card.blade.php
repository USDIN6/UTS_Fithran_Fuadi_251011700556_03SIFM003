{{-- Card fitur pastel (3 card di beranda: Banyak Pilihan, Tarif, Ketersediaan).
     Pemakaian:
       <x-ui.feature-card tone="mint" icon="bike" title="Banyak Pilihan">
           Mountain bike, road bike, sepeda lipat, sampai city bike.
       </x-ui.feature-card>
     Properti:
       - tone   mint | cream | lavender   (default: mint)
       - icon   nama ikon (lihat x-ui.icon)
       - title  judul card
--}}

@props([
    'tone' => 'mint',
    'icon' => 'info',
    'title' => '',
])

<div {{ $attributes->merge(['class' => 'rs-feature rs-feature--' . $tone . ' h-100']) }}>
    <div class="card-body">
        <span class="rs-feature-icon mb-3">
            <x-ui.icon :name="$icon" />
        </span>
        <h2 class="h5 fw-bold mb-2">{{ $title }}</h2>
        <p class="text-secondary mb-0">{{ $slot }}</p>
    </div>
</div>
