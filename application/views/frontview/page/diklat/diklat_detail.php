<section class="breadcrumbs_custom">
    <div class="container breadcrumbs_custom">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('diklat'); ?>">Pendidikan dan Pelatihan</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars(substr($diklat->nama, 0, 50)); ?>...</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section_diklat_detail py-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar Info -->
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="sidebar-info sticky-top" style="top: 20px;">
                    <!-- Back Button -->
                    <a href="<?php echo base_url('diklat'); ?>" class="btn btn-outline-primary btn-block mb-3">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                    
                    <!-- Info Card -->
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <h6 class="card-title mb-3">
                                <i class="fa fa-info-circle text-primary"></i> Informasi
                            </h6>
                            <ul class="list-unstyled small mb-0">
                                <li class="mb-2">
                                    <i class="fa fa-calendar text-muted"></i> 
                                    <strong>Tanggal:</strong><br>
                                    <?= date('d F Y', strtotime($diklat->created_at ?? 'now')); ?>
                                </li>
                                <li class="mb-2">
                                    <i class="fa fa-graduation-cap text-muted"></i> 
                                    <strong>Kategori:</strong><br>
                                    Pendidikan & Pelatihan
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6 class="card-title mb-3">
                                <i class="fa fa-share-alt text-primary"></i> Aksi
                            </h6>
                            <button onclick="window.print()" class="btn btn-sm btn-outline-secondary btn-block mb-2">
                                <i class="fa fa-print"></i> Cetak
                            </button>
                            <!-- <button onclick="window.history.back()" class="btn btn-sm btn-outline-secondary btn-block">
                                <i class="fa fa-arrow-left"></i> Halaman Sebelumnya
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-lg-9 col-md-8">
                <div class="card detail-card shadow-sm">
                    <!-- Thumbnail (Ukuran Terbatas) -->
                    <?php if (!empty($diklat->thumb)): ?>
                        <div class="detail-img-wrapper">
                            <img src="<?php echo base_url('assets/diklat/thumb/' . $diklat->thumb); ?>"
                                class="img-fluid detail-thumbnail"
                                alt="<?= htmlspecialchars($diklat->nama); ?>"
                                onerror="this.parentElement.style.display='none';">
                        </div>
                    <?php endif; ?>

                    <div class="card-body p-4 p-md-5">
                        <!-- Title -->
                        <h1 class="detail-title mb-4"><?= htmlspecialchars($diklat->nama); ?></h1>
                        
                        <!-- Meta Info -->
                        <div class="detail-meta mb-4 pb-3 border-bottom">
                            <span class="badge badge-primary mr-2">
                                <i class="fa fa-calendar"></i> <?= date('d F Y', strtotime($diklat->created_at ?? 'now')); ?>
                            </span>
                            <span class="badge badge-secondary">
                                <i class="fa fa-graduation-cap"></i> Diklat
                            </span>
                        </div>

                        <!-- Content dari CKEditor -->
                        <div class="diklat-content">
                            <?= $diklat->deskripsi; ?>
                        </div>
                    </div>

                    <!-- Footer Info (Mobile) -->
                    <div class="card-footer bg-light d-md-none">
                        <div class="row">
                            <div class="col-6">
                                <button onclick="window.print()" class="btn btn-sm btn-outline-secondary btn-block">
                                    <i class="fa fa-print"></i> Cetak
                                </button>
                            </div>
                            <div class="col-6">
                                <a href="<?php echo base_url('diklat'); ?>" class="btn btn-sm btn-outline-primary btn-block">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* ========== Detail Card Styling ========== */
.detail-card {
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid #e0e0e0;
}

/* ========== Thumbnail Wrapper - Ukuran Terbatas ========== */
.detail-img-wrapper {
    max-height: 350px;
    overflow: hidden;
    background: linear-gradient(135deg, #f5f5f5 0%, #e0e0e0 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.detail-thumbnail {
    width: 100%;
    max-width: 800px;
    height: auto;
    object-fit: contain;
    margin: 0 auto;
}

/* ========== Title Styling ========== */
.detail-title {
    font-size: 2rem;
    font-weight: 700;
    color: #2c3e50;
    line-height: 1.3;
}

/* ========== Meta Info ========== */
.detail-meta .badge {
    padding: 8px 12px;
    font-size: 0.85rem;
    font-weight: 500;
}

/* ========== Content Styling ========== */
.diklat-content {
    line-height: 1.8;
    font-size: 16px;
    color: #333;
    text-align: justify;
}

.diklat-content h1,
.diklat-content h2,
.diklat-content h3 {
    color: #2c3e50;
    font-weight: 600;
    margin-top: 30px;
    margin-bottom: 15px;
}

.diklat-content h1 {
    font-size: 1.8rem;
}

.diklat-content h2 {
    font-size: 1.5rem;
}

.diklat-content h3 {
    font-size: 1.3rem;
}

.diklat-content p {
    margin-bottom: 15px;
}

.diklat-content ul,
.diklat-content ol {
    margin-bottom: 20px;
    padding-left: 30px;
}

.diklat-content li {
    margin-bottom: 8px;
}

/* ========== GAMBAR DI DALAM CONTENT - DIPERKECIL JADI 400PX ========== */
.diklat-content img {
    max-width: 400px !important; /* DIKECILKAN DARI 600PX */
    width: 100% !important;
    height: auto !important;
    display: block !important;
    margin: 25px auto !important;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.diklat-content figure {
    margin: 25px 0 !important;
    text-align: center !important;
}

.diklat-content figure img {
    margin: 0 auto !important;
    max-width: 400px !important; /* SAMA, 400PX */
}

.diklat-content figcaption {
    margin-top: 10px;
    font-size: 0.9rem;
    color: #666;
    font-style: italic;
}

/* ========== Sidebar Styling ========== */
.sidebar-info .card {
    border-radius: 8px;
}

.sidebar-info .card-title {
    font-size: 0.95rem;
    font-weight: 600;
    color: #2c3e50;
}

/* ========== Responsive ========== */
@media (max-width: 992px) {
    .detail-title {
        font-size: 1.6rem;
    }
    
    .detail-img-wrapper {
        max-height: 300px;
    }
    
    .diklat-content img {
        max-width: 350px !important; /* Tablet: 350px */
    }
    
    .diklat-content figure img {
        max-width: 350px !important;
    }
}

@media (max-width: 768px) {
    .detail-title {
        font-size: 1.4rem;
    }
    
    .card-body.p-4 {
        padding: 20px !important;
    }
    
    .detail-img-wrapper {
        max-height: 250px;
    }
    
    .diklat-content {
        font-size: 15px;
    }
    
    .diklat-content img {
        max-width: 100% !important; /* Mobile: full width tapi tetap max container */
        margin: 15px auto !important;
    }
    
    .diklat-content figure img {
        max-width: 100% !important;
    }
}

/* ========== Print Styling ========== */
@media print {
    .breadcrumbs_custom,
    .sidebar-info,
    .btn,
    .card-footer,
    .detail-meta {
        display: none !important;
    }
    
    .col-lg-9 {
        width: 100% !important;
        max-width: 100% !important;
    }
    
    .detail-card {
        box-shadow: none !important;
        border: none !important;
    }
    
    .diklat-content img {
        max-width: 350px !important; /* Print: 350px */
        page-break-inside: avoid;
    }
    
    .diklat-content figure img {
        max-width: 350px !important;
    }
}

/* ========== Additional Enhancements ========== */
.diklat-content blockquote {
    border-left: 4px solid #667eea;
    padding-left: 20px;
    margin: 20px 0;
    font-style: italic;
    color: #555;
    background: #f8f9fa;
    padding: 15px 20px;
    border-radius: 4px;
}

.diklat-content code {
    background: #f4f4f4;
    padding: 2px 6px;
    border-radius: 3px;
    font-family: 'Courier New', monospace;
    font-size: 0.9em;
}

.diklat-content pre {
    background: #2c3e50;
    color: #fff;
    padding: 15px;
    border-radius: 6px;
    overflow-x: auto;
}

.diklat-content table {
    width: 100%;
    margin: 20px 0;
    border-collapse: collapse;
}

.diklat-content table th,
.diklat-content table td {
    padding: 10px;
    border: 1px solid #ddd;
}

.diklat-content table th {
    background: #f8f9fa;
    font-weight: 600;
}

/* Styling untuk link */
.diklat-content a {
    color: #667eea;
    text-decoration: none;
    border-bottom: 1px solid #667eea;
    transition: all 0.3s ease;
}

.diklat-content a:hover {
    color: #764ba2;
    border-bottom-color: #764ba2;
}

/* Styling untuk hr */
.diklat-content hr {
    margin: 30px 0;
    border: none;
    border-top: 2px solid #e0e0e0;
}
</style>