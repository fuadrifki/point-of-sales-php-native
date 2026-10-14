# Point of Sales — PHP Native (2019)

Aplikasi Point of Sales (POS) kasir berbasis **PHP native (MVC custom) + MySQL + template Gentelella**.

Project ini bukti perjalanan sebelum full-JS: dari PHP native dulu, baru pindah ke Vue/React/Next.js. Kode dibiarkan apa adanya sebagai arsip historis.

## Modul
* Login / Logout (validasi ke tabel `user`)
* Dashboard
* Categories, Products, Customers
* Sales + Sale Items (transaksi penjualan)

## Tech
* PHP native, pola MVC custom (`index.php` → `controller/` → `model/` → `view/`)
* MySQL (`db/pos.sql`)
* Template admin Gentelella (Bootstrap)

## Kredensial demo
* Username: `admin`
* Password: `12345`

## Cara run (PHP modern 7+/8+)

Kode aslinya ditulis untuk PHP 5 (`mysql_*` function yang sudah dihapus di PHP 7+).
File `compat/mysql_shim.php` memetakan `mysql_*` ke `mysqli` tanpa mengubah kode legacy.

```bash
# 1. Siapkan database
mysql -uroot -e "CREATE DATABASE pos CHARACTER SET utf8mb4;"
mysql -uroot pos < db/pos.sql

# 2. Jalankan dari dalam folder ini
php -d auto_prepend_file=$PWD/compat/mysql_shim.php -S 127.0.0.1:8000

# 3. Buka http://127.0.0.1:8000/index.php lalu login admin / 12345
```

> Catatan: `config/database.php` memakai user MySQL `root` tanpa password di `localhost`.
> Sesuaikan bila kredensial MySQL kamu berbeda.

## Disclaimer
Project legacy 2019 — password plaintext & query tanpa prepared statement.
Sengaja tidak di-refactor agar tetap jadi dokumentasi perjalanan.
