@extends('layouts.app')

@section('title', 'Tentang Proyek UTS Rekayasa Web &mdash; Muhammad Shouqi (251011700713)')

@section('content')

<section class="py-5">
    <div class="container">
        
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb small">
                <li class="breadcrumb-item"><a href="{{ route('artworks.index') }}" class="text-secondary text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active text-info" aria-current="page">Informasi Tugas UTS</li>
            </ol>
        </nav>

        <!-- Header -->
        <div class="mb-5">
            <div class="hero-tag mb-3">
                <span class="pulse-dot"></span>
                <span>Dokumentasi Ujian Tengah Semester (UTS)</span>
            </div>
            <h1 class="display-5 fw-bold text-light mb-3">
                Informasi &amp; Spesifikasi <span class="cyan-gradient-text">Proyek UTS Rekayasa Web</span>
            </h1>
            <p class="lead text-secondary" style="max-width: 800px;">
                Aplikasi web frontend <strong>Aetheria Gallery</strong> dikembangkan dengan framework Laravel 11/13, Blade Template, MySQL, dan Bootstrap 5 dengan konsep Dark Mode Minimalis sesuai lembar soal UTS Universitas Pamulang.
            </p>
        </div>

        <div class="row g-4 mb-5">
            <!-- Student Identity Card -->
            <div class="col-lg-5">
                <div class="card card-aetheria p-4 h-100">
                    <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom border-secondary border-opacity-25">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-dark fw-bold fs-3" 
                             style="width: 64px; height: 64px; background: linear-gradient(135deg, #00f2fe 0%, #4facfe 100%);">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-light mb-1">Muhammad Shouqi</h5>
                            <span class="badge bg-dark border border-secondary text-info">NIM: 251011700713</span>
                        </div>
                    </div>

                    <h6 class="text-light fw-bold text-uppercase small mb-3" style="letter-spacing: 0.08em;">Biodata Akademik</h6>
                    <div class="table-responsive">
                        <table class="table table-dark table-dark-custom align-middle mb-0">
                            <tbody>
                                <tr>
                                    <td>Mata Kuliah</td>
                                    <td>Rekayasa Web</td>
                                </tr>
                                <tr>
                                    <td>Semester / TA</td>
                                    <td>Ganjil / 2026 - 2027</td>
                                </tr>
                                <tr>
                                    <td>Program Studi</td>
                                    <td>Sistem Informasi S-1</td>
                                </tr>
                                <tr>
                                    <td>Fakultas</td>
                                    <td>Ilmu Komputer</td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>CS03SIFE002</td>
                                </tr>
                                <tr>
                                    <td>Dosen Pengampu</td>
                                    <td>Afif Efendi</td>
                                </tr>
                                <tr>
                                    <td>Universitas</td>
                                    <td>Universitas Pamulang</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Theme & Database Card -->
            <div class="col-lg-7">
                <div class="card card-aetheria p-4 h-100">
                    <h5 class="fw-bold text-light mb-3">
                        <i class="bi bi-database-check text-info me-2"></i> Ketentuan Tema &amp; Struktur Basis Data
                    </h5>
                    <p class="text-secondary small mb-3">
                        Berdasarkan digit terakhir NIM (<strong>25101170071<span class="text-info fw-bold">3</span></strong> &rarr; Digit 3), tema yang diimplementasikan adalah <strong>Galeri Lukisan Digital</strong>.
                    </p>

                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3 bg-dark border border-secondary border-opacity-50">
                                <div class="text-muted small">Digit NIM Terakhir</div>
                                <div class="fw-bold text-light fs-4">3 (Tiga)</div>
                                <div class="text-info small">Galeri Lukisan Digital</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3 bg-dark border border-secondary border-opacity-50">
                                <div class="text-muted small">Nama Database</div>
                                <div class="fw-bold text-light fs-5">db_uts_251011700713</div>
                                <div class="text-info small">MySQL Database</div>
                            </div>
                        </div>
                    </div>

                    <h6 class="text-light fw-bold text-uppercase small mb-2" style="letter-spacing: 0.08em;">
                        Tabel: <code class="text-info">digital_art</code>
                    </h6>
                    <div class="table-responsive">
                        <table class="table table-dark table-dark-custom align-middle small mb-0">
                            <thead>
                                <tr class="text-secondary">
                                    <th>Nama Kolom</th>
                                    <th>Tipe Data</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>id</code></td>
                                    <td>BIGINT UNSIGNED</td>
                                    <td>Primary Key (Auto Increment)</td>
                                </tr>
                                <tr>
                                    <td><code>title</code></td>
                                    <td>VARCHAR(255)</td>
                                    <td>Judul Karya Lukisan Digital</td>
                                </tr>
                                <tr>
                                    <td><code>artist</code></td>
                                    <td>VARCHAR(255)</td>
                                    <td>Nama Seniman / Pembuat</td>
                                </tr>
                                <tr>
                                    <td><code>resolution</code></td>
                                    <td>VARCHAR(255)</td>
                                    <td>Resolusi Kanvas (4K, 8K, dsb.)</td>
                                </tr>
                                <tr>
                                    <td><code>price</code></td>
                                    <td>DECIMAL(12, 2)</td>
                                    <td>Harga Karya dalam IDR</td>
                                </tr>
                                <tr>
                                    <td><code>image</code></td>
                                    <td>VARCHAR(255)</td>
                                    <td>Nama Berkas Gambar di public/assets/images/</td>
                                </tr>
                                <tr>
                                    <td><code>software_used</code></td>
                                    <td>VARCHAR(255)</td>
                                    <td>Software Utama (Blender, Photoshop, dll.)</td>
                                </tr>
                                <tr>
                                    <td><code>description</code></td>
                                    <td>TEXT</td>
                                    <td>Deskripsi Naratif &amp; Konsep Karya</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Requirements Compliance Checklist -->
        <div class="card card-aetheria p-4 p-md-5 mb-5">
            <h4 class="fw-bold text-light mb-4">
                <i class="bi bi-clipboard2-check text-success me-2"></i> Checklist Pemenuhan Ketentuan Soal UTS
            </h4>

            <div class="row g-4">
                <div class="col-md-6">
                    <ul class="list-group list-group-flush bg-transparent">
                        <li class="list-group-item bg-transparent text-secondary border-secondary border-opacity-25 py-3 d-flex align-items-start gap-3">
                            <i class="bi bi-check-circle-fill text-success fs-5 mt-1"></i>
                            <div>
                                <strong class="text-light">Framework Laravel &amp; Blade Template</strong>
                                <p class="small mb-0">Aplikasi menggunakan layout Blade Template (<code>layouts/app.blade.php</code>) dengan <code>@@extends</code>, <code>@@section</code>, dan <code>@@yield</code> agar struktur halaman modular dan tidak berulang.</p>
                            </div>
                        </li>
                        <li class="list-group-item bg-transparent text-secondary border-secondary border-opacity-25 py-3 d-flex align-items-start gap-3">
                            <i class="bi bi-check-circle-fill text-success fs-5 mt-1"></i>
                            <div>
                                <strong class="text-light">Bootstrap 5 pada Folder public/Bootstrap</strong>
                                <p class="small mb-0">Aset Bootstrap telah diunduh dan tersimpan di <code>public/Bootstrap/css</code> dan <code>public/Bootstrap/js</code>, serta ditautkan ke layout utama sesuai instruksi Prosedur Poin 5.</p>
                            </div>
                        </li>
                        <li class="list-group-item bg-transparent text-secondary border-secondary border-opacity-25 py-3 d-flex align-items-start gap-3">
                            <i class="bi bi-check-circle-fill text-success fs-5 mt-1"></i>
                            <div>
                                <strong class="text-light">Migration &amp; Seeder Database</strong>
                                <p class="small mb-0">Migration <code>create_digital_art_table</code> dan Seeder <code>DigitalArtSeeder</code> telah dibuat dan dieksekusi dengan 10 data karya lukisan digital lengkap.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <ul class="list-group list-group-flush bg-transparent">
                        <li class="list-group-item bg-transparent text-secondary border-secondary border-opacity-25 py-3 d-flex align-items-start gap-3">
                            <i class="bi bi-check-circle-fill text-success fs-5 mt-1"></i>
                            <div>
                                <strong class="text-light">Penyimpanan Gambar di public/assets/images/</strong>
                                <p class="small mb-0">Seluruh gambar karya disimpan di folder <code>public/assets/images/</code> dan dipanggil secara dinamis di view Blade menggunakan fungsi <code>asset()</code>.</p>
                            </div>
                        </li>
                        <li class="list-group-item bg-transparent text-secondary border-secondary border-opacity-25 py-3 d-flex align-items-start gap-3">
                            <i class="bi bi-check-circle-fill text-success fs-5 mt-1"></i>
                            <div>
                                <strong class="text-light">Halaman Daftar &amp; Detail Produk</strong>
                                <p class="small mb-0">Menampilkan katalog produk menggunakan Bootstrap card &amp; grid, serta halaman detail dengan spesifikasi teknis lengkap, modal inquiry, dan breadcrumb navigasi.</p>
                            </div>
                        </li>
                        <li class="list-group-item bg-transparent text-secondary border-secondary border-opacity-25 py-3 d-flex align-items-start gap-3">
                            <i class="bi bi-check-circle-fill text-success fs-5 mt-1"></i>
                            <div>
                                <strong class="text-light">Styling Dark Mode Minimalis Sesuai Request</strong>
                                <p class="small mb-0">Menggunakan palet Deep Charcoal (<code>#0D0F12</code>), Card Dark Slate (<code>#16191E</code>), Teks Soft Gray (<code>#E2E8F0</code>), serta aksen Neon Cyan (<code>#00f2fe</code>) untuk kontras artwork yang tajam.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Repository & Deployment Section -->
        <div class="card card-aetheria p-4 text-center">
            <h5 class="fw-bold text-light mb-2">Repositori GitHub Proyek</h5>
            <p class="text-secondary small mb-3">
                Source code proyek ini di-push ke repositori GitHub sesuai format penamaan tugas:
            </p>
            <div class="mb-3">
                <a href="https://github.com/Shouqiiie/UTS_MuhammadShouqi_251011700713_CS03SIFE002" target="_blank" class="btn btn-neon px-4 py-2">
                    <i class="bi bi-github me-2"></i> Shouqiiie/UTS_MuhammadShouqi_251011700713_CS03SIFE002
                </a>
            </div>
            <span class="text-muted small">URL: https://github.com/Shouqiiie/UTS_MuhammadShouqi_251011700713_CS03SIFE002</span>
        </div>

    </div>
</section>

@endsection
