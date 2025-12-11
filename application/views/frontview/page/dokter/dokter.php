<section class="breadcrumbs_custom animate-slide-right">
    <div class="container breadcrumbs_custom">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dokter</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section_jadwal py-5 position-relative">
    <div class="bg-decoration-circle-1"></div> <div class="container position-relative z-1">
        <div class="row mb-5 animate-up">
            <div class="col-12 text-center">
                <span class="badge badge-pill badge-soft-primary mb-2 px-3 py-2">Info Terbaru</span>
                <h3 class="section-title">Jadwal Dokter</h3>
                <div class="title-line"></div>
            </div>
        </div>

        <div class="row justify-content-center">
            <?php 
            if (!empty($jadwaldokter)) {
                $delay = 0;
                foreach($jadwaldokter as $list){ 
                    $delay += 0.1;
            ?>
                <div class="col-lg-4 col-md-6 col-sm-10 mb-4 animate-up" style="animation-delay: <?php echo $delay; ?>s;">
                    <div class="poster-card-premium">
                        <a href="<?php echo base_url()?>assets/jadwaldokter/<?php echo $list->image_name;?>" data-toggle="lightbox" data-gallery="jadwal-gallery" data-title="<?php echo $list->caption;?>">
                            <div class="poster-img-wrapper">
                                <img class="poster-img" src="<?php echo base_url()?>assets/jadwaldokter/<?php echo $list->image_name;?>" alt="<?php echo $list->caption; ?>">
                                <div class="poster-overlay">
                                    <span class="icon-box"><i class="fa fa-expand-arrows-alt"></i></span>
                                </div>
                            </div>
                        </a>
                        <div class="poster-caption">
                            <i class="fa fa-calendar-alt text-success mr-2"></i> <?php echo $list->caption;?>
                        </div>
                    </div>
                </div>
            <?php 
                } 
            } else { ?>
                <div class="col-12 text-center animate-up">
                    <div class="empty-state">
                        <i class="fa fa-calendar-times"></i>
                        <p>Belum ada jadwal tersedia saat ini.</p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="section_dokter py-5 bg-light-gradient position-relative overflow-hidden">
    <div class="floating-shape shape-1"></div>
    <div class="floating-shape shape-2"></div>

    <div class="container position-relative z-1">
        
        <div class="row mb-5 animate-up">
            <div class="col-12 text-center">
                <h3 class="section-title">Daftar Dokter</h3>
                <p class="text-muted">Siap melayani kesehatan Anda dengan profesionalisme tinggi.</p>
                <div class="title-line"></div>
            </div>
        </div>

        <div class="row">
            <?php 
            $docDelay = 0;
            foreach ($daftar as $list) { 
                $docDelay += 0.1;
                $thumb = !empty($list->thumb) ? base_url('assets/profil/thumb/' . $list->thumb) : base_url('assets/profil/thumb.png');
                $wa = $list->wa ?? '+6281229966297';
                $pesan = urlencode("Halo, saya ingin mendaftar konsultasi dengan Dr. ".$list->nama);
            ?>
            
            <div class="col-lg-3 col-md-6 col-sm-6 mb-5 animate-up" style="animation-delay: <?php echo $docDelay; ?>s;">
                <div class="doctor-card-premium">
                    
                    <div class="doc-header">
                        <div class="wave-container">
                            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                                <defs>
                                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                                </defs>
                                <g class="parallax">
                                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                                </g>
                            </svg>
                        </div>
                        <!--<div class="status-badge" title="Tersedia">-->
                        <!--    <span class="status-dot"></span> Tersedia-->
                        <!--</div>-->
                    </div>

                    <div class="doc-avatar-box">
                        <a href="<?php echo $thumb; ?>" data-toggle="lightbox" data-title="<?php echo $list->nama; ?>" data-gallery="dokter-profil">
                            <div class="avatar-circle">
                                <img src="<?php echo $thumb; ?>" alt="<?php echo $list->nama; ?>" class="doc-img">
                                <div class="avatar-hover-icon"><i class="fa fa-search-plus"></i></div>
                            </div>
                        </a>
                    </div>

                    <div class="doc-body">
                        <h5 class="doc-name"><?php echo $list->nama; ?></h5>
                        <div class="doc-divider"></div>
                        <!--<p class="doc-speciality">Dokter Spesialis</p>-->
                        
                        <div class="doc-btn-group">
                            <a href="<?php echo base_url('profil/detail/' . $list->slug . '/dokter'); ?>" class="btn btn-doc-outline">
                                <i class="fa fa-eye"></i> Detail
                            </a>
                            <a href="https://wa.me/<?php echo $wa; ?>?text=<?php echo $pesan; ?>" target="_blank" class="btn btn-doc-primary">
                                <i class="fab fa-whatsapp"></i> Daftar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>


<style>
    /* =========================================
       1. GLOBAL VARIABLES & UTILS
       ========================================= */
    :root {
        --primary-green: #27ae60;
        --dark-green: #219150;
        --soft-green: #e8f5e9;
        --card-bg: #ffffff;
    }

    .bg-light-gradient {
        background: radial-gradient(circle at top left, #f9fbf9, #ffffff);
    }
    
    .title-line {
        width: 70px; height: 4px;
        background: linear-gradient(to right, var(--primary-green), #2ecc71);
        margin: 10px auto 30px;
        border-radius: 50px;
    }

    /* Animasi Muncul dari Bawah (Waterfall) */
    .animate-up {
        opacity: 0;
        animation: fadeInUp 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translate3d(0, 40px, 0); }
        to { opacity: 1; transform: translate3d(0, 0, 0); }
    }

    /* Decoration Circles Background */
    .bg-decoration-circle-1 {
        position: absolute;
        top: -50px; left: -50px;
        width: 300px; height: 300px;
        background: rgba(39, 174, 96, 0.05);
        border-radius: 50%;
        z-index: 0;
        filter: blur(50px);
    }

    /* =========================================
       2. POSTER JADWAL (Gallery Style)
       ========================================= */
    .poster-card-premium {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.06);
        transition: all 0.4s ease;
        border: 1px solid rgba(0,0,0,0.03);
    }

    .poster-card-premium:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(39, 174, 96, 0.2);
    }

    .poster-img-wrapper {
        position: relative;
        overflow: hidden;
        border-bottom: 3px solid var(--primary-green);
    }

    .poster-img {
        width: 100%; height: auto; display: block;
        transition: transform 0.6s ease;
    }

    .poster-card-premium:hover .poster-img { transform: scale(1.08); }

    .poster-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.4);
        display: flex; align-items: center; justify-content: center;
        opacity: 0; transition: 0.3s;
    }

    .icon-box {
        width: 50px; height: 50px;
        background: #fff; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: var(--primary-green);
        transform: scale(0); transition: 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .poster-card-premium:hover .poster-overlay { opacity: 1; }
    .poster-card-premium:hover .icon-box { transform: scale(1); }

    .poster-caption {
        padding: 15px;
        font-weight: 600;
        color: #444;
        text-align: center;
        font-size: 0.95rem;
    }

    /* =========================================
       3. DOCTOR CARD (WAVE ANIMATION)
       ========================================= */
    .doctor-card-premium {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        margin-top: 30px;
    }

    .doctor-card-premium:hover {
        transform: translateY(-15px);
        box-shadow: 0 25px 50px rgba(39, 174, 96, 0.25);
    }

    /* HEADER GRADIENT + WAVE */
    .doc-header {
        height: 120px;
        background: linear-gradient(45deg, #27ae60, #2ecc71);
        position: relative;
    }

    .waves {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 40px;
        margin-bottom: -1px; /* Fix gap pixel */
    }

    /* Animasi Ombak Bergerak */
    .parallax > use {
        animation: move-forever 25s cubic-bezier(.55,.5,.45,.5) infinite;
    }
    .parallax > use:nth-child(1) { animation-delay: -2s; animation-duration: 7s; }
    .parallax > use:nth-child(2) { animation-delay: -3s; animation-duration: 10s; }
    .parallax > use:nth-child(3) { animation-delay: -4s; animation-duration: 13s; }
    .parallax > use:nth-child(4) { animation-delay: -5s; animation-duration: 20s; }

    @keyframes move-forever {
        0% { transform: translate3d(-90px,0,0); }
        100% { transform: translate3d(85px,0,0); }
    }

    /* Status Dot */
    .status-badge {
        position: absolute;
        top: 15px; right: 15px;
        background: rgba(255,255,255,0.2);
        backdrop-filter: blur(5px);
        padding: 5px 12px;
        border-radius: 20px;
        color: #fff;
        font-size: 0.75rem;
        font-weight: 600;
        display: flex; align-items: center;
    }
    
    .status-dot {
        width: 8px; height: 8px;
        background: #00ff6a;
        border-radius: 50%;
        margin-right: 5px;
        box-shadow: 0 0 10px #00ff6a;
        animation: pulse-dot 2s infinite;
    }

    @keyframes pulse-dot {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(0, 255, 106, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 5px rgba(0, 255, 106, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(0, 255, 106, 0); }
    }

    /* AVATAR BOX */
    .doc-avatar-box {
        position: relative;
        margin-top: -65px; /* Tarik ke atas menumpuk wave */
        display: flex;
        justify-content: center;
        z-index: 2;
    }

    .avatar-circle {
        width: 130px; height: 130px;
        border-radius: 50%;
        border: 5px solid #fff;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        background: #fff;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s;
    }

    .doctor-card-premium:hover .avatar-circle {
        transform: scale(1.1);
        border-color: var(--soft-green);
    }

    .doc-img {
        width: 100%; height: 100%;
        object-fit: cover;
    }

    .avatar-hover-icon {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(39, 174, 96, 0.6);
        display: flex; align-items: center; justify-content: center;
        color: #fff; font-size: 1.5rem;
        opacity: 0; transition: 0.3s;
    }

    .avatar-circle:hover .avatar-hover-icon { opacity: 1; }

    /* CONTENT BODY */
    .doc-body {
        padding: 15px 20px 25px;
        text-align: center;
    }

    .doc-name {
        font-weight: 700;
        font-size: 1.15rem;
        color: #2c3e50;
        margin-top: 10px;
        margin-bottom: 5px;
        /* Line clamp untuk nama panjang */
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 3em; 
    }

    .doc-divider {
        width: 30px; height: 3px;
        background: #eee;
        margin: 5px auto 10px;
    }

    .doc-speciality {
        font-size: 0.85rem;
        color: #7f8c8d;
        margin-bottom: 20px;
        font-weight: 500;
    }

    /* BUTTON GROUP */
    .doc-btn-group {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .btn-doc-outline {
        border: 2px solid #e0e0e0;
        color: #777;
        border-radius: 80px;
        font-size: 0.85rem;
        padding: 8px 18px;
        font-weight: 600;
        transition: 0.3s;
    }
    
    .btn-doc-outline:hover {
        border-color: var(--primary-green);
        color: var(--primary-green);
        background: #fff;
    }

    .btn-doc-primary {
        background: linear-gradient(50deg, var(--primary-green), #9ce862);
        color: #fff;
        border: none;
        border-radius: 80px;
        font-size: 0.85rem;
        padding: 8px 20px;
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(39, 174, 96, 0.3);
        transition: 0.3s;
    }

    .btn-doc-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(39, 174, 96, 0.4);
        color: #fff;
    }

    /* Background Shapes Decoration */
    .floating-shape {
        position: absolute;
        z-index: 0;
        border-radius: 50%;
        opacity: 0.4;
    }
    .shape-1 {
        width: 300px; height: 300px;
        background: radial-gradient(#e8f5e9, transparent);
        top: 10%; right: -100px;
        animation: floatShape 8s ease-in-out infinite;
    }
    .shape-2 {
        width: 200px; height: 200px;
        background: radial-gradient(#f1f8e9, transparent);
        bottom: 10%; left: -50px;
        animation: floatShape 10s ease-in-out infinite reverse;
    }

    @keyframes floatShape {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(20px, 30px); }
    }
</style>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Init Lightbox untuk poster jadwal
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });

        // Intersection Observer untuk animasi scroll
        const animatedItems = document.querySelectorAll('.animate-up');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Reset animasi agar jalan mulus
                    entry.target.style.animationPlayState = 'running'; 
                    // Atau biarkan class CSS menangani
                }
            });
        });

        animatedItems.forEach(item => {
            observer.observe(item);
        });
    });
</script>