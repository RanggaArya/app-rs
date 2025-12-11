<!-- <section class="breadcrumbs_custom">
    <div class="container breadcrumbs_custom">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
            <li class="breadcrumb-item active" aria-current="page">Prestasi</li>
          </ol>
    </div>
</nav>  
</section>
<br/>
<br/>
<section class="section_four_two">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <h4><?php echo $daftar[0]->nama; ?></h4>
                <br/>
                <p class="text_justify">
                <?php echo $daftar[0]->thumb; ?>
                </p>
                <p class="text_justify">
                    <?php echo $daftar[0]->deskripsi; ?>
                </p>
               
            </div>
        </div>
    </div>
</section> -->
<section class="breadcrumbs_custom">
    <div class="container breadcrumbs_custom">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Direksi</li>
            </ol>
        </nav>  
    </div>
</section>
<br/>
<br/>

<section class="section_four_two" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h3 class="font-weight-bold text-dark">Jajaran Direksi & Struktur Organisasi</h3>
                <div style="width: 60px; height: 3px; background: #27ae60; margin: 10px auto;"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="row justify-content-center">
                    <?php 
                    if(isset($direksi) && !empty($direksi)){
                        foreach($direksi as $row){ 
                            // REVISI PATH: Menggunakan 'assets/profil/thumb/' sesuai request
                            // Jika kolom 'thumb' kosong, gunakan default
                            $thumb = (!empty($row->thumb)) ? $row->thumb : 'avatar-1.jpg';
                            
                            // Path lengkap gambar
                            $img_src = base_url() . 'assets/profil/thumb/' . $thumb; 
                            
                            // Path fallback jika gambar tidak ditemukan (misal pakai gambar avatar default di backview)
                            $img_fallback = base_url() . 'assets/backview/images/avatar-1.jpg';
                            
                            // Cek ekstensi file (hanya tampilkan jika gambar valid: jpg, jpeg, png, webp)
                            $ext = pathinfo($thumb, PATHINFO_EXTENSION);
                            
                            if(in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'webp', ''])) { 
                    ?>          
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-4 d-flex align-items-stretch animate-up">
                                    <div class="card direksi-card w-100 border-0 shadow-sm">
                                        
                                        <div class="img-wrapper">
                                            <a href="<?= $img_src ?>" data-toggle="lightbox" data-gallery="direksi-gallery" data-title="<?= $row->nama; ?>">
                                                <img class="card-img-top" src="<?= $img_src ?>" alt="<?= $row->nama; ?>"
                                                     onerror="this.src='<?= $img_fallback; ?>'">
                                                <div class="img-overlay">
                                                    <i class="fa fa-search-plus text-white fa-2x"></i>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="card-body text-center d-flex flex-column p-4">
                                            <h5 class="card-title font-weight-bold text-dark mb-1">
                                                <?= $row->nama; ?>
                                            </h5>
                                            
                                            <div class="divider-small"></div>
                                            
                                            <div class="card-text text-muted mt-2" style="font-size: 0.9rem;">
                                                <?= strip_tags($row->deskripsi); ?>
                                            </div>
                                            
                                            <div class="mt-auto pt-3">
                                                <span class="badge badge-success px-3 py-2 badge-pill">RSU Mitra Paramedika</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php 
                            } // End If Ext
                        } // End Foreach
                    } else { 
                    ?>
                        <div class="col-12 text-center py-5">
                            <div class="alert alert-light border shadow-sm d-inline-block px-4">
                                <i class="fa fa-info-circle text-success mr-2"></i> Data Direksi belum tersedia.
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Card Style Modern */
    .direksi-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .direksi-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(39, 174, 96, 0.15) !important;
    }

    /* Image Wrapper */
    .img-wrapper {
        height: 320px; /* Tinggi gambar seragam */
        overflow: hidden;
        position: relative;
        background-color: #e9ecef;
    }

    .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top;
        transition: transform 0.5s ease;
    }

    .direksi-card:hover .card-img-top {
        transform: scale(1.08);
    }

    /* Overlay Icon saat Hover */
    .img-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(39, 174, 96, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .img-wrapper:hover .img-overlay {
        opacity: 1;
    }

    /* Divider Kecil Hijau */
    .divider-small {
        width: 40px;
        height: 3px;
        background-color: #27ae60;
        margin: 10px auto;
        border-radius: 2px;
    }

    /* Animasi Muncul Cascade */
    .animate-up {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }
    
    .animate-up:nth-child(1) { animation-delay: 0.1s; }
    .animate-up:nth-child(2) { animation-delay: 0.2s; }
    .animate-up:nth-child(3) { animation-delay: 0.3s; }
    
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true,
            showArrows: false
        });
    });
</script>