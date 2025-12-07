<?php 
// Ambil hanya 1 data
$row = $layanandetail->row(); 
?>

<!-- CSS Modern -->
<style>
/* === Breadcrumb Modern === */
.breadcrumbs_custom {
    background: #f4f6f9;
    padding: 20px 0;
    border-bottom: 1px solid #e0e6ed;
}

.breadcrumb {
    background: none;
    margin-bottom: 0;
    font-size: 15px;
}

.breadcrumb a {
    color: #607d8b; /* blue-grey */
    font-weight: 600;
    transition: 0.2s;
}

.breadcrumb a:hover {
    color: #455a64; /* darker blue-grey */
}

/* === Title === */
.section_four_two h2 {
    font-size: 30px;
    font-weight: 700;
    color: #37474f; /* blue-grey */
}

/* === Image modern style === */
.section_four_two img {
    width: 100%;
    border-radius: 12px !important;
    margin-bottom: 10px;
    box-shadow: 0px 4px 15px rgba(0,0,0,0.15);
    transition: 0.3s;
}

.section_four_two img:hover {
    transform: scale(1.02);
}

/* === Content / Deskripsi === */
.section_four_two .content {
    font-size: 17px;
    color: #455a64;
    line-height: 1.7;
    margin-top: 25px;
}

/* === Container spacing === */
.section_four_two {
    padding-top: 10px;
    padding-bottom: 50px;
}

/* === Responsive === */
@media(max-width: 767px) {
    .section_four_two h2 {
        font-size: 24px;
    }

    .section_four_two .content {
        font-size: 16px;
    }
}
</style>


<section class="breadcrumbs_custom">
    <div class="container breadcrumbs_custom">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url();?>fasilitas/pendukung">Layanan Pendukung</a></li>
                
                <!-- Nama Layanan -->
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo $row->nama; ?>
                </li>

            </ol>
        </nav>  
    </div>
</section>

<br/><br/>

<section class="section_four_two">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12">

                <!-- Judul -->
                <h2 style="font-weight:bold;"><?php echo $row->nama; ?></h2>
                <br/>

                <!-- Thumbnail -->
                <?php if ($row->thumb == '' || $row->thumb == NULL): ?>
                    <img src="<?php echo base_url()?>assets/layananpendukung/thumb.png" 
                         style="width:100%;margin-bottom:0px;border-radius:10px;">
                <?php else: ?>
                    <img src="<?php echo base_url('assets/layananpendukung/thumb/'.$row->thumb); ?>" 
                         style="width:100%;margin-bottom:0px;border-radius:10px;">
                <?php endif; ?>

                <!-- Deskripsi -->
                <div class="content" style="margin-top:30px;">
                    <?php echo $row->deskripsi; ?>
                </div>

            </div>
        </div>
    </div>
</section>
