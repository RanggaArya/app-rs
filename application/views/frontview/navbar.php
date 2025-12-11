<body>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector(".navbar-collapse");
    
    // Tutup menu saat klik di luar
    document.addEventListener("click", function (event) {
        if (navbar.classList.contains('show') && 
            !navbar.contains(event.target) && 
            !event.target.classList.contains("navbar-toggler")) {
            
            // Gunakan jQuery trigger jika bootstrap.Collapse native tidak jalan sempurna
            $('.navbar-collapse').collapse('hide');
        }
    });

    // Tutup menu saat resize layar ke desktop
    window.addEventListener("resize", function () {
        if (window.innerWidth > 991) {
            $('.navbar-collapse').collapse('hide');
        }
    });
});
</script>

<div class="d-none d-lg-block top-header-desktop">
   <div class="container">
      <div class="row align-items-center justify-content-between py-2">
         <div class="col-md-5 d-flex align-items-center">
            <a href="<?php echo base_url(); ?>">
               <img src="<?php echo base_url() ?>assets/frontview/img/logorsu.svg" alt="RSU Mitra Paramedika" style="height: 65px;">
            </a>
         </div>

         <div class="col-md-7 text-md-right text-center">
            <div class="contact-info">
               <span class="mr-3"><i class="fa fa-phone text-success"></i> (0274) 4461098</span>
               <span class="mr-3"><i class="fa fa-envelope text-success"></i> rsumipayk@gmail.com</span>
               <a href="https://api.whatsapp.com/send?phone=+6281229966297&text=Assalamu'alaikum Wr Wb" target="_blank" class="btn-wa-header text-success">
                  <i class="fa fa-whatsapp"></i> WhatsApp
               </a>
            </div>
         </div>
      </div>
   </div>
</div>

<a href="https://api.whatsapp.com/send?phone=6281229966297&text=Assalamu'alaikum Wr Wb" class="wa-floating" target="_blank">
    <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WA">
</a>

<a href="https://forms.gle/4tkgMcFRGE6PPT3h9" target="_blank" class="floating-btn-aduan" title="Form Pengaduan">
   <i class="lnr lnr-bubble"></i>
   <span>ADUAN</span>
</a>

<section class="nav_container sticky-top">
   <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light p-0">
         
         <a class="navbar-brand d-lg-none font-weight-bold text-white" href="<?php echo base_url(); ?>">
            RSU Mitra Paramedika
         </a>
         
         <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto navmain">
               <?php $uri = $this->uri->segment(1); ?>
               
               <li class="nav-item <?php echo ($uri == '' || $uri == 'home') ? 'active' : ''; ?>">
                  <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
               </li>
               
               <li class="nav-item dropdown <?php echo ($uri == 'profil') ? 'active' : ''; ?>">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Profil</a>
                  <div class="dropdown-menu shadow-sm border-0 mt-0">
                     <a class="dropdown-item" href="<?php echo base_url(); ?>profil/sejarah">Sejarah</a>
                     <a class="dropdown-item" href="<?php echo base_url(); ?>profil/direksi">Direksi</a>
                     <a class="dropdown-item" href="<?php echo base_url(); ?>profil/visimisi">Visi Misi</a>
                     <a class="dropdown-item" href="<?php echo base_url(); ?>profil/pmkp">PMKP</a>
                     <a class="dropdown-item" href="<?php echo base_url(); ?>profil/rekanan">Rekanan</a>
                     <a class="dropdown-item" href="<?php echo base_url(); ?>profil/prestasi">Prestasi</a>
                  </div>
               </li>

               <li class="nav-item dropdown <?php echo ($uri == 'fasilitas') ? 'active' : ''; ?>">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Fasilitas</a>
                  <div class="dropdown-menu shadow-sm border-0 mt-0">
                     <a class="dropdown-item" href="<?php echo base_url(); ?>fasilitas/layanan">Layanan Medis</a>
                     <a class="dropdown-item" href="<?php echo base_url(); ?>fasilitas/penunjang">Layanan Penunjang Medis</a>
                     <a class="dropdown-item" href="<?php echo base_url(); ?>fasilitas/pendukung">Layanan Pendukung Lainnya</a>
                  </div>
               </li>

               <li class="nav-item <?php echo ($uri == 'galeri') ? 'active' : ''; ?>">
                  <a class="nav-link" href="<?php echo base_url(); ?>galeri">Galeri</a>
               </li>

               <li class="nav-item <?php echo ($uri == 'artikel') ? 'active' : ''; ?>">
                  <a class="nav-link" href="<?php echo base_url(); ?>artikel">Artikel</a>
               </li>

               <li class="nav-item dropdown <?php echo ($uri == 'informasi' || $uri == 'hakkewajiban' || $uri == 'diklat') ? 'active' : ''; ?>">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Informasi</a>
                  <div class="dropdown-menu shadow-sm border-0 mt-0">
                     <a class="dropdown-item" href="<?php echo base_url(); ?>profil/dokter">Jadwal & Daftar Dokter</a>
                     <a class="dropdown-item" href="<?php echo base_url(); ?>hakkewajiban">Hak dan Kewajiban Pasien</a>
                     <a class="dropdown-item" href="<?php echo base_url(); ?>diklat">Pendidikan dan Pelatihan</a>
                  </div>
               </li>

               <li class="nav-item <?php echo ($uri == 'karir') ? 'active' : ''; ?>">
                  <a class="nav-link" href="<?php echo base_url(); ?>karir">Karir</a>
               </li>

               <li class="nav-item <?php echo ($uri == 'kontak') ? 'active' : ''; ?>">
                  <a class="nav-link" href="<?php echo base_url(); ?>kontak">Kontak</a>
               </li>
            </ul>

            <form method="GET" action="<?php echo base_url(); ?>blog/blog_content_list_search" class="form-inline my-2 my-lg-0 ml-3 pb-2 pb-lg-0">
               <div class="input-group search-modern w-100">
                  <input name="keyword" class="form-control border-right-0" type="search" placeholder="Cari info..." style="border-radius: 20px 0 0 20px; font-size: 0.9rem;">
                  <div class="input-group-append">
                     <button class="btn border-left-0 bg-white" type="submit" style="border-radius: 0 20px 20px 0; border: 1px solid #ced4da;">
                        <i class="fa fa-search text-success"></i>
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </nav>
   </div>
</section>


<style>
/* =========================================
   APPLE STYLE + NEUMORPHISM NAVBAR DESKTOP
========================================= */

@media (min-width: 992px) {

    /* ==========================
       NAVBAR GLASS CONTAINER
    =========================== */
    .nav_container {
        background: rgba(255, 255, 255, 0.65);
        backdrop-filter: saturate(180%) blur(40px);
        -webkit-backdrop-filter: saturate(180%) blur(40px);
        padding: 10px 0;
        /*border-radius: 0 0 20px 20px;*/
        border-bottom: 1px solid rgba(255,255,255,0.28);
        box-shadow:
            0 10px 20px rgba(0,0,0,0.08),
            0 4px 8px rgba(0,0,0,0.06);
        transition: 0.3s ease;
    }


    /* ==========================
       NAV LINKS
    =========================== */
    .navmain .nav-link {
        color: #ffffff !important;
        font-weight: 600;
        font-size: 0.97rem;
        padding: 20px 20px !important;
        border-radius: 12px;
        position: relative;
        transition: all 0.25s cubic-bezier(.4,0,.2,1);
    }

    .navmain .nav-link:hover,
    .navmain .nav-item.active .nav-link {
        color: #0e9658 !important;
        transform: translateY(-3px);
    
        /* lebih solid + blur diperkuat */
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(70px);
        -webkit-backdrop-filter: blur(80px);
    
        box-shadow:
            0 4px 14px rgba(46, 204, 113, 0.35),
            inset 0 0 10px rgba(46, 204, 113, 0.12);
    }



    /* ==========================
       UNDERLINE APPLE STYLE
    =========================== */
    .navmain .nav-link::after {
        content: "";
        position: absolute;
        bottom: 6px;
        left: 50%;
        width: 0;
        height: 3px;
        background: #2ecc71;
        border-radius: 50px;
        transform: translateX(-50%);
        transition: width 0.25s ease, opacity 0.25s ease;
        opacity: 0;
        pointer-events: none;
    }

    .navmain .nav-link:hover::after,
    .navmain .nav-item.active .nav-link::after {
        width: 50%;
        opacity: 1;
    }


    /* ================================================
       FIX CARET PREMIUM — TIDAK TABRAKAN DENGAN TEKS
       caret pindah ke ::before, bukan ::after
    ================================================= */
    .navmain .dropdown-toggle {
        position: relative;
        padding-right: 28px !important; /* space buat panah */
    }

    .navmain .dropdown-toggle::before {
        content: "";
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        border-top: .45em solid #ffffff;
        border-left: .35em solid transparent;
        border-right: .35em solid transparent;
        transition: 0.25s ease;
    }

    /* caret rotate saat dropdown terbuka */
    .navmain .show > .dropdown-toggle::before {
        transform: translateY(-50%) rotate(180deg);
        border-top-color: #1a1a1a;
    }

    /* Hapus underline Apple hanya untuk dropdown */
    /*.navmain .dropdown-toggle::after {*/
    /*    display: none !important;*/
    /*}*/

    /* =====================================
       PREMIUM NEUMORPHIC DARKER GREEN GLASS
    ===================================== */
    .dropdown-menu {
        min-width: 200px;
        border: 2px solid rgba(255, 255, 255, 0.4);
        border-radius: 18px;
        padding: 12px 0;
    
        /* Lebih gelap & tidak tembus */
        background: rgba(120, 200, 150, 0.90); /* darker soft green */
        
        /* Blur diperkuat */
        backdrop-filter: blur(60px) saturate(180%);
        -webkit-backdrop-filter: blur(60px) saturate(180%);
    
        /* Neumorphism shadow */
        box-shadow:
            10px 10px 22px rgba(0,0,0,0.18),
            -6px -6px 18px rgba(255,255,255,0.55),
            inset 0 0 12px rgba(255,255,255,0.15);
    
        animation: dropFade 0.25s ease;
        transform-origin: top center;
    }


    @keyframes dropFade {
        0%   { opacity: 0; transform: translateY(5px) scale(0.96); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }


    /* ===========================================
       DROPDOWN ITEMS
    ============================================ */
    .dropdown-item {
        padding: 12px 20px;
        font-weight: 600;
        font-size: 0.9rem;
        color: #ffffff !important;
        border-radius: 10px;
        transition: 0.25s ease;
    }

    .dropdown-item:hover {
        background: rgba(255,255,255,0.72);
        box-shadow:
            inset 6px 6px 12px rgba(0,0,0,0.05),
            inset -6px -6px 12px rgba(255,255,255,0.9);
        color: #0e9658 !important;
        transform: translateX(6px);
    }
    
    /* ===========================================
       UNDERLINE APPLE STYLE UNTUK DROPDOWN ITEM
    =========================================== */
    .dropdown-item {
        position: relative;
        overflow: hidden; /* biar garis tidak keluar */
    }
    
    .dropdown-item::after {
        content: "";
        position: absolute;
        bottom: 8px; /* sedikit naik biar tidak mentok */
        left: 50%;
        transform: translateX(-50%);
        width: 0%;
        height: 2px;
    
        background: #0e9658; /* warna hijau Apple */
        border-radius: 50px;
        opacity: 0;
    
        transition: width 0.25s ease, opacity 0.25s ease;
    }
    
    .dropdown-item:hover::after,
    .dropdown-item.active::after {
        width: 45%;
        opacity: 1;
    }

}

   /* =========================================
   B. MOBILE STYLES (Max Width 991px) - PREMIUM
   ========================================= */
    @media (max-width: 991px) {
        
        /* --- Background Navbar: Glass Gradient --- */
        .nav_container {
            background: linear-gradient(
                135deg,
                rgba(46, 139, 87, 0.90),
                rgba(120, 200, 120, 0.55)
            );
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            border-radius: 0 0 18px 18px;
            padding: 4px 0;
            transition: all .3s ease;
        }
    
        /* Navbar lebih clean */
        .navbar, .navbar-light {
            background: transparent !important;
            padding: 10px 5px !important;
        }
    
        /* Brand: Putih + Glow halus */
        .navbar-brand {
            color: #ffffff !important;
            font-weight: 700;
            font-size: 1.25rem;
            letter-spacing: .5px;
            text-shadow: 0 2px 6px rgba(0,0,0,0.25);
            animation: fadeDown .6s ease-out;
        }
    
        /* Toggler: Modern white outline */
        .custom-toggler {
            border: 2px solid rgba(255,255,255,0.7) !important;
            padding: 6px 10px;
            border-radius: 10px;
            transition: .3s;
            backdrop-filter: blur(3px);
        }
        .custom-toggler:active {
            transform: scale(.9);
        }
    
        /* Icon toggler putih */
        .custom-toggler .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 1)' stroke-width='2' stroke-linecap='round' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E") !important;
        }
    
        /* --- Menu Setelah Dibuka --- */
        .navbar-collapse {
            background: linear-gradient(
                135deg,
                rgba(50, 120, 80, 0.95),
                rgba(130, 210, 130, 0.55)
            );
            width: 88% !important;          /* Lebih kecil */
            margin-left: auto !important;   /* Geser ke kanan */
            margin-right: 0 !important;
            margin-top: 8px !important;     /* Naikin sedikit */
            padding: 12px !important;       /* Perkecil padding */
            border-radius: 14px !important; /* Sedikit lebih kecil */
            border: 1px solid rgba(255,255,255,0.1);
            box-shadow: 0 8px 25px rgba(0,0,0,0.18);
            animation: fadeSlide .4s ease-out;
        }
    
        /* --- Menu Items --- */
        .navmain .nav-link {
            color: #ffffff !important;
            padding: 10px 12px !important;
            border-bottom: 1px solid rgba(255,255,255,0.12);
            border-radius: 8px;
            transition: .3s ease;
            font-size: 0.95rem;
            backdrop-filter: blur(2px);
        }
    
        .navmain .nav-link:hover,
        .navmain .nav-item.active .nav-link {
            background: rgba(255,255,255,0.20);
            color: #fff !important;
            padding-left: 22px !important;
            transform: translateX(4px);
        }
        .navmain .nav-item:last-child .nav-link {
            border-bottom: none;
        }
    
        /* --- Dropdown Mobile --- */
        .dropdown-menu {
            background: rgba(255,255,255,0.10);
            backdrop-filter: blur(10px);
            width: 85% !important;
            margin-left: auto !important;
            margin-right: 0 !important;
            border-radius: 12px !important;
            padding: 6px 8px !important;
            border: 1px solid rgba(255,255,255,0.15);
            animation: fadeSlide .4s ease-out;
        }
    
        .dropdown-item {
            color: #e2ffe0 !important;
            padding: 10px 12px !important;
            font-size: 0.9rem !important;
            border-radius: 8px !important;
            transition: .25s;
        }
    
        .dropdown-item:hover {
            background: rgba(255,255,255,0.28);
            color: #ffffff !important;
            transform: translateX(6px);
        }
    
        /* === Animations === */
        @keyframes fadeSlide {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    
        @keyframes fadeDown {
            from { opacity: 0; transform: translateY(-6px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    }


   /* =========================================
      C. FLOATING BUTTONS
      ========================================= */
   
   /* Floating Aduan */
   .floating-btn-aduan {
       position: fixed;
       bottom: 100px;
       right: 20px;
       z-index: 9999;
       background: linear-gradient(135deg, #66bb6a 0%, #2e7d32 100%);
       color: white !important;
       width: 65px;
       height: 65px;
       border-radius: 50%;
       display: flex;
       flex-direction: column;
       align-items: center;
       justify-content: center;
       box-shadow: 0 5px 15px rgba(0,0,0,0.3);
       transition: transform 0.3s;
       text-decoration: none;
       animation: pulse-green 2s infinite;
   }
   .floating-btn-aduan i { font-size: 24px; margin-bottom: 2px; }
   .floating-btn-aduan span { font-size: 9px; font-weight: 800; letter-spacing: 0.5px; }
   .floating-btn-aduan:hover { transform: scale(1.1); }

   /* Floating WA */
   .wa-floating {
       position: fixed;
       bottom: 25px;
       right: 20px;
       background: #25D366;
       width: 60px;
       height: 60px;
       z-index: 9999;
       border-radius: 50%;
       display: flex;
       justify-content: center;
       align-items: center;
       box-shadow: 0 4px 12px rgba(0,0,0,0.3);
       animation: pulse-green 2s infinite;
       transition: transform 0.3s;
   }
   .wa-floating:hover { transform: scale(1.1); }
   .wa-floating img { width: 35px; }

   @keyframes pulse-green {
       0% { box-shadow: 0 0 0 0 rgba(102, 187, 106, 0.7); }
       70% { box-shadow: 0 0 0 15px rgba(102, 187, 106, 0); }
       100% { box-shadow: 0 0 0 0 rgba(102, 187, 106, 0); }
   }
   
   /* =========================================
   D. ENTRANCE ANIMATION (POWERPOINT STYLE)
   ========================================= */

    /* 1. Definisikan Gerakan (Keyframes) */
    @keyframes slideInDownFade {
        0% {
            opacity: 0;
            transform: translateY(-30px); /* Mulai dari atas sedikit */
        }
        100% {
            opacity: 1;
            transform: translateY(0); /* Posisi normal */
        }
    }
    
    @keyframes fadeInScale {
        0% {
            opacity: 0;
            transform: scale(0.8);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    /* 2. Terapkan Animasi hanya di Desktop */
    @media (min-width: 992px) {
        
        /* A. Animasi Logo (Muncul Pertama) */
        .navbar-brand img {
            opacity: 0; /* Sembunyikan awal */
            animation: fadeInScale 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            animation-delay: 0.1s;
        }
    
        /* B. Animasi Item Menu (Muncul Berurutan) */
        .navmain .nav-item {
            opacity: 0; /* Sembunyikan awal */
            animation: slideInDownFade 0.6s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
        }
    
        /* C. Search Bar (Muncul Terakhir) */
        .search-modern {
            opacity: 0;
            animation: slideInDownFade 0.6s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            animation-delay: 1s; /* Paling lambat */
        }
    
        /* --- PENGATURAN JEDA WAKTU (STAGGER) --- 
           Ini yang bikin efek "Satu per satu" */
        
        /* Home */
        .navmain .nav-item:nth-child(1) { animation-delay: 0.2s; }
        
        /* Profil */
        .navmain .nav-item:nth-child(2) { animation-delay: 0.3s; }
        
        /* Fasilitas */
        .navmain .nav-item:nth-child(3) { animation-delay: 0.4s; }
        
        /* Galeri */
        .navmain .nav-item:nth-child(4) { animation-delay: 0.5s; }
        
        /* Artikel */
        .navmain .nav-item:nth-child(5) { animation-delay: 0.6s; }
        
        /* Informasi */
        .navmain .nav-item:nth-child(6) { animation-delay: 0.7s; }
        
        /* Karir */
        .navmain .nav-item:nth-child(7) { animation-delay: 0.8s; }
        
        /* Kontak */
        .navmain .nav-item:nth-child(8) { animation-delay: 0.9s; }
    }
    
    /* 3. Animasi Mobile (Sederhana saja agar ringan) */
    @media (max-width: 991px) {
        .navbar-brand, .custom-toggler {
            animation: slideInDownFade 0.8s ease-out;
        }
    }
    
/* =======================================================
   E. ANIMASI KHUSUS HEADER ATAS & LOGO (SEQUENCE LENGKAP)
   ======================================================= */

    @media (min-width: 992px) {
    
        /* --- 1. TOP HEADER (Bagian Paling Atas) --- */
        
        /* Logo/Teks "RSU Mitra..." di Kiri Atas */
        .top-header-desktop .col-md-5 {
            opacity: 0;
            animation: slideInDownFade 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            animation-delay: 0s; /* Muncul paling pertama (Instan) */
        }
    
        /* Kontak Info: Telpon */
        .contact-info span:nth-child(1) {
            opacity: 0;
            display: inline-block; /* Agar transform bekerja */
            animation: slideInDownFade 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            animation-delay: 0.1s; /* Jeda dikit */
        }
    
        /* Kontak Info: Email */
        .contact-info span:nth-child(2) {
            opacity: 0;
            display: inline-block;
            animation: slideInDownFade 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            animation-delay: 0.2s;
        }
    
        /* Tombol WA Header */
        .btn-wa-header {
            opacity: 0;
            animation: slideInDownFade 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            animation-delay: 0.3s;
        }
    
    
        /* --- 2. LOGO UTAMA (Di Navbar Putih) --- */
        
        /* Kita pakai efek 'Scale' (Zoom In) biar beda dengan teks */
        .navbar-brand img {
            opacity: 0;
            /* Menggunakan animasi fadeInScale yang sudah didefinisikan sebelumnya */
            animation: fadeInScale 0.9s cubic-bezier(0.34, 1.56, 0.64, 1) forwards; 
            /* Efek 'bouncing' sedikit saat zoom in */
            animation-delay: 0.1s; 
        }
    
    
        /* --- 3. KOREKSI URUTAN MENU (Agar tidak balapan) --- */
        /* Kita geser waktu delay menu sedikit agar Logo & Kontak selesai dulu */
        
        .navmain .nav-item:nth-child(1) { animation-delay: 0.3s; }
        .navmain .nav-item:nth-child(2) { animation-delay: 0.4s; }
        .navmain .nav-item:nth-child(3) { animation-delay: 0.5s; }
        .navmain .nav-item:nth-child(4) { animation-delay: 0.6s; }
        .navmain .nav-item:nth-child(5) { animation-delay: 0.7s; }
        .navmain .nav-item:nth-child(6) { animation-delay: 0.8s; }
        .navmain .nav-item:nth-child(7) { animation-delay: 0.9s; }
        .navmain .nav-item:nth-child(8) { animation-delay: 1.0s; }
        
        .search-modern { animation-delay: 1.1s; }
    }
</style>