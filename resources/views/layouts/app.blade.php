<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Aetheria Gallery - Galeri Lukisan Digital')</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS dari folder public/Bootstrap (Sesuai Ketentuan Soal UTS Poin 5) -->
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom Dark Mode Minimalis Styling -->
    <link rel="stylesheet" href="{{ asset('css/aetheria-dark.css') }}">

    @stack('styles')
</head>
<body>

    <!-- Top Announcement Bar / Student Identity -->
    <div class="py-2 px-3 border-bottom border-dark text-center" style="background-color: #08090C; font-size: 0.8rem; letter-spacing: 0.03em;">
        <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="text-secondary">
                <i class="bi bi-mortarboard-fill text-info me-1"></i>
                <span class="text-light fw-semibold">UTS Rekayasa Web</span> &bull; Universitas Pamulang
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="text-secondary d-none d-sm-inline">Mahasiswa:</span>
                <span class="badge bg-dark border border-secondary text-info px-2 py-1">
                    <i class="bi bi-person-badge me-1"></i> Muhammad Shouqi (251011700713)
                </span>
                <span class="badge bg-dark border border-secondary text-warning px-2 py-1">
                    <i class="bi bi-palette-fill me-1"></i> Tema 3: Galeri Lukisan Digital
                </span>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-aetheria sticky-top py-3">
        <div class="container">
            <a class="navbar-brand navbar-brand-aetheria" href="{{ route('artworks.index') }}">
                <span class="brand-glow-icon">
                    <i class="bi bi-gem"></i>
                </span>
                <span>AETHERIA<span class="cyan-gradient-text">.GALLERY</span></span>
            </a>

            <button class="navbar-toggler border-0 text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list fs-2"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-1">
                    <li class="nav-item">
                        <a class="nav-link nav-link-aetheria {{ request()->routeIs('artworks.index') && !request()->filled('software') ? 'active' : '' }}" href="{{ route('artworks.index') }}">
                            <i class="bi bi-grid-3x3-gap-fill me-1"></i> Eksplorasi Galeri
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-aetheria dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-cpu-fill me-1"></i> Software Tools
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark border-secondary shadow-lg">
                            <li><a class="dropdown-item" href="{{ route('artworks.index', ['software' => 'Blender']) }}"><i class="bi bi-box me-2 text-info"></i>Blender 3D</a></li>
                            <li><a class="dropdown-item" href="{{ route('artworks.index', ['software' => 'Cinema 4D']) }}"><i class="bi bi-camera-reels me-2 text-warning"></i>Cinema 4D & Octane</a></li>
                            <li><a class="dropdown-item" href="{{ route('artworks.index', ['software' => 'Photoshop']) }}"><i class="bi bi-brush me-2 text-primary"></i>Adobe Photoshop</a></li>
                            <li><a class="dropdown-item" href="{{ route('artworks.index', ['software' => 'Unreal Engine']) }}"><i class="bi bi-controller me-2 text-danger"></i>Unreal Engine 5</a></li>
                            <li><a class="dropdown-item" href="{{ route('artworks.index', ['software' => 'Procreate']) }}"><i class="bi bi-pen me-2 text-success"></i>Procreate</a></li>
                            <li><hr class="dropdown-divider border-secondary"></li>
                            <li><a class="dropdown-item" href="{{ route('artworks.index') }}"><i class="bi bi-check2-all me-2"></i>Semua Karya</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-aetheria {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                            <i class="bi bi-info-circle-fill me-1"></i> Informasi UTS
                        </a>
                    </li>
                </ul>

                <!-- Right Action Button -->
                <div class="d-flex align-items-center gap-2">
                    <a href="https://github.com/Shouqiiie/UTS_MuhammadShouqi_251011700713_CS03SIFE002" target="_blank" class="btn btn-dark-slate btn-sm px-3 py-2">
                        <i class="bi bi-github me-1"></i> Repo GitHub
                    </a>
                    <a href="{{ route('artworks.index') }}#gallery-section" class="btn btn-neon btn-sm px-3 py-2">
                        <i class="bi bi-compass me-1"></i> Lihat Koleksi
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-aetheria py-5 mt-5">
        <div class="container">
            <div class="row g-4 justify-content-between align-items-center">
                <div class="col-lg-5">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="brand-glow-icon">
                            <i class="bi bi-gem"></i>
                        </span>
                        <span class="fw-bold fs-5 text-light">AETHERIA GALLERY</span>
                    </div>
                    <p class="text-secondary small mb-3">
                        Platform kurasi karya lukisan digital modern beresolusi ultra-tinggi. Dibangun dengan framework Laravel 11/13, Blade Templating, dan styling Bootstrap 5 Dark Mode Minimalis untuk memenuhi penilaian Ujian Tengah Semester (UTS) Rekayasa Web.
                    </p>
                    <div class="d-flex gap-2">
                        <span class="badge bg-dark border border-secondary text-secondary">
                            <i class="bi bi-database me-1"></i> db_uts_251011700713
                        </span>
                        <span class="badge bg-dark border border-secondary text-secondary">
                            <i class="bi bi-table me-1"></i> digital_art
                        </span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="text-light fw-bold mb-3 text-uppercase small" style="letter-spacing: 0.08em;">Identitas Mahasiswa</h6>
                    <ul class="list-unstyled text-secondary small mb-0 d-flex flex-column gap-2">
                        <li><i class="bi bi-person text-info me-2"></i> Muhammad Shouqi</li>
                        <li><i class="bi bi-card-text text-info me-2"></i> NIM: 251011700713</li>
                        <li><i class="bi bi-building text-info me-2"></i> Kelas: CS03SIFE002</li>
                        <li><i class="bi bi-book text-info me-2"></i> Prodi: Sistem Informasi S-1</li>
                        <li><i class="bi bi-mortarboard text-info me-2"></i> Universitas Pamulang</li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="text-light fw-bold mb-3 text-uppercase small" style="letter-spacing: 0.08em;">Tautan Penting</h6>
                    <ul class="list-unstyled text-secondary small mb-3 d-flex flex-column gap-2">
                        <li>
                            <a href="{{ route('artworks.index') }}" class="text-secondary text-decoration-none hover-cyan">
                                <i class="bi bi-chevron-right text-info me-1"></i> Galeri Lukisan Digital
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="text-secondary text-decoration-none hover-cyan">
                                <i class="bi bi-chevron-right text-info me-1"></i> Dokumentasi & Spesifikasi UTS
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/Shouqiiie/UTS_MuhammadShouqi_251011700713_CS03SIFE002" target="_blank" class="text-secondary text-decoration-none hover-cyan">
                                <i class="bi bi-github text-info me-1"></i> GitHub Repository Proyek
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="my-4 border-secondary opacity-25">

            <div class="d-flex flex-wrap justify-content-between align-items-center text-secondary small">
                <div>
                    &copy; {{ date('Y') }} <strong>Aetheria Gallery</strong> &mdash; Muhammad Shouqi (251011700713). Hak Cipta Dilindungi.
                </div>
                <div>
                    Dibuat untuk evaluasi UTS Rekayasa Web Semester Ganjil 2026/2027
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 Bundle JS dari folder public/Bootstrap (Sesuai Ketentuan Soal UTS Poin 5) -->
    <script src="{{ asset('Bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')
</body>
</html>
