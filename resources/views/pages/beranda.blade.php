@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    {{-- HERO: band berwarna selebar layar, isi tetap di dalam .container --}}
    <section class="rs-band rs-band--hero rs-section">
        <div class="container">
            {{-- g-4 dipakai (bukan g-lg-5) supaya jarak antar kolom tidak
                 lebih besar dari padding container; kalau lebih besar,
                 barisnya menyembul keluar tepi halaman. --}}
            <div class="row align-items-center g-4">

                {{-- KIRI: badge + judul + CTA --}}
                <div class="col-lg-5">
                    <x-ui.pill tone="mint">
                        Jelajahi Kota dengan Sepeda
                    </x-ui.pill>

                    <h1 class="rs-hero-title mt-3 mb-3">
                        Rental Sepeda untuk Petualangan di Setiap <span class="rs-accent">Jalan</span>
                    </h1>

                    <p class="rs-hero-lead fs-5 mb-4">
                        Temukan sepeda terbaik untuk menemani aktivitas harian,
                        olahraga, atau sekadar menjelajahi keindahan kota dan alam.
                    </p>

                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <x-ui.button href="{{ route('bikes.daftar') }}" size="lg" icon="arrow-right">
                            Lihat Sepeda
                        </x-ui.button>
                    </div>
                </div>

                {{-- TENGAH: sepeda di atas blob gradasi --}}
                <div class="col-lg-4">
                    <div class="rs-hero-blob">
                        <picture>
                            <source srcset="{{ asset('assets/images/hero-bike.webp') }}" type="image/webp">
                            <img src="{{ asset('assets/images/hero-bike.png') }}"
                                 alt="Sepeda gunung Giant dengan aksen hijau untuk petualangan"
                                 width="1100" height="733">
                        </picture>
                    </div>
                </div>

                {{-- KANAN: 3 fitur sebagai list (bukan card grid) --}}
                <div class="col-lg-3">
                    <div class="d-flex flex-column gap-4">
                        <div class="d-flex gap-3">
                            <span class="rs-feature-icon flex-shrink-0" style="width:2.6rem;height:2.6rem;font-size:1.05rem;">
                                <x-ui.icon name="check" />
                            </span>
                            <div>
                                <h2 class="fs-6 fw-bold mb-1" style="color:var(--rs-navy);">Reservasi Mudah</h2>
                                <p class="mb-0 small" style="color:var(--rs-muted);">
                                    Pilih sepeda, lihat status, lakukan pemesanan dengan cepat dan praktis.
                                </p>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <span class="rs-feature-icon rs-feature--cream-icon flex-shrink-0" style="width:2.6rem;height:2.6rem;font-size:1.05rem;">
                                <x-ui.icon name="coin" />
                            </span>
                            <div>
                                <h2 class="fs-6 fw-bold mb-1" style="color:var(--rs-navy);">Harga Terjangkau</h2>
                                <p class="mb-0 small" style="color:var(--rs-muted);">
                                    Nikmati tarif sewa yang ramah di kantong dengan kualitas sepeda terbaik.
                                </p>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <span class="rs-feature-icon rs-feature--purple-icon flex-shrink-0" style="width:2.6rem;height:2.6rem;font-size:1.05rem;">
                                <x-ui.icon name="bike" />
                            </span>
                            <div>
                                <h2 class="fs-6 fw-bold mb-1" style="color:var(--rs-navy);">Beragam Jenis</h2>
                                <p class="mb-0 small" style="color:var(--rs-muted);">
                                    Tersedia berbagai tipe sepeda untuk kebutuhan harian, olahraga, atau petualangan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- JENIS SEPEDA POPULER: baris kartu geser (scroll + tombol panah) --}}
    <section class="rs-section">
        <div class="container">
            <div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-4">
                <div>
                    <span class="rs-eyebrow">Katalog</span>
                    <h2 class="rs-section-title mt-2 mb-1">Jenis Sepeda Populer</h2>
                    <p class="mb-0" style="color:var(--rs-muted);">
                        Pilih sesuai kebutuhan dan gaya berkendara kamu.
                    </p>
                </div>

                {{-- Panah geser: onclick scrollBy, tanpa library tambahan --}}
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="rs-arrow" aria-label="Geser ke kiri"
                            onclick="document.getElementById('popRow').scrollBy({left: -260, behavior: 'smooth'})">
                        <span aria-hidden="true" style="transform:scaleX(-1);display:inline-flex;">
                            <x-ui.icon name="chevron-right" />
                        </span>
                    </button>
                    <button type="button" class="rs-arrow" aria-label="Geser ke kanan"
                            onclick="document.getElementById('popRow').scrollBy({left: 260, behavior: 'smooth'})">
                        <x-ui.icon name="chevron-right" />
                    </button>
                </div>
            </div>

            <div class="rs-pop-row d-flex gap-3 overflow-auto pb-2" id="popRow">
                @foreach ($popular as $bike)
                    <a href="{{ route('bikes.detail', $bike) }}" class="text-decoration-none">
                        <div class="rs-pop-card">
                            <div class="rs-pop-card__media">
                                <picture>
                                    <source srcset="{{ asset('assets/images/' . str_replace('.png', '.webp', $bike->image)) }}" type="image/webp">
                                    <img src="{{ asset('assets/images/' . $bike->image) }}"
                                         alt="Sepeda {{ $bike->brand }} {{ $bike->type }}" loading="lazy">
                                </picture>
                            </div>
                            <div class="rs-pop-card__body">
                                <div class="d-flex justify-content-between align-items-center gap-2">
                                    <h3 class="fs-6 fw-bold mb-0" style="color:var(--rs-navy);">
                                        {{ $bike->brand }} {{ $bike->type }}
                                    </h3>
                                    <span class="rs-tag {{ match ($bike->type) {
                                        'Mountain Bike' => 'rs-tag--green',
                                        'Road Bike'     => 'rs-tag--blue',
                                        'City Bike'     => 'rs-tag--purple',
                                        default         => 'rs-tag--orange',
                                    } }}">
                                        {{ $bike->type }}
                                    </span>
                                </div>
                                <p class="rs-price mt-2 mb-0">
                                    Rp {{ number_format($bike->rent_price, 0, ',', '.') }}<span class="rs-price-unit">/hari</span>
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
