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

                    <!-- Search Input Bar -->
                    <form action="{{ route('artworks.index') }}#gallery-section" method="GET" class="mt-4 mx-auto" style="max-width: 520px;">
                        @if(request('software'))
                            <input type="hidden" name="software" value="{{ request('software') }}">
                        @endif
                        <div class="input-group input-group-lg shadow-lg">
                            <span class="input-group-text bg-dark border-secondary text-secondary ps-3">
                                <i class="bi bi-search text-info"></i>
                            </span>
                            <input type="text" name="search" class="form-control form-control-dark" placeholder="Cari karya lukisan atau software..." value="{{ request('search') }}">
                            @if(request('search'))
                                <a href="{{ route('artworks.index', array_filter(['software' => request('software')])) }}" class="btn btn-dark-slate d-flex align-items-center">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            @endif
                            <button class="btn btn-neon px-4" type="submit">
                                Cari
                            </button>
                        </div>
                    </form>
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

<!-- Gallery Filter & Listing Section -->
<section id="gallery-section" class="py-5">
    <div class="container">
        
        <!-- Filter Toolbar -->
        <div class="row g-3 align-items-center justify-content-between mb-4">
            <div class="col-lg-8">
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <span class="text-secondary small fw-semibold me-2">
                        <i class="bi bi-funnel-fill text-info me-1"></i> Filter Software:
                    </span>
                    <a href="{{ route('artworks.index', array_filter(['search' => request('search'), 'sort' => request('sort')])) }}#gallery-section" 
                       class="filter-pill {{ !request('software') ? 'active' : '' }}">
                        Semua ({{ $totalArtworks }})
                    </a>
                    @foreach($softwares as $sw)
                        <a href="{{ route('artworks.index', array_filter(['software' => $sw, 'search' => request('search'), 'sort' => request('sort')])) }}#gallery-section" 
                           class="filter-pill {{ request('software') == $sw ? 'active' : '' }}">
                            {{ $sw }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Sort Selector -->
            <div class="col-lg-4 text-lg-end">
                <form action="{{ route('artworks.index') }}#gallery-section" method="GET" class="d-inline-flex align-items-center gap-2">
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    @if(request('software'))
                        <input type="hidden" name="software" value="{{ request('software') }}">
                    @endif
                    <label for="sort" class="text-secondary small text-nowrap">Urutkan:</label>
                    <select name="sort" id="sort" class="form-select form-select-sm form-select-dark" onchange="this.form.submit()" style="width: auto;">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Katalog Terbaru</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga: Termurah</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga: Tertinggi</option>
                        <option value="title_asc" {{ request('sort') == 'title_asc' ? 'selected' : '' }}>Judul (A - Z)</option>
                    </select>
                </form>
            </div>
        </div>

        <!-- Feedback on Active Filter -->
        @if(request('search') || request('software'))
            <div class="alert alert-dark border border-secondary border-opacity-50 d-flex justify-content-between align-items-center py-2 px-3 mb-4 rounded-3">
                <div class="small text-secondary">
                    Menampilkan hasil:
                    @if(request('search'))
                        <span class="badge bg-secondary text-light me-1">Pencarian: "{{ request('search') }}"</span>
                    @endif
                    @if(request('software'))
                        <span class="badge bg-info text-dark me-1">Software: {{ request('software') }}</span>
                    @endif
                    ({{ $artworks->count() }} karya ditemukan)
                </div>
                <a href="{{ route('artworks.index') }}#gallery-section" class="btn btn-sm btn-link text-info text-decoration-none py-0">
                    <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filter
                </a>
            </div>
        @endif

        <!-- Artwork Cards Grid -->
        @if($artworks->isEmpty())
            <div class="card card-aetheria p-5 text-center my-4">
                <div class="mb-3">
                    <i class="bi bi-search fs-1 text-secondary"></i>
                </div>
                <h4 class="fw-bold text-light mb-2">Tidak Ada Karya yang Cocok</h4>
                <p class="text-secondary mb-4">
                    Maaf, tidak ditemukan lukisan digital dengan kriteria tersebut. Silakan gunakan kata kunci lain.
                </p>
                <div>
                    <a href="{{ route('artworks.index') }}#gallery-section" class="btn btn-neon px-4">
                        <i class="bi bi-arrow-left me-1"></i> Tampilkan Semua Koleksi
                    </a>
                </div>
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($artworks as $art)
                    <div class="col">
                        <div class="card card-aetheria h-100 d-flex flex-column">
                            <!-- Image Container -->
                            <div class="artwork-img-wrapper">
                                <img src="{{ $art->image_url }}" alt="{{ $art->title }}" loading="lazy">
                                <div class="artwork-overlay-badge">
                                    <i class="bi bi-aspect-ratio me-1"></i> {{ $art->resolution }}
                                </div>
                                <div class="artwork-software-badge text-truncate" style="max-width: 80%;">
                                    <i class="bi bi-cpu me-1"></i> {{ $art->software_used }}
                                </div>
                            </div>

                            <!-- Card Body -->
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
                                    {{ $art->description ?? 'Karya seni lukisan digital eksklusif dengan komposisi visual dan pewarnaan modern.' }}
                                </p>

                                <hr class="border-secondary border-opacity-25 mt-auto mb-3">

                                <!-- Card Footer Actions -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-muted d-block" style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">Harga Karya</span>
                                        <span class="artwork-price">{{ $art->formatted_price }}</span>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <!-- Quick View Button -->
                                        <button type="button" 
                                                class="btn btn-dark-slate btn-sm px-2 py-2" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#quickViewModal"
                                                data-id="{{ $art->id }}"
                                                data-title="{{ $art->title }}"
                                                data-artist="{{ $art->artist }}"
                                                data-price="{{ $art->formatted_price }}"
                                                data-resolution="{{ $art->resolution }}"
                                                data-software="{{ $art->software_used }}"
                                                data-description="{{ $art->description }}"
                                                data-image="{{ $art->image_url }}"
                                                data-url="{{ route('artworks.show', $art->id) }}"
                                                title="Pratinjau Cepat">
                                            <i class="bi bi-eye"></i>
                                        </button>

                                        <!-- Detail Page Link Button -->
                                        <a href="{{ route('artworks.show', $art->id) }}" class="btn btn-neon btn-sm px-3 py-2">
                                            <span>Rincian</span>
                                            <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

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

<!-- Quick View Modal -->
<div class="modal fade" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content modal-content-dark">
            <div class="modal-header modal-header-dark">
                <div class="d-flex align-items-center gap-2">
                    <span class="brand-glow-icon" style="width: 28px; height: 28px; font-size: 0.85rem;">
                        <i class="bi bi-gem"></i>
                    </span>
                    <h5 class="modal-title fw-bold text-light mb-0" id="quickViewTitle">Pratinjau Lukisan</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6">
                        <div class="rounded-3 overflow-hidden border border-secondary border-opacity-50 bg-black">
                            <img id="quickViewImg" src="" alt="" class="img-fluid w-100" style="max-height: 380px; object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="badge bg-dark border border-secondary text-info mb-2" id="quickViewSoftware">Software</div>
                        <h4 class="fw-bold text-light mb-1" id="quickViewArtworkName">Judul Lukisan</h4>
                        <p class="text-secondary small mb-3">Dibuat oleh <span class="text-light fw-semibold" id="quickViewArtist">Nama Artis</span></p>

                        <div class="p-3 rounded-3 mb-3" style="background: rgba(0, 0, 0, 0.3); border: 1px solid var(--border-color);">
                            <div class="text-muted small">Estimasi Harga</div>
                            <div class="artwork-price fs-4" id="quickViewPrice">Rp 0</div>
                        </div>

                        <ul class="list-unstyled text-secondary small mb-3 d-flex flex-column gap-2">
                            <li><i class="bi bi-aspect-ratio text-info me-2"></i> Resolusi: <span class="text-light" id="quickViewResolution">-</span></li>
                            <li><i class="bi bi-shield-check text-success me-2"></i> File Master Resmi &amp; Lisensi Komersial</li>
                        </ul>

                        <p class="text-secondary small mb-4" id="quickViewDesc">-</p>

                        <div class="d-flex gap-2">
                            <a id="quickViewDetailLink" href="#" class="btn btn-neon w-100 py-2">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Buka Rincian Lengkap
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Quick View Modal Event Listener
    const quickViewModal = document.getElementById('quickViewModal');
    if (quickViewModal) {
        quickViewModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            
            const title = button.getAttribute('data-title');
            const artist = button.getAttribute('data-artist');
            const price = button.getAttribute('data-price');
            const resolution = button.getAttribute('data-resolution');
            const software = button.getAttribute('data-software');
            const desc = button.getAttribute('data-description');
            const image = button.getAttribute('data-image');
            const url = button.getAttribute('data-url');

            document.getElementById('quickViewTitle').textContent = 'Pratinjau: ' + title;
            document.getElementById('quickViewArtworkName').textContent = title;
            document.getElementById('quickViewArtist').textContent = artist;
            document.getElementById('quickViewPrice').textContent = price;
            document.getElementById('quickViewResolution').textContent = resolution;
            document.getElementById('quickViewSoftware').innerHTML = '<i class="bi bi-cpu me-1"></i> ' + software;
            document.getElementById('quickViewDesc').textContent = desc;
            document.getElementById('quickViewImg').src = image;
            document.getElementById('quickViewDetailLink').href = url;
        });
    }
</script>
@endpush
