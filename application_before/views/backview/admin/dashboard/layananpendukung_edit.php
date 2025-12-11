<div class="dashboard-wrapper">
    <div class="dashboard-influence">
        <div class="container-fluid dashboard-content">

            <!-- HEADER -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header">
                        <h3 class="mb-2">Kelola Fasilitas Layanan Pendukung</h3>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin/layanan" class="breadcrumb-link">Kelola Fasilitas</a></li>
                                    <li class="breadcrumb-item"><?php echo $daftar_layanan_pendukung[0]->nama;?></li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FORM EDIT -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <h5 class="card-header">Edit Layanan Pendukung</h5>
                        <div class="card-body">

                            <!-- ===================================== -->
                            <!-- ❗ FORM DIMULAI DI SINI (WAJIB)       -->
                            <!-- ===================================== -->
                            <?php echo form_open_multipart('layananpendukung/edit_layananpendukung'); ?>

                            <input type="hidden" name="id" value="<?php echo $daftar_layanan_pendukung[0]->id; ?>">

                            <!-- THUMBNAIL -->
                            <div class="row mb-3">
                                <div class="col-lg-1">
                                    <img id="img_thumb" 
                                         src="<?php echo base_url('assets/layananpendukung/thumb/'.$daftar_layanan_pendukung[0]->thumb); ?>" 
                                         width="50" height="50" 
                                         style="object-fit:cover;border-radius:10px;">
                                    
                                    <img id="img_thumb_edit"
                                         src="<?php echo base_url('assets/backview/images/image_default.png'); ?>"
                                         width="50" height="50"
                                         style="object-fit:cover;border-radius:10px;display:none;">
                                </div>

                                <div class="col-lg-11">
                                    <label>
                                        <input type="checkbox" id="check_images"> Ganti Thumbnail
                                    </label>

                                    <div id="form_upload_edit" style="display:none;">
                                        <input type="file" id="upload_thumb_edit" name="upload_thumb" accept="image/*">
                                    </div>
                                </div>
                            </div>

                            <!-- JUDUL -->
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="nama" class="form-control" 
                                       value="<?php echo $daftar_layanan_pendukung[0]->nama; ?>" required>
                            </div>

                            <!-- DESKRIPSI -->
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="deskripsi" class="form-control" id="editor" rows="4"><?php echo $daftar_layanan_pendukung[0]->deskripsi; ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-success btn-sm">
                                Simpan Perubahan
                            </button>

                            <?php echo form_close(); ?>
                            <!-- ===================================== -->
                            <!-- ❗ FORM BERAKHIR DI SINI              -->
                            <!-- ===================================== -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- SCRIPT CEKLIST & PREVIEW -->
<script>
    $(document).ready(function(){

        $("#check_images").change(function(){
            if($(this).is(":checked")){
                $("#img_thumb").hide();
                $("#img_thumb_edit").show();
                $("#form_upload_edit").show();
            } else {
                $("#img_thumb").show();
                $("#img_thumb_edit").hide();
                $("#form_upload_edit").hide();
            }
        });

        $("#upload_thumb_edit").change(function(){
            const file = this.files[0];
            if(file){
                const reader = new FileReader();
                reader.onload = function(e){
                    $("#img_thumb_edit").attr("src", e.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

    });
</script>
