@extends('layouts.app')

@section('title', 'Daftar Sepeda')

@section('content')
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-end gap-2 mb-4" id="armada">
        <div>
            <h1 class="h3 mb-1">Daftar Sepeda</h1>
            <p class="text-muted mb-0">Pilih sepeda yang mau kamu sewa.</p>
        </div>
        <div class="text-sm-end">
            <span class="badge text-bg-dark">{{ $bikes->count() }} unit</span>
            <span class="badge text-bg-success">{{ $bikes->where('available', true)->count() }} ready</span>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
        @foreach ($bikes as $bike)
            @include('bikes._card', ['bike' => $bike])
        @endforeach
    </div>
@endsection
