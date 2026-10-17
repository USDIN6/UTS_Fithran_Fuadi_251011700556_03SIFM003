<div class="col">
    <div class="card h-100 shadow-sm">
        <img src="{{ asset('assets/images/' . $bike->image) }}" class="card-img-top" alt="Sepeda {{ $bike->brand }} {{ $bike->type }}">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title mb-1">{{ $bike->brand }}</h5>
            <p class="card-text text-muted mb-2">{{ $bike->type }}</p>
            <ul class="list-unstyled small mb-3">
                <li>Unit {{ str_pad($bike->id, 2, '0', STR_PAD_LEFT) }}</li>
                <li>{{ $bike->gear_count }} gear</li>
            </ul>
            <p class="fw-semibold mb-2">Rp {{ number_format($bike->rent_price, 0, ',', '.') }}/hari</p>
            @if ($bike->available)
                <span class="badge text-bg-success align-self-start">Ready</span>
            @else
                <span class="badge text-bg-secondary align-self-start">Disewa</span>
            @endif
        </div>
        <div class="card-footer bg-white border-top-0">
            <a href="{{ route('bikes.show', $bike) }}" class="btn btn-dark w-100">Lihat detail</a>
        </div>
    </div>
</div>
