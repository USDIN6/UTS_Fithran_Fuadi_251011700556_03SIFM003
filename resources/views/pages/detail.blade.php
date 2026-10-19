@extends('layouts.app')

@section('title', $bike->brand . ' ' . $bike->type)

@section('content')
    <section class="rs-section rs-section--tight">
        <div class="container">
            <div class="mb-4">
                <a href="{{ route('bikes.daftar') }}" class="btn btn-outline-dark">
                    &larr; Kembali ke daftar
                </a>
            </div>

            {{-- g-4 (bukan g-lg-5) supaya baris tidak menyembul keluar
                 padding container. --}}
            <div class="row g-4 align-items-start">
                <div class="col-lg-6">
                    <picture>
                        <source srcset="{{ asset('assets/images/' . str_replace('.png', '.webp', $bike->image)) }}" type="image/webp">
                        <img src="{{ asset('assets/images/' . $bike->image) }}"
                             class="rs-detail-img"
                             alt="Sepeda {{ $bike->brand }} {{ $bike->type }}">
                    </picture>
                </div>

                <div class="col-lg-6">
                    <span class="rs-eyebrow">{{ $bike->type }}</span>
                    <h1 class="rs-section-title mt-2 mb-2">{{ $bike->brand }}</h1>

                    <p class="fs-3 fw-bold rs-price mb-2">
                        Rp {{ number_format($bike->rent_price, 0, ',', '.') }}
                        <span class="fs-6 fw-normal text-muted">/hari</span>
                    </p>

                    <p class="mb-4">
                        @if ($bike->available)
                            <x-ui.badge variant="success" icon="check">Ready</x-ui.badge>
                        @else
                            <x-ui.badge>Disewa</x-ui.badge>
                        @endif
                    </p>

                    <h2 class="h6 text-uppercase text-muted mb-2">Spesifikasi</h2>

                    <ul class="list-group rs-spec mb-4">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Merek</span>
                            <span class="fw-semibold">{{ $bike->brand }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tipe</span>
                            <span class="fw-semibold">{{ $bike->type }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Jumlah gear</span>
                            <span class="fw-semibold">{{ $bike->gear_count }} gear</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Ketersediaan</span>
                            <span class="fw-semibold">{{ $bike->available ? 'Ready' : 'Disewa' }}</span>
                        </li>
                    </ul>

                    <x-ui.button href="{{ route('bikes.daftar') }}" variant="outline" icon="arrow-right">
                        Lihat sepeda lain
                    </x-ui.button>
                </div>
            </div>
        </div>
    </section>
@endsection
