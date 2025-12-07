<section class="breadcrumbs_custom">
    <div class="container breadcrumbs_custom">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Informasi</li>
                <li class="breadcrumb-item active" aria-current="page">Pendidikan dan Pelatihan</li>
            </ol>
        </nav>
    </div>
</section>

<br />

<?php if (sizeof($daftar) > 0): ?>
    <section class="section_diklat">
        <div class="container">
            <div class="row">
                <?php foreach ($daftar as $item): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card diklat-card h-100 shadow-sm">
                            <!-- Thumbnail / Gradient Placeholder -->
                            <div class="card-img-wrapper">
                                <?php if (!empty($item->thumb)): ?>
                                    <img src="<?php echo base_url('assets/diklat/thumb/' . $item->thumb); ?>"
                                        class="card-img-top real-image"
                                        alt="<?= htmlspecialchars($item->nama); ?>"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <!-- Gradient Fallback -->
                                    <div class="gradient-placeholder gradient-<?= ($item->id % 6) + 1; ?>" style="display:none;">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                <?php else: ?>
                                    <!-- Gradient Default (jika memang tidak ada thumbnail) -->
                                    <div class="gradient-placeholder gradient-<?= ($item->id % 6) + 1; ?>">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= htmlspecialchars($item->nama); ?></h5>

                                <!-- Deskripsi singkat -->
                                <p class="card-text text-muted flex-grow-1">
                                    <?= substr(strip_tags($item->deskripsi), 0, 100); ?>...
                                </p>

                                <!-- Button Detail -->
                                <a href="<?php echo base_url('diklat/detail/' . $item->id); ?>"
                                    class="btn btn-primary btn-block mt-auto">
                                    <i class="fa fa-eye"></i> Lihat Detail
                                </a>
                            </div>

                            <!-- Card Footer -->
                            <div class="card-footer text-muted small">
                                <i class="fa fa-calendar"></i> <?= date('d M Y', strtotime($item->created_at ?? 'now')); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <section class="section_diklat">
        <div class="container">
            <div class="alert alert-info text-center">
                <i class="fa fa-info-circle fa-2x mb-3"></i>
                <h5>Tidak ada data diklat saat ini.</h5>
                <p>Silakan cek kembali nanti.</p>
            </div>
        </div>
    </section>
<?php endif; ?>

<br /><br />

<!-- Custom CSS untuk Card Diklat -->
<style>
    .diklat-card {
        border-radius: 10px;
        overflow: hidden;
        transition: all 0.3s ease;
        border: 1px solid #e0e0e0;
    }

    .diklat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
    }

    .card-img-wrapper {
        width: 100%;
        height: 220px;
        overflow: hidden;
        background: #f5f5f5;
        position: relative;
    }

    .card-img-wrapper img.real-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .diklat-card:hover .card-img-wrapper img.real-image {
        transform: scale(1.1);
    }

    /* Gradient Placeholders - 6 Variasi Warna */
    .gradient-placeholder {
        width: 100%;
        height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .gradient-placeholder i {
        font-size: 80px;
        opacity: 0.9;
        z-index: 2;
        position: relative;
        animation: float 3s ease-in-out infinite;
    }

    /* 6 Variasi Gradient yang Berbeda */
    .gradient-1 {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .gradient-2 {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .gradient-3 {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .gradient-4 {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }

    .gradient-5 {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    }

    .gradient-6 {
        background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);
    }

    /* Animasi Float untuk Icon */
    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    /* Efek Hover untuk Gradient */
    .diklat-card:hover .gradient-placeholder {
        transform: scale(1.05);
    }

    /* Pattern Overlay untuk Gradient (Optional - buat lebih menarik) */
    .gradient-placeholder::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            repeating-linear-gradient(
                45deg,
                transparent,
                transparent 10px,
                rgba(255, 255, 255, 0.05) 10px,
                rgba(255, 255, 255, 0.05) 20px
            );
        z-index: 1;
    }

    .diklat-card .card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        min-height: 50px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .diklat-card .card-text {
        font-size: 0.9rem;
        line-height: 1.6;
        color: #666;
    }

    .diklat-card .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 10px 20px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .diklat-card .btn-primary:hover {
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    .diklat-card .card-footer {
        background: #f8f9fa;
        border-top: 1px solid #e0e0e0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .card-img-wrapper {
            height: 180px;
        }
        
        .gradient-placeholder i {
            font-size: 60px;
        }
    }
</style>