{{-- Card pembungkus umum (Bootstrap murni) - versi tema rounded.

     PEMAKAIAN BIASA (isi otomatis dibungkus .card-body):
       x-ui.card class="border-0" ... isi biasa: h5 judul, p isi ...

     PEMAKAIAN FLUSH (isi ditata sendiri: gambar di atas, lalu
     .card-body sendiri). Ini yang dipakai komponen bike-card:
       x-ui.card flush class="rs-card" ... img.card-img-top + div.card-body ...

     PROPERTI:
       - flush  true = TIDAK dibuatkan .card-body otomatis.
                Default false (isi dibungkus .card-body).

     Class tambahan dari luar (class="...") bakal nyatuju
     dengan class default, bukan menimpa.

     CATATAN PENTING: jangan menulis pasangan tanda komentar Blade
     di dalam komentar ini. Komentar Blade tidak bisa bersarang;
     kalau penanda penutup ikut ditulis, komentar berhenti lebih
     awal dan sisa teksnya ikut tampil di halaman. Tag komponen di
     dalam komentar juga tetap dikompilasi, jadi jangan menulis tag
     x-ui.card di sini (bisa memanggil komponen sendiri berulang).
--}}

@props([
    'flush' => false,
])

<div {{ $attributes->merge(['class' => 'card rs-card h-100 shadow-sm']) }}>
    @if ($flush)
        {{ $slot }}
    @else
        <div class="card-body">
            {{ $slot }}
        </div>
    @endif
</div>
