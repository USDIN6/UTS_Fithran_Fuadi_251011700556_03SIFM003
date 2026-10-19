@extends('layouts.app')

@section('title', 'Daftar Sepeda')

@section('content')
    <section class="rs-section rs-section--tight" id="armada">
        <div class="container">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-end gap-3 mb-4">
                <div>
                    <span class="rs-eyebrow">Armada kami</span>
                    <h1 class="rs-section-title mt-2 mb-1">Daftar Sepeda</h1>
                    <p class="text-muted mb-0">Pilih sepeda yang mau kamu sewa.</p>
                </div>

                <div class="d-flex flex-wrap gap-2">
                    <x-ui.stat-pill variant="navy" icon="bike">{{ $bikes->count() }} unit</x-ui.stat-pill>
                    <x-ui.stat-pill variant="green" icon="check">
                        {{ $bikes->where('available', true)->count() }} ready
                    </x-ui.stat-pill>
                </div>
            </div>

            {{-- ============ FILTER & PENCARIAN ============
                 Form ini mengirim GET ke halaman yang sama, jadi hasil
                 filter muncul di URL (bisa di-bookmark / dibagikan).
                 Pilihan yang sedang aktif dipertahankan lewat old(). --}}
            <form method="GET" action="{{ route('bikes.daftar') }}" class="rs-filter mb-4">
                <div class="row g-2 align-items-center">

                    {{-- Dropdown jenis. onchange submit: pilih lalu langsung
                         jalan tanpa perlu klik tombol. --}}
                    <div class="col-6 col-md-3">
                        <select name="jenis" class="form-select rs-filter__control"
                                onchange="this.form.submit()"
                                aria-label="Filter jenis sepeda">
                            <option value="">Semua Jenis</option>
                            @foreach ($jenisList as $jenis)
                                <option value="{{ $jenis }}" @selected(request('jenis') === $jenis)>
                                    {{ $jenis }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Dropdown urutan --}}
                    <div class="col-6 col-md-3">
                        <select name="urut" class="form-select rs-filter__control"
                                onchange="this.form.submit()"
                                aria-label="Urutkan daftar">
                            <option value="">Urutkan</option>
                            <option value="termurah" @selected(request('urut') === 'termurah')>Harga termurah</option>
                            <option value="termahal" @selected(request('urut') === 'termahal')>Harga termahal</option>
                            <option value="nama"     @selected(request('urut') === 'nama')>Nama A - Z</option>
                        </select>
                    </div>

                    {{-- Search di kanan (di mobile otomatis turun ke bawah) --}}
                    <div class="col-12 col-md-6 ms-md-auto">
                        <div class="input-group">
                            <span class="input-group-text rs-filter__icon" aria-hidden="true">
                                <x-ui.icon name="search" />
                            </span>
                            <input type="text" name="cari" class="form-control rs-filter__control"
                                   placeholder="Cari nama sepeda..."
                                   value="{{ request('cari') }}"
                                   aria-label="Cari nama sepeda">

                            <button class="btn btn-rs-cta" type="submit">Cari</button>

                            @if (request()->hasAny(['jenis', 'urut', 'cari']))
                                <a href="{{ route('bikes.daftar') }}" class="btn btn-outline-dark">
                                    Reset
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>

            {{-- Info kalau filter sedang aktif --}}
            @if (request()->hasAny(['jenis', 'urut', 'cari']))
                <p class="small text-secondary mb-3">
                    Menampilkan {{ $bikes->count() }} hasil
                    @if (request('cari'))
                        untuk kata kunci <strong>"{{ request('cari') }}"</strong>
                    @endif
                </p>
            @endif

            {{-- Desktop 3 kolom, tablet 2, mobile 1 (row-cols-lg-3). --}}
            @if ($bikes->isEmpty())
                <div class="rs-empty">
                    <x-ui.icon name="search" class="rs-empty__icon" />
                    <h2 class="rs-empty__title">Sepeda tidak ditemukan</h2>
                    <p class="rs-empty__text">
                        Coba kata kunci lain, atau
                        <a href="{{ route('bikes.daftar') }}">lihat semua armada</a>.
                    </p>
                </div>
            @else
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach ($bikes as $bike)
                        <x-bike-card :bike="$bike" />
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
