@extends('layouts.app')

@section('title', $artwork->title . ' &mdash; Detail Lukisan Digital | Aetheria Gallery')

@section('content')

<!-- Breadcrumb Navigation Bar -->
<section class="py-3 border-bottom border-secondary border-opacity-25" style="background-color: #0b0d10;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item">
                    <a href="{{ route('artworks.index') }}" class="text-secondary text-decoration-none">
                        <i class="bi bi-house-door me-1"></i> Beranda
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('artworks.index') }}" class="text-secondary text-decoration-none">
                        Galeri Lukisan Digital
                    </a>
                </li>
                <li class="breadcrumb-item active text-info text-truncate" aria-current="page" style="max-width: 300px;">
                    {{ $artwork->title }}
                </li>
            </ol>
        </nav>
    </div>
</section>

<!-- Detail Content Section -->
<section class="py-5">
    <div class="container">

        <!-- Back Button & Page Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <a href="{{ route('artworks.index') }}" class="btn btn-dark-slate btn-sm px-3 py-2">
                <i class="bi bi-arrow-left me-2 text-info"></i> Kembali ke Katalog Galeri
            </a>
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-dark border border-secondary text-secondary px-3 py-2">
                    <i class="bi bi-hash text-info"></i> ID Produk: #ART-{{ str_pad($artwork->id, 4, '0', STR_PAD_LEFT) }}
                </span>
                <button type="button" class="btn btn-dark-slate btn-sm py-2 px-3" onclick="copyArtworkLink()" id="btnShare">
                    <i class="bi bi-share me-1"></i> Salin Tautan
                </button>
            </div>
        </div>

        <div class="row g-5">
            <!-- Left Column: Artwork Image Showcase -->
            <div class="col-lg-7">
                <div class="card card-aetheria p-2 position-relative shadow-lg mb-4">
                    <!-- Main Artwork Display -->
                    <div class="rounded-3 overflow-hidden bg-black position-relative" style="min-height: 420px;">
                        <img id="mainArtworkImg" 
                             src="{{ $artwork->image_url }}" 
                             alt="{{ $artwork->title }}" 
                             class="img-fluid w-100" 
                             style="object-fit: cover; max-height: 620px; cursor: zoom-in;"
                             onclick="openFullscreen(this)">
                        
                        <div class="position-absolute bottom-0 start-0 w-100 p-3 d-flex justify-content-between align-items-center" 
                             style="background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, transparent 100%);">
                            <span class="badge bg-dark border border-secondary text-light px-2 py-1 small">
                                <i class="bi bi-aspect-ratio text-info me-1"></i> {{ $artwork->resolution }}
                            </span>
                            <button type="button" class="btn btn-dark btn-sm border-secondary text-light" onclick="openFullscreen(document.getElementById('mainArtworkImg'))">
                                <i class="bi bi-arrows-fullscreen me-1"></i> Mode Layar Penuh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Artist Card -->
                <div class="card card-aetheria p-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-dark fw-bold fs-4" 
                             style="width: 56px; height: 56px; background: linear-gradient(135deg, #00f2fe 0%, #4facfe 100%);">
                            <i class="bi bi-palette2"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2">
                                <h6 class="fw-bold text-light mb-0">{{ $artwork->artist }}</h6>
                                <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25" style="font-size: 0.7rem;">
                                    <i class="bi bi-patch-check-fill me-1"></i> Verified Creator
                                </span>
                            </div>
                            <span class="text-secondary small">Digital Concept Artist &amp; Matte Painter</span>
                        </div>
                        <a href="{{ route('artworks.index', ['search' => $artwork->artist]) }}" class="btn btn-neon-outline btn-sm">
                            Karya Seniman
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column: Artwork Metadata & Specifications -->
            <div class="col-lg-5">
                <div class="card card-aetheria p-4 p-md-5 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Category / Software Badge -->
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 px-3 py-2">
                                <i class="bi bi-cpu me-1"></i> {{ $artwork->software_used }}
                            </span>
                            <span class="badge bg-dark border border-secondary text-secondary px-3 py-2">
                                <i class="bi bi-shield-check text-success me-1"></i> Master Artwork
                            </span>
                        </div>

                        <!-- Artwork Title -->
                        <h2 class="display-6 fw-bold text-light mb-2">
                            {{ $artwork->title }}
                        </h2>

                        <!-- Creator Subtitle -->
                        <p class="text-secondary mb-4">
                            Karya orisinal oleh <strong class="text-info">{{ $artwork->artist }}</strong>
                        </p>

                        <!-- Price Card -->
                        <div class="p-4 rounded-3 mb-4" style="background: rgba(0, 0, 0, 0.4); border: 1px solid var(--border-color);">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-muted small text-uppercase" style="letter-spacing: 0.05em;">Harga Koleksi / Hak Pakai</div>
                                    <div class="display-6 fw-bold text-info my-1">
                                        {{ $artwork->formatted_price }}
                                    </div>
                                    <div class="text-secondary small">
                                        <i class="bi bi-check-circle-fill text-success me-1"></i> Sudah termasuk lisensi komersial &amp; file TIFF 16-bit
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <h6 class="text-light fw-bold text-uppercase small" style="letter-spacing: 0.08em;">
                                <i class="bi bi-card-text text-info me-1"></i> Deskripsi &amp; Konsep Karya
                            </h6>
                            <p class="text-secondary" style="line-height: 1.7; font-size: 0.95rem;">
                                {{ $artwork->description ?? 'Sebuah karya seni digital bernilai tinggi dengan sentuhan visual modern, kedalaman pencahayaan dramatis, serta detail resolusi tinggi yang siap dipajang di galeri digital maupun dicetak sebagai fine art canvas.' }}
                            </p>
                        </div>

                        <!-- Technical Specification Table (Bootstrap Table) -->
                        <div class="mb-4">
                            <h6 class="text-light fw-bold text-uppercase small mb-3" style="letter-spacing: 0.08em;">
                                <i class="bi bi-sliders text-info me-1"></i> Spesifikasi Teknis
                            </h6>
                            <div class="table-responsive">
                                <table class="table table-dark table-dark-custom align-middle mb-0">
                                    <tbody>
                                        <tr>
                                            <td><i class="bi bi-aspect-ratio me-2 text-info"></i> Resolusi Asli</td>
                                            <td><span class="badge bg-dark border border-secondary text-info px-2 py-1">{{ $artwork->resolution }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="bi bi-cpu me-2 text-info"></i> Software Digunakan</td>
                                            <td>{{ $artwork->software_used }}</td>
                                        </tr>
                                        <tr>
                                            <td><i class="bi bi-file-earmark-image me-2 text-info"></i> Nama File Asset</td>
                                            <td><code>{{ $artwork->image }}</code></td>
                                        </tr>
                                        <tr>
                                            <td><i class="bi bi-palette me-2 text-info"></i> Profil Warna</td>
                                            <td>DCI-P3 / sRGB Wide Gamut (300 DPI)</td>
                                        </tr>
                                        <tr>
                                            <td><i class="bi bi-file-earmark-zip me-2 text-info"></i> Format Termasuk</td>
                                            <td>TIFF Master, PNG Lossless, Ultra-Res JPEG</td>
                                        </tr>
                                        <tr>
                                            <td><i class="bi bi-calendar-event me-2 text-info"></i> Tanggal Rilis</td>
                                            <td>{{ $artwork->created_at ? $artwork->created_at->format('d F Y') : date('d F Y') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Call to Actions -->
                    <div class="pt-3 border-top border-secondary border-opacity-25 d-flex flex-column gap-2">
                        <button type="button" class="btn btn-neon w-100 py-3 fw-bold fs-6" data-bs-toggle="modal" data-bs-target="#inquiryModal">
                            <i class="bi bi-cart-check-fill me-2"></i> Ajukan Koleksi / Hubungi Galeri
                        </button>
                        <a href="{{ $artwork->image_url }}" download="{{ $artwork->image }}" class="btn btn-dark-slate w-100 py-2">
                            <i class="bi bi-download me-2 text-info"></i> Unduh Sampel Gambar (Preview)
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Artworks Section -->
        @if($relatedArtworks->isNotEmpty())
            <div class="mt-5 pt-5 border-top border-secondary border-opacity-25">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <span class="hero-tag mb-2">Eksplorasi Lainnya</span>
                        <h3 class="fw-bold text-light mb-0">Karya Terkait Pilihan</h3>
                    </div>
                    <a href="{{ route('artworks.index') }}" class="btn btn-neon-outline btn-sm">
                        Lihat Seluruh Galeri <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($relatedArtworks as $rel)
                        <div class="col">
                            <div class="card card-aetheria h-100 d-flex flex-column">
                                <div class="artwork-img-wrapper">
                                    <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}" loading="lazy">
                                    <div class="artwork-overlay-badge">{{ $rel->resolution }}</div>
                                    <div class="artwork-software-badge text-truncate" style="max-width: 80%;">
                                        {{ $rel->software_used }}
                                    </div>
                                </div>
                                <div class="card-body p-4 d-flex flex-column flex-grow-1">
                                    <h6 class="fw-bold text-light mb-1 text-truncate">{{ $rel->title }}</h6>
                                    <p class="text-secondary small mb-3">Oleh <span class="text-light">{{ $rel->artist }}</span></p>
                                    <div class="d-flex justify-content-between align-items-center mt-auto pt-2 border-top border-secondary border-opacity-25">
                                        <span class="artwork-price fs-6">{{ $rel->formatted_price }}</span>
                                        <a href="{{ route('artworks.show', $rel->id) }}" class="btn btn-neon btn-sm px-3">
                                            Rincian
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</section>

<!-- Inquiry / Order Modal -->
<div class="modal fade" id="inquiryModal" tabindex="-1" aria-labelledby="inquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-dark">
            <div class="modal-header modal-header-dark">
                <div class="d-flex align-items-center gap-2">
                    <span class="brand-glow-icon" style="width: 28px; height: 28px; font-size: 0.85rem;">
                        <i class="bi bi-cart-check"></i>
                    </span>
                    <h5 class="modal-title fw-bold text-light mb-0" id="inquiryModalLabel">Ajukan Koleksi Karya</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="alert alert-dark border border-secondary mb-4 p-3 rounded-3">
                    <div class="d-flex gap-3 align-items-center">
                        <img src="{{ $artwork->image_url }}" alt="" class="rounded-2" style="width: 60px; height: 60px; object-fit: cover;">
                        <div>
                            <div class="fw-bold text-light">{{ $artwork->title }}</div>
                            <div class="text-secondary small">Karya oleh {{ $artwork->artist }}</div>
                            <div class="text-info fw-bold small">{{ $artwork->formatted_price }}</div>
                        </div>
                    </div>
                </div>

                <form id="inquiryForm" onsubmit="event.preventDefault(); handleInquirySubmit();">
                    <div class="mb-3">
                        <label for="collectorName" class="form-label text-secondary small fw-semibold">Nama Lengkap Kolektor</label>
                        <input type="text" class="form-control form-control-dark" id="collectorName" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="collectorEmail" class="form-label text-secondary small fw-semibold">Alamat Email</label>
                        <input type="email" class="form-control form-control-dark" id="collectorEmail" placeholder="nama@domain.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="collectorNotes" class="form-label text-secondary small fw-semibold">Catatan / Kebutuhan Lisensi</label>
                        <textarea class="form-control form-control-dark" id="collectorNotes" rows="3" placeholder="Contoh: Untuk cetak fine art ruang kerja / media visual interaktif"></textarea>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input bg-dark border-secondary" type="checkbox" id="termsCheck" required checked>
                        <label class="form-check-label text-secondary small" for="termsCheck">
                            Saya menyetujui ketentuan lisensi hak cipta digital dari Aetheria Gallery.
                        </label>
                    </div>
                    <button type="submit" class="btn btn-neon w-100 py-2 fw-semibold">
                        Kirim Permintaan Koleksi
                    </button>
                </form>

                <div id="inquirySuccess" class="d-none text-center py-4">
                    <i class="bi bi-check-circle-fill text-success fs-1 mb-2 d-block"></i>
                    <h5 class="fw-bold text-light">Permintaan Berhasil Terkirim!</h5>
                    <p class="text-secondary small mb-3">
                        Tim kurator Aetheria Gallery akan menghubungi email Anda dalam 1x24 jam beserta invoice resmi dan sertifikat keaslian digital.
                    </p>
                    <button type="button" class="btn btn-dark-slate btn-sm px-4" data-bs-dismiss="modal">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function copyArtworkLink() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            const btn = document.getElementById('btnShare');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="bi bi-check2 text-success me-1"></i> Tersalin!';
            setTimeout(() => {
                btn.innerHTML = originalText;
            }, 2000);
        });
    }

    function openFullscreen(elem) {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.webkitRequestFullscreen) {
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
    }

    function handleInquirySubmit() {
        document.getElementById('inquiryForm').classList.add('d-none');
        document.getElementById('inquirySuccess').classList.remove('d-none');
    }
</script>
@endpush
