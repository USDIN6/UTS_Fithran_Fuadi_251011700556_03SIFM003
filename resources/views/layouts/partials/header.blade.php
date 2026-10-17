@php
    // Menu navigasi utama. Dipakai bersama oleh item navbar.
    // Active state dicek dengan request()->routeIs() per item.
    $menu = [
        ['label' => 'Beranda', 'url' => route('bikes.index'), 'route' => 'bikes.index'],
        ['label' => 'Armada',  'url' => route('bikes.index') . '#armada', 'route' => 'bikes.show'],
    ];
@endphp

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark" aria-label="Navigasi utama">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="{{ route('bikes.index') }}">
            Rental Sepeda
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Buka menu navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto">
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
        </div>
    </div>
</nav>
