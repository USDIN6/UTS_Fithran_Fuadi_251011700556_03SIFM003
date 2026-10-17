@extends('layouts.app')

@section('title', $bike->brand . ' ' . $bike->type)

@section('content')
    <div class="mb-4">
        <a href="{{ route('bikes.index') }}" class="btn btn-outline-dark">
            &larr; Kembali
        </a>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <img src="{{ asset('assets/images/' . $bike->image) }}" class="img-fluid rounded border" alt="Sepeda {{ $bike->brand }} {{ $bike->type }}">
        </div>
        <div class="col-md-6">
            <h1 class="h3 mb-1">{{ $bike->brand }}</h1>
            <p class="text-muted">{{ $bike->type }}</p>

            <p class="fs-4 fw-semibold">Rp {{ number_format($bike->rent_price, 0, ',', '.') }}<span class="fs-6 fw-normal text-muted">/hari</span></p>

            <p>
                @if ($bike->available)
                    <span class="badge text-bg-success">Ready</span>
                @else
                    <span class="badge text-bg-secondary">Disewa</span>
                @endif
            </p>

            <h2 class="h6 text-uppercase text-muted">Spesifikasi</h2>
            <ul class="list-group">
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
        </div>
    </div>
@endsection
