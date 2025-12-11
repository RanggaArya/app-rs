<section class="breadcrumbs_custom">
    <div class="container breadcrumbs_custom">
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
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-lg-12 text-center">
                <h2 class="section-title">Galeri RSU Mitra Paramedika</h2>
                <p class="section-subtitle text-muted">Dokumentasi kegiatan dan fasilitas rumah sakit</p>
            </div>
        </div>

        <!-- Tab Navigation -->
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs nav-tabs-custom justify-content-center mb-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="image-tab" data-toggle="tab" href="#image" role="tab" aria-controls="image" aria-selected="true">
                            <i class="fa fa-image"></i> Foto
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false">
                            <i class="fa fa-video"></i> Video
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="youtube-tab" data-toggle="tab" href="#youtube" role="tab" aria-controls="youtube" aria-selected="false">
                            <i class="fab fa-youtube"></i> Youtube
                        </a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="myTabContent">
                    <!-- Tab Foto -->
                    <div class="tab-pane fade show active" id="image" role="tabpanel" aria-labelledby="image-tab">
                        <div class="row galeri-grid">
                            <?php
                            foreach ($galeri as $list) {
                                $getformat = explode('.', $list->image_name);
                                if ($getformat[1] == 'png' || $getformat[1] == 'jpg' || $getformat[1] == 'jpeg') {
                            ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                        <div class="galeri-item">
                                            <a href="<?php echo base_url() ?>assets/galeri/<?php echo $list->image_name; ?>" data-toggle="lightbox" data-gallery="galeri-foto">
                                                <div class="galeri-img-wrapper">
                                                    <img class="img-fluid" src="<?php echo base_url() ?>assets/galeri/<?php echo $list->image_name; ?>" alt="<?php echo $list->caption; ?>">
                                                    <div class="galeri-overlay">
                                                        <i class="fa fa-search-plus"></i>
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

                    <!-- Tab Video -->
                    <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                        <div class="row">
                            <?php
                            foreach ($galeri as $list) {
                                $getformat = explode('.', $list->image_name);
                                if ($getformat[1] == 'webm' || $getformat[1] == 'mp4' || $getformat[1] == 'ogv') {
                            ?>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="video-wrapper">
                                            <video class="video-player" controls poster="">
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

                    <!-- Tab Youtube -->
                    <div class="tab-pane fade" id="youtube" role="tabpanel" aria-labelledby="youtube-tab">
                        <div class="row">
                            <?php
                            function convertYoutube($string)
                            {
                                return preg_replace(
                                    "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                                    "<iframe class='youtube-iframe' src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
                                    $string
                                );
                            }

                            foreach ($galeri_video as $list) {
                            ?>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="youtube-wrapper">
                                        <?php echo convertYoutube($list->link); ?>
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
    /* Section Styling */
    .section_galeri {
        background: #f8f9fa;
        min-height: 100vh;
    }

    .section-title {
        font-size: 2rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .section-subtitle {
        font-size: 1rem;
        margin-bottom: 0;
    }

    /* Custom Tabs */
    .nav-tabs-custom {
        border-bottom: 2px solid #e0e0e0;
    }

    .nav-tabs-custom .nav-link {
        border: none;
        color: #6c757d;
        padding: 12px 30px;
        font-weight: 500;
        transition: all 0.3s ease;
        border-bottom: 3px solid transparent;
    }

    .nav-tabs-custom .nav-link:hover {
        color: #007bff;
        border-bottom-color: #007bff;
    }

    .nav-tabs-custom .nav-link.active {
        color: #007bff;
        background: transparent;
        border-bottom-color: #007bff;
    }

    .nav-tabs-custom .nav-link i {
        margin-right: 5px;
    }

    /* Galeri Grid */
    .galeri-grid {
        margin: 0 -10px;
    }

    .galeri-grid>div {
        padding: 0 10px;
    }

    /* Galeri Item */
    .galeri-item {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .galeri-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    }

    /* Image Wrapper */
    .galeri-img-wrapper {
        position: relative;
        overflow: hidden;
        padding-top: 75%;
        /* 4:3 Aspect Ratio */
        background: #f0f0f0;
    }

    .galeri-img-wrapper img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .galeri-item:hover .galeri-img-wrapper img {
        transform: scale(1.05);
    }

    /* Overlay */
    .galeri-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 123, 255, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .galeri-item:hover .galeri-overlay {
        opacity: 1;
    }

    .galeri-overlay i {
        font-size: 2rem;
        color: white;
    }

    /* Caption */
    .galeri-caption {
        padding: 15px;
        background: white;
    }

    .galeri-caption p {
        margin: 0;
        font-size: 0.9rem;
        color: #6c757d;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Video Wrapper */
    .video-wrapper,
    .youtube-wrapper {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .video-wrapper:hover,
    .youtube-wrapper:hover {
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    }

    /* Video Player */
    .video-player {
        width: 100%;
        display: block;
        background: #000;
    }

    /* Youtube Iframe */
    .youtube-iframe {
        width: 100%;
        height: 315px;
        border: none;
        display: block;
    }

    /* Video Caption */
    .video-caption {
        padding: 15px;
        background: white;
    }

    .video-caption p {
        margin: 0;
        font-size: 0.9rem;
        color: #6c757d;
        line-height: 1.4;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .section-title {
            font-size: 1.75rem;
        }

        .nav-tabs-custom .nav-link {
            padding: 10px 20px;
            font-size: 0.9rem;
        }

        .youtube-iframe {
            height: 250px;
        }
    }

    @media (max-width: 767px) {
        .section-title {
            font-size: 1.5rem;
        }

        .nav-tabs-custom .nav-link {
            padding: 8px 15px;
            font-size: 0.85rem;
        }

        .galeri-grid>div {
            padding: 0 5px;
            margin-bottom: 10px;
        }

        .youtube-iframe {
            height: 200px;
        }
    }

    @media (max-width: 575px) {
        .nav-tabs-custom {
            flex-wrap: nowrap;
            overflow-x: auto;
        }

        .nav-tabs-custom .nav-link {
            white-space: nowrap;
        }

        .youtube-iframe {
            height: 180px;
        }
    }
</style>