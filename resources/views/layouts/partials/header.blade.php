@php
    // Menu navigasi utama. Dipakai bersama oleh item navbar.
    // Active state dicek dengan request()->routeIs() per item.
    $menu = [
        ['label' => 'Beranda', 'url' => route('beranda'),      'route' => 'beranda'],
        ['label' => 'Armada',  'url' => route('bikes.daftar'),  'route' => 'bikes.daftar'],
    ];
@endphp

<nav class="navbar navbar-expand-lg rs-navbar" aria-label="Navigasi utama">
    <div class="container">
        <a class="navbar-brand d-inline-flex align-items-center gap-2" href="{{ route('beranda') }}">
            <span class="rs-navbar__logo">
                <x-ui.icon name="bike" />
            </span>
            Rental Sepeda
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Buka menu navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            {{-- Menu di kiri-tengah (ms-lg-4), aksi di kanan (ms-lg-auto) --}}
            <ul class="navbar-nav ms-lg-4">
                @foreach ($menu as $item)
                    @php $active = request()->routeIs($item['route']); @endphp
                    <li class="nav-item">
                        <a class="nav-link {{ $active ? 'active' : '' }}" href="{{ $item['url'] }}"
                           @if ($active) aria-current="page" @endif>
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="d-flex flex-wrap align-items-center gap-2 ms-lg-auto mt-3 mt-lg-0">
                {{-- Cari: langsung ke halaman armada (fokus ke kolom pencarian) --}}
                <a href="{{ route('bikes.daftar') }}#kolom-cari"
                   class="rs-navbar__icon"
                   aria-label="Cari sepeda">
                    <x-ui.icon name="search" />
                </a>

                {{-- Tombol pill gelap, analog tombol "Log in" di desain --}}
                <a href="{{ route('bikes.daftar') }}" class="btn btn-rs-dark">
                    Lihat Armada
                </a>
            </div>
        </div>
    </div>
</nav>
