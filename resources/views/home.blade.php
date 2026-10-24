@extends('layouts.app')

@section('title', 'Aetheria Gallery &mdash; Galeri Lukisan Digital')

@section('content')

<!-- Hero Welcome Banner (Reference Style: Welcome To - Galeri Lukisan DIGITAL) -->
<section class="hero-welcome-stage text-center">
    <div class="container position-relative" style="z-index: 1;">
        <div class="row align-items-center justify-content-between g-4">
            
            <!-- Left Themed Illustration: Creative Studio & Potted Flora -->
            <div class="col-lg-3 d-none d-lg-block">
                <div class="d-flex flex-column gap-3 align-items-center">
                    <div class="hero-deco-card text-center w-100">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-dark border border-secondary text-success small">
                                <i class="bi bi-flower1 me-1"></i> Studio Flora
                            </span>
                            <i class="bi bi-broadcast text-info small"></i>
                        </div>
                        <div class="py-2">
                            <i class="bi bi-tree-fill hero-deco-plant-icon"></i>
                        </div>
                        <div class="text-secondary small mt-1">Creative Space &bull; UNPAM</div>
                    </div>

                    <div class="hero-deco-card w-100">
                        <div class="hero-deco-canvas-preview mb-2">
                            <img src="{{ asset('assets/images/1.jpg') }}" alt="Artwork Canvas">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-light small fw-bold text-truncate" style="max-width: 130px;">Neo-Tokyo 4K</span>
                            <span class="badge bg-info text-dark" style="font-size: 0.65rem;">Digital Art</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Center Content (Exact Match to Lecturer's Reference Composition) -->
            <div class="col-lg-6 col-12 mx-auto">
                <div class="py-2">
                    <!-- Top Logo / Emblem with SI UNPAM -->
                    <div class="hero-unpam-emblem">
                        <div class="hero-unpam-icon-box mb-2">
                            <i class="bi bi-brush"></i>
                        </div>
                        <span class="hero-unpam-label">SI UNPAM</span>
                    </div>

                    <!-- "Welcome To" in stylized serif/cursive script -->
                    <div class="welcome-script">Welcome To</div>

                    <!-- Main Large Title -->
                    <h1 class="hero-main-title">
                        Galeri Lukisan
                        <span class="neon-word">DIGITAL</span>
                    </h1>

                    <!-- Student & Lecturer Center Information Box -->
                    <div class="hero-lecturer-meta my-3">
                        <div class="meta-nim">251011700713</div>
                        <div class="meta-email">mshouqi08@gmail.com</div>
                        <div class="meta-prodi">Prodi Sistem Informasi</div>
                        <div class="meta-dosen">AFIF EFENDI</div>
                    </div>

                    <!-- Search Input Bar (Submits directly to dedicated Gallery Page) -->
                    <form action="{{ route('artworks.index') }}" method="GET" class="mt-4 mx-auto" style="max-width: 520px;">
                        <div class="input-group input-group-lg shadow-lg">
                            <span class="input-group-text bg-dark border-secondary text-secondary ps-3">
                                <i class="bi bi-search text-info"></i>
                            </span>
                            <input type="text" name="search" class="form-control form-control-dark" placeholder="Cari karya lukisan atau software...">
                            <button class="btn btn-neon px-4" type="submit">
                                Cari
                            </button>
                        </div>
                    </form>

                    <!-- Direct Action Buttons to Dedicated Gallery Page -->
                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <a href="{{ route('artworks.index') }}" class="btn btn-neon px-4 py-2 fw-semibold">
                            <i class="bi bi-grid-3x3-gap-fill me-2"></i> Buka Halaman Galeri Lukisan
                        </a>
                        <a href="#about-gallery" class="btn btn-dark-slate px-4 py-2">
                            <i class="bi bi-info-circle me-1"></i> Tentang Kurasi
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Themed Illustration: Digital Canvas & Workstation Tablet -->
            <div class="col-lg-3 d-none d-lg-block">
                <div class="d-flex flex-column gap-3 align-items-center">
                    <div class="hero-deco-card w-100">
                        <div class="hero-deco-canvas-preview mb-2">
                            <img src="{{ asset('assets/images/2.jpg') }}" alt="Celestial Canvas">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-light small fw-bold text-truncate" style="max-width: 130px;">Celestial 5K</span>
                            <span class="badge bg-warning text-dark" style="font-size: 0.65rem;">Octane Render</span>
                        </div>
                    </div>

                    <div class="hero-deco-card text-center w-100">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-dark border border-secondary text-info small">
                                <i class="bi bi-laptop me-1"></i> Workstation
                            </span>
                            <i class="bi bi-palette text-warning small"></i>
                        </div>
                        <div class="py-2">
                            <i class="bi bi-tablet-landscape-fill fs-1 text-info opacity-75"></i>
                        </div>
                        <div class="text-secondary small mt-1">Stylus &amp; Ultra-Res Canvas</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Featured Highlights Section (Preview of Selected Artworks) -->
<section class="py-5">
    <div class="container">
        
        <div class="d-flex flex-wrap justify-content-between align-items-end mb-4">
            <div>
                <span class="hero-tag mb-2">
                    <i class="bi bi-star-fill text-warning me-1"></i> Sorotan Koleksi
                </span>
                <h3 class="fw-bold text-light mb-1">Karya Unggulan Terbaru</h3>
                <p class="text-secondary small mb-0">Sebagian mahakarya lukisan digital yang telah dikurasi oleh para seniman profesional.</p>
            </div>
            <div>
                <a href="{{ route('artworks.index') }}" class="btn btn-neon-outline btn-sm px-3 py-2">
                    Lihat Seluruh Galeri ({{ $totalArtworks }} Karya) <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
            @foreach($featuredArtworks as $art)
                <div class="col">
                    <div class="card card-aetheria h-100 d-flex flex-column">
                        <div class="artwork-img-wrapper">
                            <img src="{{ $art->image_url }}" alt="{{ $art->title }}" loading="lazy">
                            <div class="artwork-overlay-badge">
                                <i class="bi bi-aspect-ratio me-1"></i> {{ $art->resolution }}
                            </div>
                            <div class="artwork-software-badge text-truncate" style="max-width: 80%;">
                                <i class="bi bi-cpu me-1"></i> {{ $art->software_used }}
                            </div>
                        </div>

                        <div class="card-body p-4 d-flex flex-column flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title fw-bold text-light mb-0 text-truncate" style="max-width: 85%;" title="{{ $art->title }}">
                                    {{ $art->title }}
                                </h5>
                                <span class="badge bg-dark border border-secondary text-secondary small">#{{ $art->id }}</span>
                            </div>

                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div class="rounded-circle bg-secondary bg-opacity-25 d-flex align-items-center justify-content-center text-info" style="width: 24px; height: 24px; font-size: 0.75rem;">
                                    <i class="bi bi-brush"></i>
                                </div>
                                <span class="text-secondary small">Artis: <strong class="text-light">{{ $art->artist }}</strong></span>
                            </div>

                            <p class="card-text text-secondary small mb-4 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.5;">
                                {{ $art->description }}
                            </p>

                            <hr class="border-secondary border-opacity-25 mt-auto mb-3">

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="text-muted d-block" style="font-size: 0.75rem; text-transform: uppercase;">Harga</span>
                                    <span class="artwork-price">{{ $art->formatted_price }}</span>
                                </div>
                                <a href="{{ route('artworks.show', $art->id) }}" class="btn btn-neon btn-sm px-3 py-2">
                                    <span>Rincian</span>
                                    <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Banner Call-to-Action to Dedicated Gallery Page -->
        <div class="card card-aetheria p-4 p-md-5 text-center position-relative overflow-hidden" style="background: radial-gradient(circle at 50% 50%, rgba(0, 242, 254, 0.1) 0%, rgba(22, 25, 30, 0.95) 75%);">
            <div class="py-2" style="max-width: 650px; margin: 0 auto;">
                <span class="badge bg-info text-dark fw-bold mb-3 px-3 py-2">
                    <i class="bi bi-grid-3x3-gap-fill me-1"></i> HALAMAN KATALOG LENGKAP
                </span>
                <h2 class="fw-bold text-light mb-3">
                    Ingin Melihat Semua Koleksi Lukisan Digital?
                </h2>
                <p class="text-secondary mb-4">
                    Kunjungi halaman galeri tersendiri untuk menelusuri seluruh koleksi lengkap dengan filter berdasarkan software (Blender, Cinema 4D, Photoshop, Unreal Engine, Procreate) dan pencarian interaktif.
                </p>
                <a href="{{ route('artworks.index') }}" class="btn btn-neon px-5 py-3 fw-bold fs-6">
                    <i class="bi bi-arrow-right-circle-fill me-2"></i> Buka Halaman Galeri Sekarang
                </a>
            </div>
        </div>

    </div>
</section>

<!-- About Gallery Feature Section -->
<section id="about-gallery" class="py-5 border-top border-secondary border-opacity-25" style="background-color: #0b0d10;">
    <div class="container py-3">
        <div class="row g-4 align-items-center justify-content-between">
            <div class="col-lg-5">
                <span class="hero-tag mb-3">
                    <i class="bi bi-shield-check text-info"></i> Keaslian &amp; Kualitas Terjamin
                </span>
                <h3 class="fw-bold text-light mb-3">
                    Standar Kurasi Karya <br><span class="cyan-gradient-text">Aetheria Gallery</span>
                </h3>
                <p class="text-secondary" style="line-height: 1.7;">
                    Setiap lukisan digital yang ditampilkan telah melewati proses kurasi mendalam untuk memastikan kualitas render asli hingga 8K Ultra HD, integritas gamut warna DCI-P3, serta keaslian lisensi karya dari para kreator terkemuka.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="card card-aetheria p-3 h-100">
                            <i class="bi bi-badge-8k fs-2 text-info mb-2"></i>
                            <h6 class="fw-bold text-light mb-1">Ultra-Res Resolution</h6>
                            <p class="text-secondary small mb-0">Rendering resolusi tinggi mulai dari 4K hingga 8K untuk ketajaman tanpa kompromi.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card card-aetheria p-3 h-100">
                            <i class="bi bi-file-earmark-lock fs-2 text-warning mb-2"></i>
                            <h6 class="fw-bold text-light mb-1">Sertifikat Lisensi</h6>
                            <p class="text-secondary small mb-0">Hak guna komersial dan non-komersial resmi yang diterbitkan untuk setiap karya.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card card-aetheria p-3 h-100">
                            <i class="bi bi-cpu fs-2 text-danger mb-2"></i>
                            <h6 class="fw-bold text-light mb-1">Master Software</h6>
                            <p class="text-secondary small mb-0">Diciptakan dengan pipeline profesional: Blender 3D, Cinema 4D, Unreal Engine, &amp; Photoshop.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card card-aetheria p-3 h-100">
                            <i class="bi bi-lightning-charge fs-2 text-success mb-2"></i>
                            <h6 class="fw-bold text-light mb-1">Pengiriman Instan</h6>
                            <p class="text-secondary small mb-0">Akses berkas TIFF 16-bit dan PNG lossless langsung setelah proses verifikasi selesai.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
