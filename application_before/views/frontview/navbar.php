<body>
   <div class="container">
      <div class="row align-items-center justify-content-between" id="navcontainer" style="padding: 10px 0;">
         <!-- Logo & Title -->
         <div class="col-md-6 d-flex align-items-center">
            <a href="<?php echo base_url(); ?>">
               <img src="<?php echo base_url() ?>assets/frontview/img/logorsu.svg"
                  class="logo_main" style="height: 120px; margin-right: 15px;">
            </a>
         </div>

         <!-- Kontak -->
         <div class="col-md-6 text-md-right text-center">
            <div style="margin-bottom: 5px;">
               <span style="margin-right: 15px;">
                  <i class="lnr lnr-phone-handset"></i> Phone: (0274) 4461098
               </span>
               <span style="margin-right: 15px;">
                  <i class="lnr lnr-envelope"></i> rsumipayk@gmail.com
               </span>
               <a href="https://api.whatsapp.com/send?phone=+6281928529335&text=Assalamu'alaikum Wr Wb"
                  target="_blank"
                  class="btn btn-success btn-sm"
                  style="padding: 5px 10px; font-size: 14px;">
                  <img src="<?= base_url(); ?>assets/frontview/img/wa.png" style="height: 16px; margin-right: 5px;">
                  WhatsApp
               </a>
            </div>
         </div>
      </div>
   </div>

   <!-- Floating Button Aduan - Di atas Smartsupp Chat -->
   <a href="https://forms.gle/4tkgMcFRGE6PPT3h9" target="_blank" class="floating-btn-aduan" title="Form Pengaduan">
      <i class="lnr lnr-bubble"></i>
      <span>ADUAN</span>
   </a>

   <section class="nav_container">
      <div class="container">
         <nav class="navbar navbar-expand-lg navbar-light bg-light navbar_custom">
            <a href="<?php echo base_url(); ?>"><span id="logo_mobile">RSU Mitra Paramedika</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto navmain">
                  <li class="nav-item active">
                     <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profil
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url(); ?>profil/sejarah">Sejarah</a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>profil/direksi">Direksi</a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>profil/visimisi">Visi Misi</a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>profil/pmkp">PMKP</a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>profil/rekanan">Rekanan</a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>profil/prestasi">Prestasi</a>

                     </div>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Fasilitas
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url(); ?>fasilitas/layanan">Layanan Medis</a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>fasilitas/penunjang">Layanan Penunjang
                           Medis</a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>fasilitas/pendukung">Layanan Pendukung
                           Lainnya</a>
                     </div>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url(); ?>galeri">Galeri <span class="sr-only"></span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url(); ?>artikel">Artikel <span
                           class="sr-only"></span></a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Informasi
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo base_url(); ?>profil/dokter">Jadwal & Daftar Dokter</a>
                        <!--<a class="dropdown-item" href="<?php echo base_url(); ?>jadwaldokter">Jadwal Dokter </a>-->
                        <!--<a class="dropdown-item" href="<?php echo base_url(); ?>daftarpasien">Daftar Pasien</a>-->
                        <a class="dropdown-item" href="<?php echo base_url(); ?>hakkewajiban">Hak dan Kewajiban
                           Pasien</a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>diklat">Pendidikan dan Pelatihan</a>
                     </div>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url(); ?>karir">Karir <span class="sr-only"></span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url(); ?>kontak">Kontak <span class="sr-only"></span></a>
                  </li>

               </ul>
               <form method="GET" action="<?php echo base_url(); ?>/blog/blog_content_list_search">
                  <div style:display:flex; class="searchings">
                     <input name="keyword" style="padding-left:5px;" class="search_inputs" type="text" id="search_input"
                        placeholder="Cari Informasi">
                     <input class="search_btn" type="submit" value="Cari">
                  </div>
               </form>
            </div>
         </nav>
      </div>
   </section>

   <style>
   .navbar-light .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='white' stroke-width='3' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E") !important;
    }
    
    .navbar-toggler {
        border-color: white !important;
    }
      /* Floating Aduan Button - Positioned above Smartsupp Chat */
      .floating-btn-aduan {
         position: fixed;
         bottom: 110px;
         right: 20px;
         z-index: 9998;
         background: linear-gradient(135deg, #7cb342 0%, #558b2f 100%);
         color: white;
         width: 80px;
         height: 80px;
         border-radius: 50%;
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: center;
         text-decoration: none;
         box-shadow: 0 4px 15px rgba(124, 179, 66, 0.4);
         transition: all 0.3s ease;
      }

      .floating-btn-aduan i {
         font-size: 30px;
         margin-bottom: 2px;
      }

      .floating-btn-aduan span {
         font-size: 12px;
         font-weight: 700;
         letter-spacing: 1px;
      }

      .floating-btn-aduan:hover {
         background: linear-gradient(135deg, #558b2f 0%, #33691e 100%);
         transform: scale(1.1);
         box-shadow: 0 6px 20px rgba(124, 179, 66, 0.6);
         color: white;
         text-decoration: none;
      }

      .floating-btn-aduan:active {
         transform: scale(0.95);
      }

      /* Animasi bounce */
      @keyframes bounce {

         0%,
         20%,
         50%,
         80%,
         100% {
            transform: translateY(0);
         }

         40% {
            transform: translateY(-8px);
         }

         60% {
            transform: translateY(-4px);
         }
      }

      .floating-btn-aduan {
         animation: bounce 2s infinite;
      }

      .floating-btn-aduan:hover {
         animation: none;
      }

      /* Responsive */
      @media (max-width: 768px) {
         .floating-btn-aduan {
            bottom: 100px;
            right: 15px;
            width: 70px;
            height: 70px;
         }

         .floating-btn-aduan i {
            font-size: 28px;
         }

         .floating-btn-aduan span {
            font-size: 11px;
         }
      }

      /* Adjust Smartsupp position if needed */
      #chat-application {
         bottom: 20px !important;
         right: 20px !important;
      }
   </style>