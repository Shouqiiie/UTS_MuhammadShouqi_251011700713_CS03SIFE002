@extends('layouts.app')

@section('title', 'Katalog Galeri Lukisan Digital &mdash; Aetheria Gallery')

@section('content')

<!-- Dedicated Gallery Header & Breadcrumb -->
<section class="py-4 border-bottom border-secondary border-opacity-25" style="background: radial-gradient(circle at 50% 0%, rgba(0, 242, 254, 0.08) 0%, rgba(13, 15, 18, 0.95) 75%);">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}" class="text-secondary text-decoration-none">
                        <i class="bi bi-house-door me-1"></i> Beranda
                    </a>
                </li>
                <li class="breadcrumb-item active text-info" aria-current="page">
                    Galeri Lukisan Digital
                </li>
            </ol>
        </nav>

        <div class="row align-items-center justify-content-between g-3">
            <div class="col-lg-7">
                <div class="hero-tag mb-2">
                    <i class="bi bi-grid-3x3-gap-fill text-info"></i>
                    <span>Halaman Katalog Galeri &bull; 10 Karya Eksklusif</span>
                </div>
                <h1 class="display-6 fw-bold text-light mb-2">
                    Katalog Galeri <span class="cyan-gradient-text">Lukisan Digital</span>
                </h1>
                <p class="text-secondary mb-0" style="max-width: 620px;">
                    Eksplorasi koleksi karya seni digital beresolusi master hingga 8K. Gunakan filter software dan fitur pencarian untuk menemukan mahakarya yang Anda minati.
                </p>
            </div>

            <!-- Search Form on Gallery Header -->
            <div class="col-lg-5">
                <form action="{{ route('artworks.index') }}" method="GET" class="ms-lg-auto" style="max-width: 450px;">
                    @if(request('software'))
                        <input type="hidden" name="software" value="{{ request('software') }}">
                    @endif
                    @if(request('sort'))
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                    @endif
                    <div class="input-group shadow-sm">
                        <span class="input-group-text bg-dark border-secondary text-secondary ps-3">
                            <i class="bi bi-search text-info"></i>
                        </span>
                        <input type="text" name="search" class="form-control form-control-dark" placeholder="Cari judul, artis, atau software..." value="{{ request('search') }}">
                        @if(request('search'))
                            <a href="{{ route('artworks.index', array_filter(['software' => request('software'), 'sort' => request('sort')])) }}" class="btn btn-dark-slate d-flex align-items-center">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        @endif
                        <button class="btn btn-neon px-3" type="submit">
                            Cari
                        </button>
                    </div>
                </form>
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
                    <a href="{{ route('artworks.index', array_filter(['search' => request('search'), 'sort' => request('sort')])) }}" 
                       class="filter-pill {{ !request('software') ? 'active' : '' }}">
                        Semua ({{ $totalArtworks }})
                    </a>
                    @foreach($softwares as $sw)
                        <a href="{{ route('artworks.index', array_filter(['software' => $sw, 'search' => request('search'), 'sort' => request('sort')])) }}" 
                           class="filter-pill {{ request('software') == $sw ? 'active' : '' }}">
                            {{ $sw }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Sort Selector -->
            <div class="col-lg-4 text-lg-end">
                <form action="{{ route('artworks.index') }}" method="GET" class="d-inline-flex align-items-center gap-2">
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
                <a href="{{ route('artworks.index') }}" class="btn btn-sm btn-link text-info text-decoration-none py-0">
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
                    <a href="{{ route('artworks.index') }}" class="btn btn-neon px-4">
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
                                <i class="bi bi-box-arrow-up-right me-1"></i> Buka Halaman Rincian Lengkap
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
