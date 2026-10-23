# LAPORAN DOKUMENTASI UJIAN TENGAH SEMESTER (UTS)
## MATA KULIAH: REKAYASA WEB
### SEMESTER GANJIL TAHUN AKADEMIK 2026 / 2027

---

### IDENTITAS MAHASISWA
- **Nama Lengkap** : Muhammad Shouqi
- **NIM** : 251011700713
- **Digit Terakhir NIM** : 3 (Tiga)
- **Tema Terpilih** : **Tema 3 &mdash; Galeri Lukisan Digital**
- **Kelas** : CS03SIFE002
- **Program Studi** : Sistem Informasi S-1
- **Fakultas** : Ilmu Komputer
- **Perguruan Tinggi** : Universitas Pamulang
- **Dosen Pengampu** : Afif Efendi
- **Tautan Repositori GitHub** : [https://github.com/Shouqiiie/UTS_MuhammadShouqi_251011700713_CS03SIFE002](https://github.com/Shouqiiie/UTS_MuhammadShouqi_251011700713_CS03SIFE002)

---

## 1. PENDAHULUAN &amp; ANALISIS KEBUTUHAN

Sesuai dengan lembar soal UTS Rekayasa Web, mahasiswa diminta memilih tema berdasarkan 1 digit terakhir NIM. Dengan NIM **251011700713**, digit terakhir adalah **3**, yang menetapkan tema **Galeri Lukisan Digital**.

Proyek ini mewajibkan pembuatan aplikasi web **FRONTEND** menggunakan framework **Laravel** dengan ketentuan:
1. Menggunakan **Blade Template** dan **Bootstrap** untuk semua halaman.
2. Menggunakan layout Blade Template (`@extends`, `@section`, `@yield`) agar struktur halaman rapi, modular, dan tidak berulang.
3. Menyiapkan **Migration** dan **Seeder** untuk database `db_uts_251011700713` dengan tabel `digital_art`.
4. Menyimpan berkas gambar di folder `public/assets/images/` dan menampilkannya secara dinamis di view.
5. Menempatkan aset Bootstrap yang diunduh secara lokal di folder `public/Bootstrap/`.
6. Membangun halaman daftar produk (katalog lukisan), halaman detail produk dengan spesifikasi lengkap, serta navigasi antar halaman yang intuitif.
7. Menerapkan konsep visual **Dark Mode Minimalis** (Deep Charcoal `#0D0F12`, Dark Slate `#16191E`, Soft Gray `#E2E8F0`, dan aksen neon cyan/violet) untuk memberikan kontras dramatis pada karya lukisan digital.

---

## 2. STRUKTUR BASIS DATA

- **Nama Database** : `db_uts_251011700713`
- **Nama Tabel** : `digital_art`

### Kamus Data Tabel `digital_art`

| Nama Field | Tipe Data | Nullable | Keterangan |
| :--- | :--- | :---: | :--- |
| `id` | BIGINT UNSIGNED | NO | Primary Key, Auto Increment |
| `title` | VARCHAR(255) | NO | Judul karya seni lukisan digital |
| `artist` | VARCHAR(255) | NO | Nama seniman pembuat karya |
| `resolution` | VARCHAR(255) | NO | Resolusi master (misal: 4K UHD, 8K) |
| `price` | DECIMAL(12, 2) | NO | Harga karya dalam format mata uang IDR |
| `image` | VARCHAR(255) | NO | Nama file gambar pada `public/assets/images/` |
| `software_used` | VARCHAR(255) | NO | Perangkat lunak utama (Blender, Photoshop, dll.) |
| `description` | TEXT | YES | Deskripsi artistik, narasi, dan konsep lukisan |
| `created_at` | TIMESTAMP | YES | Waktu penambahan rekaman data |
| `updated_at` | TIMESTAMP | YES | Waktu pembaruan rekaman data |

---

## 3. IMPLEMENTASI FITUR APLIKASI

1. **Katalog Galeri Lukisan Digital (`/` atau `/artworks`)**
   - Menampilkan 10 kartu karya lukisan digital menggunakan sistem grid responsif Bootstrap.
   - Dilengkapi badge resolusi, label software yang digunakan, harga dalam format Rupiah, dan nama seniman.
   - Filter cepat berdasarkan software (*Blender 3D, Cinema 4D, Photoshop, Unreal Engine 5, Procreate, Houdini, Clip Studio Paint, Midjourney*).
   - Pencarian cerdas (*keyword search*) berdasarkan judul lukisan, artist, maupun software.
   - Pengurutan harga (termurah ke tertinggi / tertinggi ke termurah) dan abjad.

2. **Modal Pratinjau Cepat (Quick Preview Modal)**
   - Menggunakan Bootstrap Modal interaktif untuk memeriksa detail lukisan tanpa harus berpindah halaman.

3. **Halaman Rincian Lukisan Digital (`/artworks/{id}`)**
   - Penampil visual karya resolusi tinggi dengan mode layar penuh (*fullscreen*).
   - Kartu profil seniman (*verified creator*).
   - Tabel spesifikasi teknis Bootstrap (Resolusi asli, software, format file master, profil warna, tanggal rilis).
   - Modal formulir pengajuan koleksi (*inquiry modal*) dengan simulasi konfirmasi pemesanan.
   - Rekomendasi 3 lukisan digital pilihan lainnya.
   - Tombol salin tautan (*copy link*) dan navigasi kembali ke katalog galeri.

4. **Halaman Informasi &amp; Spesifikasi UTS (`/about`)**
   - Menyajikan biodata akademik mahasiswa, rincian tema, skema basis data, dan checklist pemenuhan seluruh kriteria penilaian dosen.

---

## 4. PANDUAN RUNNING &amp; INSTALASI

```bash
# 1. Clone repository dari GitHub
git clone https://github.com/Shouqiiie/UTS_MuhammadShouqi_251011700713_CS03SIFE002.git
cd UTS_MuhammadShouqi_251011700713_CS03SIFE002

# 2. Pasang paket dependensi PHP via Composer
composer install

# 3. Salin environment file dan generate key
cp .env.example .env
php artisan key:generate

# 4. Buat database di MySQL
# Masuk ke MySQL: CREATE DATABASE db_uts_251011700713;

# 5. Jalankan migrasi dan seeder data
php artisan migrate --seed

# 6. Jalankan server lokal
php artisan serve
```
Akses melalui peramban web pada alamat: `http://127.0.0.1:8000`

---

## 5. REKAPITULASI PEMENUHAN BUTIR SOAL UTS

| Butir Soal | Deskripsi Ketentuan | Status | Bukti Implementasi |
| :---: | :--- | :---: | :--- |
| **A.1** | Tugas dikerjakan individu | Selesai | Pengerjaan mandiri oleh Muhammad Shouqi (251011700713) |
| **A.2** | Tema sesuai 1 digit NIM terakhir (Digit 3) | Selesai | Tema 3: Galeri Lukisan Digital |
| **A.3** | Migration dan Seeder struktur tabel tema | Selesai | `create_digital_art_table` &amp; `DigitalArtSeeder` |
| **A.3** | Mengisi data dummy menggunakan seeder | Selesai | 10 data lukisan digital lengkap |
| **A.3** | Blade Template dan Bootstrap | Selesai | `resources/views/layouts/app.blade.php`, `index`, `show` |
| **A.3** | Simpan gambar di `public/assets/images/` | Selesai | Berkas `1.jpg` s/d `10.jpg` tersimpan dan dimuat dengan `asset()` |
| **A.4** | Frontend Bootstrap: daftar produk, detail, navigasi | Selesai | Navbar, Card, Grid, Table, Modal, Breadcrumb lengkap |
| **D.2** | Proyek Laravel baru | Selesai | Proyek terstruktur rapi pada direktori utama |
| **D.3** | Nama database `db_uts_nim` | Selesai | `db_uts_251011700713` di MySQL |
| **D.5** | Bootstrap di folder `public/Bootstrap` | Selesai | Dimuat dari `asset('Bootstrap/css/bootstrap.min.css')` |
| **D.10** | Upload ke GitHub repo yang ditentukan | Selesai | `Shouqiiie/UTS_MuhammadShouqi_251011700713_CS03SIFE002` |
