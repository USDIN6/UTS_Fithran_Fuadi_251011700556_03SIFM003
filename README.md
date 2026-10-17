# UTS Rekayasa Web - Rental Sepeda

Aplikasi frontend Laravel untuk menampilkan daftar sepeda rental dari database. Fase 1 (kerangka, Bootstrap standar).

Fithran Fuadi - 251011700556 - 03SIFM003

## Cara Menjalankan

1. Install dependency:

   ```bash
   composer install
   ```

2. Salin file environment:

   ```bash
   cp .env.example .env
   ```

3. Isi konfigurasi database di `.env` (buat dulu database kosong `db_uts_251011700556` di MySQL):

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_uts_251011700556
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   Sesuaikan `DB_USERNAME` / `DB_PASSWORD` dengan MySQL di mesin masing-masing.

4. Generate key lalu migrasi + seed:

   ```bash
   php artisan key:generate
   php artisan migrate:fresh --seed
   ```

5. Jalankan server:

   ```bash
   php artisan serve
   ```

6. Buka http://127.0.0.1:8000 — halaman utama menampilkan daftar sepeda; klik "Lihat detail" untuk detail per unit.
