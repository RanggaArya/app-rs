<section class="breadcrumbs_custom">
    <div class="container breadcrumbs_custom">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dokter</li>
            </ol>
        </nav>
    </div>
</section>

<br>

<section class="section_four_two">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 text-center">
                
                <ul class="nav nav-tabs justify-content" id="myTab" role="tablist" style="margin-bottom:20px;">
                    <li class="nav-item">
                        <a class="nav-link active" id="image-tab" data-toggle="tab" href="#image" role="tab" aria-controls="image" aria-selected="true">Jadwal Dokter</a>
                    </li>
                </ul>
                
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="image" role="tabpanel" aria-labelledby="image-tab">
                        <div class="row justify-content-center">
                            <?php 
                                if (!empty($jadwaldokter)) {
                                    foreach($jadwaldokter as $list){ ?>

                                    <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12 image_container mb-4" style="cursor:pointer !important;">
                                        <div class="card image_galeri_container elegant-frame" style="cursor:pointer;">
                                            <a  href="<?php echo base_url()?>assets/jadwaldokter/<?php echo $list->image_name;?>" data-toggle="lightbox">
                                                <img style="cursor:pointer;" class="img-fluid framed-image" src="<?php echo base_url()?>assets/jadwaldokter/<?php echo $list->image_name;?>" alt="/<?php echo $list->image_name;?>">
                                            </a>
                                            <div class="card-body">
                                                <p class="card-text"><?php echo $list->caption;?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php } 
                                } else { ?>
                                    <div class="col-12">
                                        <p>Tidak ada poster jadwal dokter.</p>
                                    </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section_four_two">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">

                <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom:10px;">
                    <li class="nav-item">
                        <a class="nav-link active" id="image-tab" data-toggle="tab" href="#image" role="tab" aria-controls="image">
                            Daftar Dokter
                        </a>
                    </li>
                </ul>

                <div class="row">
                    <?php foreach ($daftar as $list) { ?>

                        <?php
                        $getformat = explode('.', $list->thumb);
                        if (@$getformat[1] == 'png' || @$getformat[1] == 'jpg' || @$getformat[1] == 'jpeg') {
                        ?>
                        <?php } ?>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="section_four_two">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">

                <?php foreach ($daftar as $list) { ?>

                    <div class="doctor-card-modern text-center">

                        <div class="doctor-header justify-content-center">
                            <div class="doctor-header-icon">
                                <i class="fa fa-user-md"></i>
                            </div>
                            <div>
                                <h5 class="doctor-header-name"><?php echo $list->nama; ?></h5>
                            </div>
                        </div>

                        <div class="doctor-body flex-column align-items-center">

                            <div class="doctor-photo-wrap">

                                <?php 
                                    $thumb = !empty($list->thumb)
                                        ? base_url('assets/profil/thumb/' . $list->thumb)
                                        : base_url('assets/profil/thumb.png');
                                ?>

                                <img src="<?php echo $thumb; ?>" 
                                    class="doctor-photo"
                                    style="cursor:pointer"
                                    data-toggle="modal"
                                    data-target="#fotoModal_<?php echo $list->id; ?>">
                            </div>

                            <div class="modal fade" id="fotoModal_<?php echo $list->id; ?>" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="border-radius:10px;">
                                        <div class="modal-body p-0">
                                            <img src="<?php echo $thumb; ?>" 
                                                class="img-fluid w-100" 
                                                style="border-radius:10px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="doctor-buttons center-buttons">

                                <a href="<?php echo base_url('profil/detail/' . $list->slug . '/dokter'); ?>" 
                                    class="btn btn-info doctor-btn">
                                    <i class="fa fa-user"></i> Detail
                                </a>

                                <?php 
                                    $wa = $list->wa ?? '+6281229966297';
                                    $pesan = urlencode("Halo, saya ingin mendaftar konsultasi dengan Dr. ".$list->nama);
                                ?>
                                <a href="https://wa.me/<?php echo $wa; ?>?text=<?php echo $pesan; ?>" 
                                    target="_blank" 
                                    class="btn btn-success doctor-btn">
                                    <i class="fa fa-whatsapp"></i> Daftar
                                </a>

                            </div>

                        </div>

                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</section>


<style>
/* Style baru untuk Bingkai Jadwal Dokter yang Modern dan Elegan */
.elegant-frame {
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15); /* Bayangan yang lebih lembut dan elegan */
    transition: transform 0.3s, box-shadow 0.3s;
    background: #ffffff; /* Latar belakang putih */
    padding: 10px; /* Sedikit padding di dalam kartu */
    border: 1px solid #e0e0e0; /* Garis tipis */
}

.elegant-frame:hover {
    transform: translateY(-5px); /* Efek angkat saat dihover */
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.framed-image {
    border-radius: 8px; /* Sudut melengkung untuk gambar di dalam bingkai */
    /* Opsional: Jika ingin ada border dalam gambar */
    /* border: 2px solid #f0f0f0; */
}

/* Penyesuaian Style Dokter (tetap sama) */
.doctor-card-modern {
    border-radius:12px;
    box-shadow:0 2px 10px rgba(0,0,0,0.08);
    background:#fff;
    margin-bottom:24px;
    overflow:hidden;
    text-align:center;
}

.doctor-header {
    background:linear-gradient(90deg,#2fb89b,#2ba7a0);
    padding:18px;
    color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
}

.doctor-header-icon {
    width:48px;height:48px;
    border-radius:50%;
    background:rgba(255,255,255,0.2);
    display:flex;align-items:center;justify-content:center;
    margin-right:15px;
    font-size:22px;
}

.doctor-body {
    padding:20px;
    display:flex;
    flex-direction:column;
    align-items:center;
}

.doctor-photo {
    width:150px;height:150px;
    border-radius:14px;
    object-fit:cover;
    background:#eee;
    transition:0.2s;
}

.doctor-photo:hover {
    transform:scale(1.03);
}

.center-buttons {
    display:flex;
    flex-direction:row;
    justify-content:center;
    gap:15px;
    margin-top:20px;
}

.doctor-btn {
    min-width:160px;
    font-weight:600;
    border-radius:8px;
}

@media(max-width:768px){
    .center-buttons {flex-direction:column;width:100%}
    .doctor-btn {width:100%}
}

</style>