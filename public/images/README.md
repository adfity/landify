# DistroID — Toko Baju Online

Aplikasi toko online sederhana berbasis PHP native + MySQLi + Bootstrap, lengkap dengan
sisi pelanggan (login/register, katalog, keranjang, checkout) dan panel admin (kelola
produk, pesanan, pengguna, testimoni).

## Struktur Folder

```
DistroID/
├── index.php              Halaman utama
├── produk.php              Daftar produk
├── detail.php               Halaman keranjang belanja
├── detailproduk.php         Detail satu produk
├── checkout.php / proses_checkout.php   Alur checkout (wajib login)
├── selesai.php              Konfirmasi pesanan
├── testimoni.php / proses_testimoni.php Testimoni pelanggan
├── login.php / register.php / logout.php   Autentikasi pelanggan
├── cart.php                 Handler tambah/kurang/hapus item keranjang
│
├── admin/                   Panel admin (wajib login admin)
│   ├── index.php            Login admin
│   ├── logout.php
│   ├── dashboard.php         Ringkasan statistik
│   ├── produk.php / produk_tambah.php / produk_edit.php / produk_hapus.php
│   ├── pesanan.php / pesanan_hapus.php   Kelola pesanan & status
│   ├── pengguna.php          Lihat pengguna terdaftar
│   ├── testimoni.php         Kelola testimoni
│   └── includes/             Header, footer, & auth-check khusus admin
│
├── includes/                 Kode bersama sisi pelanggan
│   ├── koneksi.php           Koneksi database (pakai env var)
│   ├── functions.php         Helper (session, escape, format rupiah, dll)
│   ├── header.php / footer.php
│
├── assets/
│   ├── site/                 CSS/JS/gambar untuk halaman pelanggan (Bootstrap 2)
│   └── admin/                CSS/JS untuk panel admin (Bootstrap 3)
│
├── sql/schema.sql            Skema database + data contoh
├── Dockerfile / docker-compose.yml
├── .env.example               Contoh konfigurasi (aman di-commit)
├── .env                        Konfigurasi asli Anda (JANGAN di-commit, lihat .gitignore)
```

## Fitur

**Pelanggan**
- Register & login akun (password di-hash dengan `password_hash`, bukan plain-text)
- Lihat katalog produk & detail produk
- Keranjang belanja (session-based)
- Checkout (wajib login) → tersimpan sebagai pesanan di database
- Kirim testimoni

**Admin**
- Login terpisah dari akun pelanggan
- Dashboard ringkasan (jumlah produk, pengguna, pesanan, omzet)
- CRUD produk lengkap dengan upload gambar
- Kelola pesanan & ubah status (menunggu pembayaran → dibayar → dikirim → selesai)
- Lihat daftar pengguna terdaftar
- Kelola (hapus) testimoni

## Menjalankan dengan Docker

1. Salin file konfigurasi lalu sesuaikan isinya:
   ```bash
   cp .env.example .env
   ```
   Isi `MYSQL_ROOT_PASSWORD`, `MYSQL_PASSWORD`, dan `DB_PASS` dengan password Anda sendiri.
   File `.env` sudah masuk daftar `.gitignore`, jadi aman tidak ikut ter-commit ke git.

2. Jalankan container:
   ```bash
   docker compose up -d --build
   ```

- Situs pelanggan: http://localhost:8081
- Panel admin: http://localhost:8081/admin
- Database MySQL bisa diakses di `localhost:3308` (lihat kredensial di `.env`)

Skema database otomatis di-import dari `sql/schema.sql` saat container database
pertama kali dibuat.

### Login Admin Default

```
Username: admin
Password: admin123
```

**Segera ganti password ini** setelah login pertama kali (lewat query manual ke tabel
`admin`, karena belum ada halaman ganti password admin).

## Tema Tampilan

Situs pelanggan & panel admin memakai tema **Neo-Brutalism** — border tebal hitam,
hard-shadow offset (tanpa blur), tanpa rounded corner, dan warna flat kontras tinggi.
Diterapkan lewat dua stylesheet override yang di-load setelah CSS bawaan:

- `assets/site/css/neo-brutalism.css` (situs pelanggan)
- `assets/admin/css/neo-brutalism.css` (panel admin)

Palet warna & ukuran shadow bisa diubah lewat CSS variables (`--nb-yellow`, `--nb-pink`,
`--nb-blue`, `--nb-shadow`, dll) di bagian atas masing-masing file.

## Catatan Keamanan

- File `.env` (kredensial database) sudah masuk `.gitignore` — jangan hapus baris itu,
  dan jangan pernah commit `.env` yang berisi password asli. Gunakan `.env.example`
  sebagai referensi untuk kolaborator.
- Semua password (admin & pelanggan) disimpan sebagai hash (`password_hash` /
  `password_verify`), bukan plain-text.
- Semua query yang menerima input pengguna memakai prepared statement (`mysqli_prepare`).
- Semua output ke HTML di-escape dengan `htmlspecialchars` (lewat helper `h()`).
- Upload gambar produk divalidasi ekstensinya (jpg/jpeg/png/webp) dan diberi nama acak.

## Lisensi

Lihat `LICENSE` / `license.txt`.
