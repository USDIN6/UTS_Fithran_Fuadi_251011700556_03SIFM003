# Catatan Komponen UI — UTS Rental Sepeda

Semua komponen tinggal dipanggil pakai tag di file blade.
Komponen ada di: `resources/views/components/ui/` + `resources/views/components/bike-card.blade.php`
Warna tema bisa diubah di: `public/assets/css/style.css` (bagian `:root` paling atas)

---

## 1. `<x-ui.icon>` — ikon kecil

```blade
<x-ui.icon name="bike" class="text-success" />
```

- Nama yang ada: `bike`, `coin`, `info`, `check`, `arrow-right`, `chevron-right`
- Ukuran ikut font teks di sekitarnya, warna ikut class `text-*`

## 2. `<x-ui.pill>` — badge pastel di hero beranda

```blade
<x-ui.pill tone="mint">Rental Sepeda</x-ui.pill>
```

- Pilihan `tone`: `mint`, `cream`, `lavender`, `navy`

## 3. `<x-ui.stat-pill>` — pill "6 unit" / "5 ready" di halaman armada

```blade
<x-ui.stat-pill variant="navy" icon="bike">6 unit</x-ui.stat-pill>
<x-ui.stat-pill variant="green" icon="check">5 ready</x-ui.stat-pill>
```

## 4. `<x-ui.feature-card>` — 3 card pastel di beranda

```blade
<x-ui.feature-card tone="mint" icon="bike" title="Banyak Pilihan">
    Mountain bike, road bike, sepeda lipat, sampai city bike.
</x-ui.feature-card>
```

- Pilihan `tone`: `mint`, `cream`, `lavender`
- `icon` satu set dengan `x-ui.icon` (bike / coin / info)

## 5. `<x-ui.button>` — tombol navy (hover jadi teal)

```blade
<x-ui.button href="{{ route('bikes.daftar') }}" size="lg" icon="arrow-right">
    Lihat Armada
</x-ui.button>
```

- `variant="outline"` untuk tombol Kembali di halaman detail
- `size`: `sm`, `md`, `lg`
- Tanpa `href` → dirender sebagai `<button>` asli

## 6. `<x-ui.badge>` — status Ready / Disewa (di bike-card, sudah otomatis)

```blade
@if ($bike->available)
    <x-ui.badge variant="success" icon="check">Ready</x-ui.badge>
@else
    <x-ui.badge>Disewa</x-ui.badge>
@endif
```

- Status SELALU ikut data (`$bike->available`) — jangan pernah hardcode

## 7. `<x-ui.card>` — card pembungkus bebas

```blade
<x-ui.card>
    <h5 class="fw-bold">Judul apa saja</h5>
    <p class="text-secondary mb-0">Isi bebas di sini.</p>
</x-ui.card>
```

Secara bawaan isi card otomatis dibungkus `.card-body`. Kalau kamu mau
menata isinya sendiri (misal gambar di atas baru `.card-body`), tambahkan
`flush` supaya tidak dapat `.card-body` dobel:

```blade
<x-ui.card flush>
    <img class="card-img-top" src="..." alt="...">
    <div class="card-body">...</div>
</x-ui.card>
```

`x-bike-card` sudah memakai cara `flush` ini.

> Jangan menulis pasangan tanda komentar Blade di dalam komentar, dan
> jangan menulis tag komponen di dalam komentar. Komentar Blade tidak bisa
> bersarang: penanda penutup yang ikut ditulis membuat komentar berhenti
> lebih awal, dan tag komponen di dalam komentar tetap dikompilasi
> (komponen bisa memanggil dirinya sendiri → server hang 30 detik).

## 8. `<x-bike-card>` — card satu sepeda, tinggal panggil di loop

```blade
@foreach ($bikes as $bike)
    <x-bike-card :bike="$bike" />
@endforeach
```

- `:bike` (dengan titik dua) = kirim variabel PHP
- Tanpa titik dua = teks/string biasa
- Sudah termasuk: gambar + badge status + unit/gear + harga teal + tombol Lihat detail

## 9. Bonus — highlight kata berwarna teal (khas mockup)

```blade
<h1 class="display-5 fw-bold">
    Sewa Sepeda, Jalan-jalan Jadi <span class="rs-text-teal">Ringan</span>
</h1>
```

- `rs-text-teal` adalah class dari `style.css`

---

## Peta pemakaian per halaman

| Halaman | Komponen yang dipakai |
|---|---|
| Beranda (`/`) | `x-ui.pill`, `x-ui.button`, `x-ui.feature-card`, `rs-text-teal` |
| Armada (`/bikes`) | `x-ui.stat-pill`, `x-bike-card` (bentuk horizontal), `x-ui.icon` (search) |
| Detail (`/bikes/{id}`) | `x-ui.button` (outline), `x-ui.badge` |
| Dipakai di mana saja | `x-ui.icon`, `x-ui.card` |

## Filter & pencarian (halaman armada)

Filter di halaman armada **benar-benar jalan** (query ke database), bukan hiasan:

| Kontrol | Parameter URL | Isi |
|---|---|---|
| Dropdown jenis | `?jenis=Road Bike` | diambil dari kolom `type` di DB |
| Dropdown urutan | `?urut=termurah` | `termurah`, `termahal`, `nama` |
| Pencarian | `?cari=wimcycle` | cocok di `brand` ATAU `type` |

Contoh: `/bikes?jenis=Mountain+Bike&urut=termurah&cari=polygon`

Catatan penting kalau nanti kamu mau ubah:
- Nilai `jenis` **sama persis** dengan isi kolom `type` di database
  (huruf besar: `Road Bike`, bukan `road bike`). Kalau beda, aturan
  `validate()` membuang isiannya diam-diam dan filter terlihat
  "tidak jalan" padahal tidak ada error.
- Karena itu controller mengambil daftar jenis dari DB
  (`Bike::distinct()->pluck('type')`), bukan ditulis manual.

## Aturan penting (biar lolos soal)

1. Badge Disewa cuma boleh muncul dari data — yang `available = false` cuma Wimcycle
2. **Filter & pencarian BOLEH dan sudah aktif** — soal tidak melarang; yang dilarang
   adalah tombol palsu yang tidak berfungsi. Pastikan filternya benar-benar
   memfilter data dari database, bukan sekadar tampilan.
3. Menu "Tentang" belum dibuat (mockup menampilkannya, tapi halamannya tidak ada —
   jangan pasang link mati; buat halamannya dulu kalau mau ditampilkan)
4. Semua layout tetap pakai class Bootstrap; `style.css` cuma buat "rasa" (warna, rounded, shadow)
5. Nama sepeda = `brand` + `type` (tabel `bikes` dari soal tidak punya kolom
   `name`/`description`: id, brand, type, rent_price, gear_count, image, available)
