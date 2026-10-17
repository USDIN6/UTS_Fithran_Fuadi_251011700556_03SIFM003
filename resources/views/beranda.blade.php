@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="text-center py-5">
        <span class="badge text-bg-dark mb-3">Rental Sepeda</span>
        <h1 class="display-5 fw-bold mb-3">Sewa Sepeda, Jalan-jalan Jadi Ringan</h1>
        <p class="lead text-muted mx-auto mb-4" style="max-width: 560px;">
            Tersedia berbagai sepeda gunung, balap, lipat, dan city bike
            siap menemani aktivitas harianmu. Tarif bersahabat, per hari.
        </p>
        <div class="d-flex justify-content-center gap-2">
            <a href="{{ route('bikes.index') }}" class="btn btn-dark btn-lg px-4">
                Lihat Armada
            </a>
        </div>
    </section>

    <section class="py-4">
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h2 class="h5">Banyak Pilihan</h2>
                        <p class="text-muted mb-0">Mountain bike, road bike, sepeda lipat, sampai city bike.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h2 class="h5">Tarif Per Hari</h2>
                        <p class="text-muted mb-0">Harga jelas per hari, tertera langsung di tiap unit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h2 class="h5">Info Ketersediaan</h2>
                        <p class="text-muted mb-0">Status tiap unit terlihat: siap disewa atau sedang disewa.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
