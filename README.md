# Aetheria Gallery &mdash; UTS Rekayasa Web

> **Aplikasi Web Frontend Galeri Lukisan Digital** yang dikembangkan menggunakan framework Laravel, Blade Templating, dan Bootstrap 5 dengan konsep desain **Dark Mode Minimalis**.  
> Proyek ini disusun untuk memenuhi evaluasi **Ujian Tengah Semester (UTS) Mata Kuliah Rekayasa Web**, Program Studi Sistem Informasi S-1, Fakultas Ilmu Komputer, Universitas Pamulang.

---

## 📌 Identitas Mahasiswa

| Informasi | Keterangan |
| :--- | :--- |
| **Nama Lengkap** | **Muhammad Shouqi** |
| **NIM** | **251011700713** |
| **1 Digit NIM Terakhir** | **3** (Tema: **Galeri Lukisan Digital**) |
| **Kelas** | **CS03SIFE002** |
| **Program Studi** | Sistem Informasi S-1 |
| **Fakultas** | Ilmu Komputer |
| **Perguruan Tinggi** | Universitas Pamulang (UNPAM) |
| **Mata Kuliah** | Rekayasa Web (Semester Ganjil 2026/2027) |
| **Dosen Pengampu** | Afif Efendi |
| **Tautan Repositori** | [GitHub Repository](https://github.com/Shouqiiie/UTS_MuhammadShouqi_251011700713_CS03SIFE002) |

---

## 🎨 Konsep Desain & Tema (Dark Mode Minimalis)

Sesuai arahan, aplikasi menerapkan palet warna gelap minimalis yang membuat warna neon karya lukisan digital tampak menyala (*pop-out*) secara tajam:
- **Background Utama**: Deep Charcoal (`#0D0F12`) / Almost Black (`#050505`)
- **Card / Kontainer**: Dark Slate (`#16191E`) dengan *border glassmorphism* halus (`#262B34`)
- **Teks Utama**: Off-White / Soft Gray (`#E2E8F0`)
- **Warna Aksen**: Electric Neon Cyan (`#00f2fe`), Sky Blue (`#38bdf8`), dan Neon Purple (`#a855f7`)

---

## 🗄️ Skema Basis Data

- **Nama Database**: `db_uts_251011700713`
- **Nama Tabel**: `digital_art`

### Struktur Kolom Tabel `digital_art`

| No | Kolom | Tipe Data | Keterangan |
| :-: | :--- | :--- | :--- |
| 1 | `id` | `BIGINT UNSIGNED` | Primary Key, Auto Increment |
| 2 | `title` | `VARCHAR(255)` | Judul karya seni lukisan digital |
| 3 | `artist` | `VARCHAR(255)` | Nama seniman / kreator |
| 4 | `resolution` | `VARCHAR(255)` | Resolusi kanvas (misal: 4K UHD, 8K Ultra HD) |
| 5 | `price` | `DECIMAL(12, 2)` | Harga karya seni (IDR) |
| 6 | `image` | `VARCHAR(255)` | Berkas gambar di `public/assets/images/` |
| 7 | `software_used` | `VARCHAR(255)` | Perangkat lunak utama yang digunakan |
| 8 | `description` | `TEXT` *(nullable)* | Deskripsi naratif dan filosofi karya |
| 9 | `created_at` | `TIMESTAMP` | Waktu pembuatan data |
| 10 | `updated_at` | `TIMESTAMP` | Waktu pembaruan data |

---

## 🌟 Fitur Utama Aplikasi

1. **Struktur Modular Blade Template (`@extends`, `@section`, `@yield`)**:
   - Layout utama berada di `resources/views/layouts/app.blade.php`.
   - Mengatur navbar, header identitas, footer terstandarisasi, dan slot konten agar kode efisien dan DRY (*Don't Repeat Yourself*).
2. **Bootstrap 5 Terintegrasi Lokal**:
   - Sesuai ketentuan butir 5, file Bootstrap disimpan dan dimuat langsung dari `public/Bootstrap/css/bootstrap.min.css` dan `public/Bootstrap/js/bootstrap.bundle.min.js`.
3. **Penyimpanan Aset Gambar Produk**:
   - Seluruh gambar karya tersimpan di direktori `public/assets/images/` (`1.jpg` sampai `10.jpg`).
4. **Katalog Galeri Responsif**:
   - Grid sistem Bootstrap (`row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4`).
   - Efek hover zoom interaktif dan badge resolusi serta software.
   - Fitur pencarian instan berdasarkan judul, seniman, atau software.
   - Filter cepat berdasarkan software (*Blender 3D, Cinema 4D, Photoshop, Unreal Engine 5, Procreate, dsb.*).
   - Pengurutan data (*Sorting*) berdasarkan harga dan abjad.
5. **Modal Pratinjau Cepat (Quick Preview Modal)**:
   - Pengguna dapat melihat gambar resolusi tinggi tanpa harus berpindah halaman.
6. **Halaman Rincian Produk (Detail Page)**:
   - Navigasi breadcrumb dan tombol kembali ke galeri.
   - Penampil karya resolusi tinggi dengan dukungan mode layar penuh (*fullscreen*).
   - Kartu profil seniman terverifikasi.
   - Tabel spesifikasi teknis Bootstrap yang komprehensif.
   - Modal interaktif pengajuan koleksi / lisensi karya.
   - Rekomendasi 3 karya seni digital terkait.
7. **Halaman Dokumentasi UTS (`/about`)**:
   - Memuat profil akademik mahasiswa, rincian tema, struktur tabel basis data, dan checklist pemenuhan seluruh butir soal UTS.

---

## 📋 Daftar Data 10 Karya (Seeder)

| ID | Judul Karya | Seniman | Resolusi | Harga | Software | Berkas |
| :-: | :--- | :--- | :--- | :--- | :--- | :--- |
| 1 | Chronicles of Neo-Tokyo | Kaito Tanaka | 3840 x 2160 (4K UHD) | Rp 1.750.000 | Blender 3D & Photoshop | `1.jpg` |
| 2 | Celestial Symphony | Elena Rostova | 5120 x 2880 (5K Retina) | Rp 2.400.000 | Cinema 4D & Octane | `2.jpg` |
| 3 | Vanguard of the Abyss | Marcus Vance | 4096 x 2160 (Cinema 4K) | Rp 1.950.000 | Unreal Engine 5 & Photoshop | `3.jpg` |
| 4 | Whispers of the Sacred Grove | Aoi Mizuki | 6000 x 4000 (24MP High-Res) | Rp 2.100.000 | Procreate & Corel Painter | `4.jpg` |
| 5 | Quantum Horizon | David Sterling | 7680 x 4320 (8K Ultra HD) | Rp 3.200.000 | Houdini & After Effects | `5.jpg` |
| 6 | Echoes of Cybernetic Solitude | Zack Snyder-Lee | 4500 x 3000 (300 DPI) | Rp 1.650.000 | Clip Studio Paint & Lightroom | `6.jpg` |
| 7 | The Alchemist's Monolith | Soren Lindqvist | 3840 x 2400 (WQUXGA) | Rp 2.800.000 | ZBrush, Maya & Substance | `7.jpg` |
| 8 | Floral Reverie in Neon | Clara Beauchamp | 4000 x 5000 (Fine Art Print) | Rp 1.850.000 | Illustrator & Photoshop | `8.jpg` |
| 9 | Ascension of the Void Sovereign | Nyx Valerius | 5000 x 5000 (Square Master) | Rp 3.500.000 | Midjourney v6, Photoshop & Krita | `9.jpg` |
| 10 | Metropolis Overdrive 2099 | Kenji Takahashi | 7680 x 2160 (Dual 4K) | Rp 2.950.000 | Blender 3D & DaVinci Resolve | `10.jpg` |

---

## 🚀 Panduan Menjalankan Proyek Secara Lokal

### Prasyarat
- PHP >= 8.2 (Disarankan PHP 8.3)
- Composer
- MySQL / MariaDB (melalui Laragon / XAMPP)

### Langkah Instalasi

1. **Clone Repositori:**
   ```bash
   git clone https://github.com/Shouqiiie/UTS_MuhammadShouqi_251011700713_CS03SIFE002.git
   cd UTS_MuhammadShouqi_251011700713_CS03SIFE002
   ```

2. **Install Dependensi Composer:**
   ```bash
   composer install
   ```

3. **Konfigurasi Berkas `.env`:**
   Salin `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```
   Pastikan pengaturan basis data pada `.env` sudah sesuai:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_uts_251011700713
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

5. **Buat Database di MySQL:**
   Buka MySQL client / phpMyAdmin / terminal:
   ```sql
   CREATE DATABASE db_uts_251011700713 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

6. **Jalankan Migrasi dan Seeder:**
   ```bash
   php artisan migrate --seed
   ```

7. **Jalankan Development Server:**
   ```bash
   php artisan serve
   ```
   Buka browser dan akses: `http://localhost:8000`

---

## 🧪 Pengujian Unit & Fitur (Testing)

Proyek ini telah dilengkapi automated feature tests yang memvalidasi seluruh rute, view rendering, dan query basis data:
```bash
php artisan test
```
Hasil: **6 Tests Passed, 19 Assertions Passed (100% Green)**.

---

## 📁 Struktur Berkas Utama

```
├── app/
│   ├── Http/Controllers/
│   │   └── DigitalArtController.php      # Controller katalog & detail
│   └── Models/
│       └── DigitalArt.php                 # Model Eloquent digital_art
├── database/
│   ├── migrations/
│   │   └── 2026_10_23_102550_create_digital_art_table.php # Migrasi tabel
│   └── seeders/
│       ├── DatabaseSeeder.php             # Seeder utama
│       └── DigitalArtSeeder.php           # Seeder 10 karya seni
├── public/
│   ├── assets/images/                     # Berkas 1.jpg s/d 10.jpg
│   ├── Bootstrap/
│   │   ├── css/bootstrap.min.css          # Aset lokal CSS Bootstrap 5
│   │   └── js/bootstrap.bundle.min.js     # Aset lokal JS Bootstrap 5
│   └── css/
│       └── aetheria-dark.css              # Custom styling Dark Mode Minimalis
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php                  # Layout master Blade
│   ├── artworks/
│   │   ├── index.blade.php                # Halaman daftar produk (galeri)
│   │   └── show.blade.php                 # Halaman detail produk
│   └── about.blade.php                    # Halaman info UTS & profil
├── routes/
│   └── web.php                            # Routing web
└── tests/Feature/
    └── DigitalArtTest.php                 # Automated test suite
```

---

## 📜 Hak Cipta & Lisensi
Proyek ini dibuat oleh **Muhammad Shouqi (NIM: 251011700713)** untuk keperluan akademik penilaian Ujian Tengah Semester (UTS) Rekayasa Web Universitas Pamulang.
Lisensi kode terbuka di bawah [MIT License](LICENSE).
