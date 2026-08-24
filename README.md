## <h1 align="center">Landing Page Generator</h1>
The Landing Page Generator is a tool designed to simplify the creation of landing pages without requiring in-depth technical knowledge. This project provides various features to help users design functional and appealing landing pages.

## Key Features

- Customizable landing page templates.
- Drag-and-drop editor for easy page creation.
- Dashboard to manage landing page projects.
- Integration with marketing tools like Google Analytics.

## System Requirements

- Docker Desktop / Docker Engine + Docker Compose
- DBeaver (opsional, untuk mengelola database — tidak menggunakan phpMyAdmin)

> Project ini pakai Laravel 8, yang tidak kompatibel dengan PHP 8.2+. Lewat Docker, container-nya sudah dikunci ke PHP 7.4 sehingga tidak perlu install PHP versi lama secara manual di komputer kamu.

## Installation (Docker)

### 1. Clone repository
```bash
git clone https://github.com/adfity/landify.git
cd landify
```

### 2. Siapkan file `.env`
Copy `.env.example` menjadi `.env`, lalu sesuaikan bagian database:

```dotenv
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=landing_db
DB_USERNAME=landing_user
DB_PASSWORD=ganti

# Khusus dipakai docker-compose.yml, BUKAN dibaca Laravel
DB_ROOT_PASSWORD=ganti
DB_EXTERNAL_PORT=3309
APP_PORT=8000
```

**Soal port:**
- `DB_PORT=3306` → port MySQL **di dalam Docker network** (antar container `app` ↔ `db`). Biarkan `3306`, ini tidak pernah bentrok dengan MySQL lain di komputer kamu karena terisolasi di network Docker sendiri.
- `DB_EXTERNAL_PORT` → port yang dibuka ke komputer kamu (dipakai DBeaver). **Ganti kalau `3306` di komputer kamu sudah dipakai** project/aplikasi lain (contoh di atas pakai `3309`).
- `APP_PORT` → port web di browser (default `8000`), ganti kalau sudah dipakai project lain.

### 3. Build dan jalankan container
```bash
docker compose up -d --build
```

Proses pertama kali agak lama karena build image PHP + `composer install` otomatis dijalankan. Pantau progressnya:
```bash
docker compose logs -f app
```
Tunggu sampai muncul log `Database siap.` dan tidak ada error lagi.

### 4. Akses aplikasi
Buka **http://localhost:8000** (atau sesuai `APP_PORT` yang di-set).

## Koneksi Database via DBeaver

Tidak perlu phpMyAdmin — port MySQL langsung di-expose ke host. Buat koneksi baru di DBeaver dengan driver **MySQL**:

| Field    | Value                                             |
|----------|----------------------------------------------------|
| Host     | `localhost`                                         |
| Port     | isi sesuai `DB_EXTERNAL_PORT` (contoh: `3309`)      |
| Database | isi sesuai `DB_DATABASE` (contoh: `landing_db`)     |
| Username | isi sesuai `DB_USERNAME` (contoh: `landing_user`)   |
| Password | isi sesuai `DB_PASSWORD` (contoh: `sensor`)         |

Butuh akses admin penuh (misal untuk `GRANT`)? Pakai username `root` dan password sesuai `DB_ROOT_PASSWORD`.

## Perintah Harian yang Sering Dipakai

```bash
# Masuk ke container app (artisan/composer manual)
docker compose exec app bash

# Jalankan migrasi & seeder
docker compose exec app php artisan migrate:fresh --seed
docker compose exec app php artisan db:seed --class=UserSeeder

# Tinker
docker compose exec app php artisan tinker

# Install package baru
docker compose exec app composer require nama/paket

# Compile asset CSS/JS (sekali jalan, bukan container permanen)
docker compose --profile tools run --rm node

# Lihat log
docker compose logs -f app
docker compose logs -f webserver
docker compose logs -f db

# Matikan semua container
docker compose down

# Matikan + hapus data database (mulai dari nol lagi)
docker compose down -v
```

## Ganti Kredensial Database di Kemudian Hari

MySQL cuma membuat user/password/database **saat volume-nya pertama kali dibuat**. Kalau kamu ubah `DB_DATABASE` / `DB_USERNAME` / `DB_PASSWORD` / `DB_ROOT_PASSWORD` di `.env` setelah container pernah jalan, reset volume-nya dulu:

```bash
docker compose down -v
docker compose up -d --build
```

`-v` menghapus volume database — pastikan sudah backup data penting sebelum menjalankan ini.

## Troubleshooting

| Gejala | Kemungkinan sebab |
|---|---|
| `docker compose up` gagal, port sudah dipakai | Ganti `APP_PORT` atau `DB_EXTERNAL_PORT` di `.env` |
| Laravel gagal konek DB / "could not find driver" | Cek `DB_HOST=db` (bukan `127.0.0.1`) di `.env` |
| DBeaver gagal konek | Pastikan pakai port `DB_EXTERNAL_PORT` (contoh `3309`), bukan `3306` |
| Halaman putih / 500 error | Cek `docker compose logs -f app`, biasanya soal permission `storage/` atau `APP_KEY` kosong |
| Sudah ubah `.env` tapi database tidak berubah | `docker compose down -v` lalu `up -d --build` lagi |
| Perubahan file Blade/PHP tidak muncul di browser | Coba `docker compose exec app php artisan view:clear`, lalu hard refresh browser |

## Usage

- Sign up or log in to the application.
- Choose a landing page template that fits your needs.
- Use the drag-and-drop editor to customize the page.
- Save and manage your projects through the dashboard.

## Contributing
We welcome contributions! Please fork the repository, create a new branch, and submit a pull request.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
