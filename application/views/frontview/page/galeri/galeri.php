<section class="breadcrumbs_custom animate-slide-right">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Galeri</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section_galeri py-5">
    <div class="container">
        <div class="row mb-5 animate-slide-down">
            <div class="col-lg-12 text-center">
                <h2 class="section-title">Galeri RSU Mitra Paramedika</h2>
                <div class="title-line"></div>
                <p class="section-subtitle text-muted">Dokumentasi kegiatan dan fasilitas rumah sakit</p>
            </div>
        </div>

        <div class="row animate-expand">
            <div class="col-lg-12">
                <ul class="nav nav-tabs nav-tabs-custom d-flex justify-content-center mb-5" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="image-tab" data-toggle="tab" href="#image" role="tab">
                            <i class="fa fa-image"></i> Foto
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab">
                            <i class="fa fa-video"></i> Video
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="youtube-tab" data-toggle="tab" href="#youtube" role="tab">
                            <i class="fab fa-youtube"></i> Youtube
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    
                    <div class="tab-pane fade show active" id="image" role="tabpanel">
                        <div class="row galeri-grid">
                             <?php
                            $delay = 0;
                            foreach ($galeri as $list) {
                                $getformat = explode('.', $list->image_name);
                                if (in_array($getformat[1], ['png', 'jpg', 'jpeg'])) {
                                    $delay += 0.1;
                            ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4 anim-item pop-in" style="animation-delay: <?php echo $delay; ?>s;">
                                        <div class="galeri-item">
                                            <a href="<?php echo base_url() ?>assets/galeri/<?php echo $list->image_name; ?>" data-toggle="lightbox" data-gallery="galeri-foto">
                                                <div class="galeri-img-wrapper">
                                                    <img class="img-fluid" src="<?php echo base_url() ?>assets/galeri/<?php echo $list->image_name; ?>" alt="<?php echo $list->caption; ?>">
                                                    <div class="galeri-overlay">
                                                        <span class="icon-zoom"><i class="fa fa-search-plus"></i></span>
                                                    </div>
                                                </div>
                                            </a>
                                            <?php if ($list->caption): ?>
                                                <div class="galeri-caption">
                                                    <p><?php echo $list->caption; ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="video" role="tabpanel">
                         <div class="row">
                            <?php
                            $delayVideo = 0;
                            foreach ($galeri as $list) {
                                $getformat = explode('.', $list->image_name);
                                if (in_array($getformat[1], ['webm', 'mp4', 'ogv'])) {
                                    $delayVideo += 0.2;
                            ?>
                                    <div class="col-lg-6 col-md-6 mb-4 anim-item slide-up" style="animation-delay: <?php echo $delayVideo; ?>s;">
                                        <div class="video-wrapper hover-3d">
                                            <video class="video-player" controls>
                                                <source src="<?php echo base_url() ?>assets/galeri/<?php echo $list->image_name; ?>" type="video/<?php echo $getformat[1]; ?>">
                                                Browser Anda tidak mendukung tag video.
                                            </video>
                                            <?php if ($list->caption): ?>
                                                <div class="video-caption">
                                                    <p><?php echo $list->caption; ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="youtube" role="tabpanel">
                        <div class="row">
                            <?php
                            function convertYoutube($string) {
                                return preg_replace(
                                    "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                                    "<iframe class='youtube-iframe' src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
                                    $string
                                );
                            }

                            $delayYT = 0;
                            foreach ($galeri_video as $list) {
                                $delayYT += 0.15;
                            ?>
                                <div class="col-lg-6 col-md-6 mb-4 anim-item flip-in" style="animation-delay: <?php echo $delayYT; ?>s;">
                                    <div class="youtube-card hover-glow">
                                        <div class="video-responsive">
                                            <?php echo convertYoutube($list->link); ?>
                                        </div>
                                        
                                        <?php if ($list->caption): ?>
                                            <div class="video-caption">
                                                <p><?php echo $list->caption; ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* =========================================
       1. BASE STYLES
       ========================================= */
    .section_galeri {
        background: #fdfdfd;
        background-image: radial-gradient(#e0e0e0 1px, transparent 1px);
        background-size: 30px 30px;
        min-height: 100vh;
        overflow-x: hidden;
    }

    .title-line {
        width: 80px;
        height: 4px;
        background: linear-gradient(to right, #007bff, #00d2ff);
        margin: 10px auto 15px;
        border-radius: 2px;
    }

    /* =========================================
       2. TABS STYLING (FIX CENTER)
       ========================================= */
    .nav-tabs-custom {
        border-bottom: none;
        background: transparent; /* Transparan agar tidak terlihat kotak */
        padding: 5px;
        display: flex; /* Wajib Flex */
        justify-content: center; /* Wajib Center */
        width: 100%;
    }
    
    /* Container pill putih di belakang tombol */
    .nav-tabs-custom {
        /* Jika ingin background putih melingkupi semua tombol, uncomment baris bawah */
        /* background: #fff; border-radius: 50px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); display: inline-flex; */
    }

    .nav-tabs-custom .nav-item {
        margin: 0 5px; /* Jarak antar tombol */
    }

    .nav-tabs-custom .nav-link {
        border: none;
        border-radius: 50px;
        color: #555;
        padding: 10px 30px;
        font-weight: 600;
        background: #fff; /* Tombol punya background sendiri */
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .nav-tabs-custom .nav-link:hover {
        background: #fff;
        color: #007bff;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .nav-tabs-custom .nav-link.active {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        color: #fff;
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.4);
        transform: scale(1.05);
    }

    /* =========================================
       3. GALERI FOTO ITEM
       ========================================= */
    .galeri-item {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.4s ease;
        position: relative;
        cursor: pointer;
    }

    .galeri-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 123, 255, 0.2);
    }

    .galeri-img-wrapper {
        position: relative;
        overflow: hidden;
        padding-top: 75%; /* 4:3 Aspect Ratio */
        border-radius: 15px 15px 0 0;
    }

    .galeri-img-wrapper img {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .galeri-item:hover .galeri-img-wrapper img {
        transform: scale(1.15) rotate(2deg);
    }

    .galeri-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(135deg, rgba(0, 123, 255, 0.9), rgba(0, 210, 255, 0.8));
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.4s ease;
        transform: translateY(100%);
        backdrop-filter: blur(2px);
    }

    .galeri-item:hover .galeri-overlay {
        opacity: 1;
        transform: translateY(0);
    }

    .icon-zoom {
        color: white;
        font-size: 2rem;
        transform: scale(0);
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) 0.2s;
    }

    .galeri-item:hover .icon-zoom {
        transform: scale(1);
    }

    .galeri-caption {
        padding: 15px;
        background: #fff;
        border-top: 1px solid #f1f1f1;
        position: relative;
        z-index: 2;
    }

    /* =========================================
       4. YOUTUBE & VIDEO FIX (RESPONSIVE 16:9)
       ========================================= */
    
    .youtube-card, .video-wrapper {
        border-radius: 15px;
        overflow: hidden;
        background: #000;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        transition: all 0.4s ease;
        height: 100%; /* Agar konsisten */
    }

    /* CONTAINER YOUTUBE RESPONSIVE (PENTING!) */
    .video-responsive {
        position: relative;
        padding-bottom: 56.25%; /* Rasio 16:9 (9/16 = 0.5625) */
        height: 0;
        overflow: hidden;
        background: #000;
    }

    /* Iframe dipaksa memenuhi container */
    .video-responsive iframe,
    .video-responsive .youtube-iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
        border: 0;
    }

    /* Untuk Video Biasa (Local) */
    .video-player {
        width: 100%;
        height: auto;
        display: block;
    }

    .video-caption {
        background: #fff;
        padding: 15px;
        color: #333;
        border-top: 1px solid #eee;
    }

    /* Hover Effects */
    .hover-glow:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 25px rgba(255, 0, 0, 0.3); /* Glow merah youtube */
    }
    
    .hover-3d {
        transition: transform 0.5s ease;
    }
    .hover-3d:hover {
        transform: perspective(1000px) rotateX(2deg) translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }

    /* =========================================
       5. ANIMATIONS (SAMA SEPERTI SEBELUMNYA)
       ========================================= */
    .animate-slide-right { animation: slideRight 1s cubic-bezier(0.2, 0.8, 0.2, 1) forwards; }
    @keyframes slideRight { from { opacity: 0; transform: translateX(-50px); } to { opacity: 1; transform: translateX(0); } }

    .animate-slide-down { animation: slideDown 1s cubic-bezier(0.2, 0.8, 0.2, 1) forwards; }
    @keyframes slideDown { from { opacity: 0; transform: translateY(-50px); } to { opacity: 1; transform: translateY(0); } }

    .animate-expand { animation: expandWidth 0.8s ease-out forwards; animation-delay: 0.3s; opacity: 0; }
    @keyframes expandWidth { from { opacity: 0; transform: scaleX(0.5); } to { opacity: 1; transform: scaleX(1); } }

    .anim-item { opacity: 0; }
    
    .pop-in { animation: elasticPop 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; }
    @keyframes elasticPop { 0% { opacity: 0; transform: scale(0.5) translateY(50px); } 100% { opacity: 1; transform: scale(1) translateY(0); } }

    .slide-up { animation: smoothSlideUp 0.8s ease-out forwards; }
    @keyframes smoothSlideUp { 0% { opacity: 0; transform: translateY(60px); } 100% { opacity: 1; transform: translateY(0); } }

    .flip-in { animation: flipInX 0.9s cubic-bezier(0.2, 0.8, 0.2, 1) forwards; }
    @keyframes flipInX { 0% { opacity: 0; transform: perspective(400px) rotateX(90deg); } 100% { opacity: 1; transform: perspective(400px) rotateX(0deg); } }
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    
    // Fungsi untuk me-reset animasi saat tab diganti
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href"); // Tab yang aktif (misal #video)
        
        // Cari semua elemen animasi di dalam tab target
        var animItems = $(target).find('.anim-item');
        
        animItems.each(function(index, element) {
            // Hapus class animasi
            var animationClass = '';
            if($(element).hasClass('pop-in')) animationClass = 'pop-in';
            if($(element).hasClass('slide-up')) animationClass = 'slide-up';
            if($(element).hasClass('flip-in')) animationClass = 'flip-in';
            
            $(element).removeClass(animationClass);
            
            // Trigger reflow (memaksa browser render ulang)
            void element.offsetWidth;
            
            // Tambahkan class animasi lagi
            $(element).addClass(animationClass);
        });
    });

    // Inisialisasi Lightbox (Jika Anda pakai library eksternal seperti ekko-lightbox)
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
});
</script>