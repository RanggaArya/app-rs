<div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <!-- <a class="navbar-brand" href="index.html">Concept</a> -->
                <center><a href="<?php echo base_url();?>"><img style="height:70px;padding-left:20px;" src="<?php echo base_url();?>assets/frontview/img/logorsu.svg" alt=""></a></center>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown notification">
                            <a class="nav-link active btn-primary" href="<?php echo base_url(); ?>" target="_blank"><i class="fa fa-fw fa-angle-right"></i>&nbsp;Go to Main Page<span class="badge badge-success"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light btn-danger" href="<?php echo base_url(); ?>login/logout" ><i class="fa fa-fw fa-unlock"></i>Logout</a>
                            
                        </li>
                    
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin/statistics') ?>">
                                    <i class="fa fa-fw fa-chart-bar"></i> <span class="ml-2">Statistik Web</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin" ><i class="fa fa-fw fa-comments"></i>Kelola Blog <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/banner" ><i class="fa fa-fw fa-film"></i>Kelola Banner <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/karir/" ><i class="fa fa-fw fa-rocket"></i>Kelola Karir <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/kontak" ><i class="fa fa-fw fa-user-circle"></i>Kelola Kontak <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/galeri" ><i class="fa fa-fw fa-image"></i>Kelola Galeri <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/jadwaldokter" ><i class="fa fa-fw fa-folder-open"></i>Kelola Jadwal Dokter <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/rekanan" ><i class="fa fa-fw fa-magnet"></i>Kelola Rekanan<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/pasien" ><i class="fa fa-fw fa-users"></i>Kelola Pasien<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/layanan" ><i class="fa fa-fw fa-ambulance"></i>Kelola Layanan Medis<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/penunjang" ><i class="fa fa-fw fa-medkit"></i>Kelola Layanan Penunjang<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/pendukung" ><i class="fa fa-fw fa-medkit"></i>Kelola Layanan Pendukung<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/profil/sejarah" ><i class="fa fa-fw fa-ambulance"></i>Kelola Sejarah RS<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/profil/direksi" ><i class="fa fa-fw fa-ambulance"></i>Kelola Direksi RS<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/profil/visimisi" ><i class="fa fa-fw fa-ambulance"></i>Kelola Visi & Misi<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/profil/pmkp" ><i class="fa fa-fw fa-ambulance"></i>Kelola PMKP<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/profil/prestasi" ><i class="fa fa-fw fa-ambulance"></i>Kelola Prestasi<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/profil/hakkewajiban" ><i class="fa fa-fw fa-ambulance"></i>Kelola Hak dan Kewajiban<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/profil/diklat" ><i class="fa fa-graduation-cap"></i>Kelola Pendidikan dan Pelatihan<span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url(); ?>admin/profil/dokter" ><i class="fa fa-fw fa-ambulance"></i>Kelola Dokter<span class="badge badge-success">6</span></a>
                            </li>
                                <br> <br>

                            <div style="border:0.1px solid #206f44; margin-top:15px; margin-bottom:15px;">
                            </div>

                            <!-- <li class="nav-divider">
                                MENU
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>" ><i class="fas fa-fw fa-file"></i> Kelola Blog </a>
                            </li> -->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>