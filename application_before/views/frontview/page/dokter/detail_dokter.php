<section class="breadcrumbs_custom">
    <div class="container breadcrumbs_custom">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('profil#dokter'); ?>">Dokter</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $detail->nama; ?></li>
            </ol>
        </nav>
    </div>
</section>

<div class="container text-center py-5">

    <div class="doctor-detail-banner modern-shadow">
        <div class="icon">
            <i class="fa fa-user-md"></i>
        </div>
        <div>
            <h2 class="doctor-detail-name"><?php echo $detail->nama; ?></h2>
            <!--<?php if (!empty($detail->divisi)): ?>-->
            <!--    <small class="doctor-detail-sub-rev">Divisi: <?php echo $detail->divisi; ?></small>-->
            <!--<?php endif; ?>-->
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            <div class="doctor-detail-desc modern-card p-4">
                <?php echo $detail->deskripsi; ?>
            </div>

            <br>

            <?php
                $wa = $detail->wa ?? '+6281229966297';
                $pesan = urlencode("Halo, saya ingin mendaftar konsultasi dengan Dr. " . $detail->nama);
            ?>
            <a href="https://wa.me/<?php echo $wa; ?>?text=<?php echo $pesan; ?>"
                target="_blank" class="btn btn-success btn-lg doctor-wa-btn modern-wa-btn">
                <i class="fa fa-whatsapp"></i> Hubungi via WhatsApp
            </a>

        </div>
    </div>

</div>


<style>
/* CONTAINER & GENERAL STYLING */
body {
    background-color: #f8f9fa;
}

.modern-shadow {
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); 
}

/* BANNER HEADER DETAIL */
.doctor-detail-banner {
    /* Gradien baru yang lebih modern dan kalem */
    background: linear-gradient(90deg, #00a89d, #2fb89b);
    color: #fff;
    padding: 22px 30px;
    border-radius: 12px;
    margin-bottom: 40px;
    /* Perubahan utama untuk simetris dan rata tengah */
    display: flex; /* Ganti dari inline-flex */
    align-items: center; /* Menyelaraskan secara vertikal */
    justify-content: center; /* Menengahkan banner di dalam container */
    /* Akhir Perubahan */
    gap: 16px;
    text-align: left;
}

.doctor-detail-banner .icon {
    width: 55px; 
    height: 55px;
    border-radius: 50%;
    background: rgba(255,255,255,0.25); 
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px; 
}

.doctor-detail-name {
    margin: 0;
    font-size: 1.8rem; 
    font-weight: 900; 
    text-transform: uppercase;
    letter-spacing: 1px;
}

.doctor-detail-sub-rev {
    display: block;
    margin-top: 2px;
    font-size: 0.95rem;
    font-weight: 500;
    opacity: 0.9;
}


/* DESKRIPSI (Diberi Card Styling) */
.modern-card {
    background: #ffffff;
    border-radius: 14px;
    border: 1px solid #e9ecef; 
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

.doctor-detail-desc {
    font-size: 17px; 
    line-height: 1.85; 
    color: #34495e; 
    text-align: justify;
}

/* AGAR FOTO DI DESKRIPSI TIDAK GEPENG/MELEBAR */
.doctor-detail-desc img {
    max-width: 100% !important;
    height: auto !important;
    border-radius: 10px;
    margin: 15px auto;
    display: block;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

/* TOMBOL WA */
.modern-wa-btn {
    background-color: #25d366; 
    border-color: #25d366;
    padding: 14px 30px;
    font-size: 1.1rem;
    font-weight: 700;
    border-radius: 12px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.modern-wa-btn:hover {
    background-color: #128c7e;
    border-color: #128c7e;
    transform: translateY(-2px); /* Efek hover modern */
}

/* MEDIA QUERIES (RESPONSIVITAS) */
@media(max-width: 768px) {
    .doctor-detail-banner {
        flex-direction: column;
        padding: 25px;
        text-align: center;
    }
    .doctor-detail-name {
        font-size: 1.5rem;
    }
    .doctor-detail-banner .icon {
        margin-bottom: 5px;
    }
    .modern-wa-btn {
        width: 100%; /* Tombol WA full-width di mobile */
    }
}
</style>

