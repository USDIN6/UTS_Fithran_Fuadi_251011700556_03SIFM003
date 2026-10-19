<footer class="bg-dark text-white-50 pt-4 pb-3 mt-auto">
    <div class="container">
        <div class="row g-4">

            {{-- Kolom 1: identitas --}}
            <div class="col-md-5">
                <span class="rs-footer-title d-block mb-2">Rental Sepeda</span>
                <p class="small mb-0" style="max-width: 28rem;">
                    Layanan sewa sepeda harian untuk jalan-jalan, olahraga,
                    dan aktivitas sehari-hari.
                </p>
            </div>

            {{-- Kolom 2: navigasi --}}
            <div class="col-6 col-md-3">
                <span class="rs-footer-title d-block mb-2">Navigasi</span>
                <ul class="list-unstyled small mb-0 d-grid gap-1">
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li><a href="{{ route('bikes.daftar') }}">Armada</a></li>
                </ul>
            </div>

            {{-- Kolom 3: info tugas --}}
            <div class="col-6 col-md-4">
                <span class="rs-footer-title d-block mb-2">Tugas</span>
                <ul class="list-unstyled small mb-0 d-grid gap-1">
                    <li>UTS Rekayasa Web</li>
                    <li>Universitas Pamulang</li>
                    <li>Fithran Fuadi &middot; 251011700556</li>
                </ul>
            </div>
        </div>

        <hr class="border-secondary opacity-25 my-3">

        <p class="small mb-0">&copy; {{ date('Y') }} Rental Sepeda &middot; UTS Rekayasa Web</p>
    </div>
</footer>
