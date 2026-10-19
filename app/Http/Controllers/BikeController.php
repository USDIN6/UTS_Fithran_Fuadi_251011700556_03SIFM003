<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;

class BikeController extends Controller
{
    /**
     * Daftar sepeda + filter jenis, urutan, dan pencarian.
     *
     * Semua filter diambil dari query string (?jenis=..&urut=..&cari=..)
     * lalu diteruskan ke view supaya isian filter tidak hilang setelah
     * halaman dimuat ulang.
     */
    public function daftar(Request $request)
    {
        // Daftar jenis diambil dari database, jadi kalau nanti ada jenis
        // baru di seeder, dropdown otomatis ikut tanpa ubah view.
        $jenisList = Bike::query()->distinct()->orderBy('type')->pluck('type');

        // Validasi: isian di luar daftar yang sah akan dibuang, supaya
        // orang tidak bisa menyelipkan nama kolom SQL lewat URL.
        // Penting: daftar jenis diambil dari DB (bukan ditulis manual),
        // karena isi kolom type huruf besar ("Road Bike"). Kalau ditulis
        // manual dengan huruf kecil, isiannya dibuang diam-diam dan
        // filter tampak tidak jalan.
        $data = $request->validate([
            'jenis' => ['nullable', 'string', 'in:' . $jenisList->implode(',')],
            'urut'  => 'nullable|string|in:termurah,termahal,nama',
            'cari'  => 'nullable|string|max:50',
        ]);

        $query = Bike::query();

        // Filter jenis sepeda
        if (! empty($data['jenis'])) {
            $query->where('type', $data['jenis']);
        }

        // Pencarian nama: cocok di brand ATAU tipe
        if (! empty($data['cari'])) {
            $kata = $data['cari'];
            $query->where(function ($q) use ($kata) {
                $q->where('brand', 'like', '%' . $kata . '%')
                  ->orWhere('type', 'like', '%' . $kata . '%');
            });
        }

        // Urutan
        match ($data['urut'] ?? null) {
            'termurah' => $query->orderBy('rent_price'),
            'termahal' => $query->orderByDesc('rent_price'),
            'nama'     => $query->orderBy('brand'),
            default    => $query->orderBy('id'),
        };

        $bikes = $query->get();

        return view('pages.daftar', compact('bikes', 'jenisList'));
    }

    public function detail(Bike $bike)
    {
        return view('pages.detail', compact('bike'));
    }
}
