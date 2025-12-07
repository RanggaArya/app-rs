<section class="breadcrumbs_custom">
    <div class="container breadcrumbs_custom">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Layanan Penunjang</li>
          </ol>
    </div>
</nav>  
</section>
<section class="section_three">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <center><h4 class="section_three_head">Layanan Kami</h4></center>
            </div>  
        </div>
        <br/>
        <br/>
        <div class="row layananpenunjang_container">
           
        </div>
</section>


<style>
/* 1. FONT IMPORT (Tambahkan ini jika belum ada di header global) */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap');

/* 2. GENERAL STYLING & BACKGROUND */
body {
    /* Font bersih dan modern */
    font-family: 'Poppins', sans-serif;
    /* Background sangat lembut, untuk kesan estetik */
    background-color: #f8f9fa; 
    color: #343a40; /* Warna teks utama */
}

/* 3. BREADCRUMBS STYLING */
.breadcrumbs_custom {
    background-color: #ffffff;
    padding: 18px 0;
    border-bottom: 1px solid #e9ecef;
}

.breadcrumbs_custom .breadcrumb {
    margin-bottom: 0;
}

.breadcrumbs_custom .breadcrumb-item a {
    color: #6c757d;
    text-decoration: none;
    transition: color 0.3s;
}

.breadcrumbs_custom .breadcrumb-item a:hover {
    color: #007bff;
}

.breadcrumbs_custom .breadcrumb-item.active {
    color: #343a40;
    font-weight: 600;
}

/* 4. SECTION DAN JUDUL UTAMA (LAYANAN KAMI) */
.section_three {
    padding: 70px 0 80px 0; 
}

.section_three_head {
    /* Judul yang kuat */
    font-size: 2.5rem;
    font-weight: 800;
    color: #1a1a2e; /* Warna gelap yang tegas */
    position: relative;
    padding-bottom: 15px;
    display: inline-block;
}

.section_three_head::after {
    /* Underline estetik dengan warna aksen */
    content: '';
    display: block;
    width: 70px;
    height: 5px;
    background: linear-gradient(90deg, #007bff, #28a745); /* Gradien biru dan hijau */
    margin: 8px auto 0;
    border-radius: 50px;
}

/* 5. LAYANAN CONTAINER (Layout untuk Card Layanan) */
.layananpenunjang_container {
    /* Mengaktifkan Flexbox/Grid untuk tata letak card yang rapi. 
       Saya asumsikan Anda akan menambahkan kolom Bootstrap di sini, 
       jadi kita tambahkan sedikit jarak vertikal dan penengah (jika hanya 1 baris) */
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Untuk menengahkan card jika tidak full-width */
    gap: 30px 20px; /* Jarak antar card */
    margin-top: 30px;
}

/* 6. CONTOH STYLING UNTUK CARD LAYANAN (Anda harus menerapkan class ini pada setiap layanan di dalam .layananpenunjang_container) */
/*
Jika Anda menambahkan struktur HTML seperti:
<div class="col-md-4">
    <div class="service-card-modern">
        <i class="fas fa-microscope"></i>
        <h5>Laboratorium</h5>
        <p>Deskripsi singkat...</p>
    </div>
</div>
*/
.service-card-modern {
    background: #ffffff;
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05); /* Bayangan lembut dan modern */
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    border: 1px solid #f0f0f0; /* Border sangat halus */
    min-height: 250px; /* Contoh tinggi minimum */
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.service-card-modern:hover {
    transform: translateY(-8px); /* Efek lift-up keren saat hover */
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
}

.service-card-modern i {
    font-size: 3.5rem; /* Icon besar */
    color: #007bff; /* Warna aksen utama */
    margin-bottom: 15px;
}

.service-card-modern h5 {
    color: #28a745; /* Warna aksen sekunder */
    font-weight: 700;
    margin-bottom: 10px;
    font-size: 1.3rem;
}

/* MEDIA QUERIES (Responsivitas) */
@media (max-width: 768px) {
    .section_three {
        padding: 50px 0 60px 0;
    }
    .section_three_head {
        font-size: 2rem;
    }
    .layananpenunjang_container {
        gap: 20px;
    }
}
</style>