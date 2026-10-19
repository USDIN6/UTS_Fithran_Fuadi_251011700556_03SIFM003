{{-- Komponen card satu sepeda -- bentuk HORIZONTAL COMPACT.
     Foto di kiri, seluruh informasi di kanan (bukan card vertikal).

     Pemakaian di daftar:
       @foreach ($bikes as $bike)
           <x-bike-card :bike="$bike" />
       @endforeach

     Properti:
       - $bike  satu model Bike dari database

     Catatan struktur:
       - flush dipakai karena foto + .card-body ditata sendiri di sini,
         jadi x-ui.card tidak perlu membuat .card-body otomatis.
       - Badge status SELALU ikut data ($bike->available) -- jangan
         pernah hardcode status di sini.
       - Nama sepeda digabung dari brand + type (kolom tabel cuma
         punya brand & type, tidak ada kolom name/description).
--}}

@props(['bike'])

<x-ui.card flush {{ $attributes->merge(['class' => 'rs-bike-card']) }}>
    <div class="rs-bike-card__body">

        {{-- KIRI: foto (status ditampilkan di kanan atas area info,
             sesuai sketsa: nama + badge sejajar) --}}
        <div class="rs-bike-card__media">
            <picture>
                <source srcset="{{ asset('assets/images/' . str_replace('.png', '.webp', $bike->image)) }}" type="image/webp">
                <img src="{{ asset('assets/images/' . $bike->image) }}"
                     alt="Sepeda {{ $bike->brand }} {{ $bike->type }}"
                     class="rs-bike-card__img" loading="lazy">
            </picture>
        </div>

        {{-- KANAN: informasi, flex-column + mt-auto biar tombol sejajar --}}
        <div class="rs-bike-card__info">
            <div class="d-flex justify-content-between align-items-start gap-2">
                <div class="rs-bike-card__headline">
                    <h5 class="rs-bike-card__name mb-0">{{ $bike->brand }} {{ $bike->type }}</h5>
                    <span class="rs-bike-card__type">{{ $bike->type }}</span>
                </div>

                <div class="flex-shrink-0">
                    @if ($bike->available)
                        <x-ui.badge variant="success" icon="check">Ready</x-ui.badge>
                    @else
                        <x-ui.badge>Disewa</x-ui.badge>
                    @endif
                </div>
            </div>

            {{-- Unit & gear sebagai chip horizontal, bukan teks bertumpuk --}}
            <div class="d-flex flex-wrap gap-2 mt-3">
                <span class="rs-chip">
                    <x-ui.icon name="bike" />
                    Unit {{ str_pad($bike->id, 2, '0', STR_PAD_LEFT) }}
                </span>
                <span class="rs-chip">{{ $bike->gear_count }} gear</span>
            </div>

            <p class="rs-price mt-auto mb-2 pt-3">
                Rp {{ number_format($bike->rent_price, 0, ',', '.') }}<span class="rs-price-unit">/hari</span>
            </p>

            <x-ui.button href="{{ route('bikes.detail', $bike) }}" icon="arrow-right"
                         class="w-100 justify-content-center">
                Lihat detail
            </x-ui.button>
        </div>
    </div>
</x-ui.card>
