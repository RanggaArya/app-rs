<div class="dashboard-wrapper">
	        <div class="dashboard-influence">
	            <div class="container-fluid dashboard-content">
	                <!-- ============================================================== -->
	                <!-- pageheader  -->
	                <!-- ============================================================== -->
	                <div class="row">
	                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                        <div class="page-header">
	                            <h3 class="mb-2">Kelola Galeri</h3>
	                            <div class="page-breadcrumb">
	                                <nav aria-label="breadcrumb">
	                                    <ol class="breadcrumb">
	                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
	                                        <li class="breadcrumb-item active" aria-current="page">Kelola Galeri</li>
	                                    </ol>
	                                </nav>
	                            </div>
	                        </div>
	                    </div>
                    </div>
                    <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">

                                        <!-- format uploads/uploads/#namapath/#namatable -->
                                        <?php echo form_open_multipart('uploads/single/galeri/galeri/galeri'); ?>
                                            <h5 class="card-header">Upload Image</h5>
                                            <div class="card-body">
                                                    <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-xs-6">
                                                            <img style="object-fit:cover;border-radius:10px;position:relative;top:6px;" width="50" height="50" id="img_thumb" src="<?php echo base_url() ?>assets/backview/images/image_default.png">
                                                            </div>
                                                            <div class="col-lg-11 col-md-11 col-xs-6 upload_component" >
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlFile1">Upload images or video (best fit 1200px * 1200px)</label>
                                                                    <input type="file" class="form-control" id="upload_thumb" name="berkas" required>
                                                                </div>
                                                                <div class="form-group"> 
                                                                    <input type="text" placeholder="Caption Image" class="form-control" id="caption" name="caption"  required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="submit" value="Upload" class="btn btn-sm btn-success"/> 
                                                                </div>
                                                            </div>
                                                    </div>
                                            </div>
                                        <?php echo form_close();?>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Daftar Image</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama foto</th>
                                                        <th>Image</th>
                                                        <th>Caption</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        function check_empty($value){
                                                            if($value == '' || $value == '0'){
                                                                echo '-';
                                                            }else{
                                                                echo $value;
                                                            }
                                                        }
        
                                                            $i = 0; 
                                                            foreach($galeri as $list){
                                                                $i = $i + 1;
                                                                ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $list->image_name; ?></td>
                                                                <td>
                                                                    <?php
                                                                        $getformat = explode('.', $list->image_name);
                                                                        if($getformat[1] == 'webm' || $getformat[1] == 'mp4' || $getformat[1] == 'ogv'){
                                                                            ?>         
                                                                                <video style="height:80px;width:100px;border-radius:4px;" src="<?php echo base_url()?>/assets/galeri/<?php echo $list->image_name;?>" poster="" controls>
                                                                                    This is fallback content to display for user agents that do not support the video tag.
                                                                                </video>
                                                                            <?php 
                                                                        }else { 
                                                                            ?>
                                                                                <img style="height:80px;width:100px;border-radius:4px;" src="<?php echo base_url()?>/assets/galeri/<?php echo $list->image_name;?>">
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $list->caption;?></td>
                                                                <th>
                                                                    <a href="javascript:void(0);" 
                                                                       data-id="<?php echo $list->id; ?>" 
                                                                       data-caption="<?php echo $list->caption; ?>" 
                                                                       data-image="<?php echo base_url('assets/galeri/' . $list->image_name); ?>"
                                                                       class="btn btn-info btn-xs btn-edit-galeri">Edit</a>
                                                                    <a href="<?php echo base_url()?>uploads/delete/<?php echo $list->id; ?>/galeri" class="btn btn-danger btn-xs">Delete</a>
                                                                </th>
                                                            </tr>
                                                        <?php }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                        <form method="POST" action="<?php echo base_url();?>galeri/youtube">
                                            <h5 class="card-header">Upload Youtube Link</h5>
                                            <div class="card-body">
                                                    <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-xs-6">
                                                            <img style="object-fit:cover;border-radius:10px;position:relative;top:6px;" width="50" height="50" id="img_thumb" src="<?php echo base_url() ?>assets/backview/images/image_default.png">
                                                            </div>
                                                            <div class="col-lg-11 col-md-11 col-xs-6 upload_component" >
                                                                <div class="form-group"> 
                                                                    <input type="text" placeholder="Link URL Video" class="form-control" id="link" name="link"  required>
                                                                </div>
                                                                <div class="form-group"> 
                                                                    <input type="text" placeholder="Caption" class="form-control" id="caption" name="caption"  required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="submit" value="Submit" class="btn btn-sm btn-success"/> 
                                                                </div>
                                                            </div>
                                                    </div>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Daftar link video</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Link</th>
                                                        <th>Caption</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                            $i = 0; 
                                                            foreach($galeri_video as $list){
                                                                $i = $i + 1;
                                                                ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $list->link; ?></td>
                                                                <td><?php echo $list->caption;?></td>
                                                                <th>
                                                                    <a href="javascript:void(0);" 
                                                                       data-id="<?php echo $list->id; ?>" 
                                                                       data-link="<?php echo $list->link; ?>"
                                                                       data-caption="<?php echo $list->caption; ?>" 
                                                                       class="btn btn-info btn-xs btn-edit-youtube">Edit</a>
                                                                    <a href="<?php echo base_url()?>galeri/delete_youtube/<?php echo $list->id; ?>" class="btn btn-danger btn-xs">Delete</a>
                                                                </th>
                                                            </tr>
                                                        <?php }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal fade" id="modalEditGaleri" tabindex="-1" role="dialog" aria-labelledby="modalEditGaleriLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditGaleriLabel">Edit Galeri Foto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?php echo base_url('galeri/update_galeri'); ?>" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="id" class="id_galeri">
                                            
                                            <div class="form-group text-center">
                                                <label>Foto Saat Ini</label><br>
                                                <img src="" class="img-fluid img_preview" style="max-height: 150px; border-radius: 5px;">
                                            </div>
                        
                                            <div class="form-group">
                                                <label>Ganti Foto (Opsional)</label>
                                                <input type="file" class="form-control" name="berkas">
                                                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
                                            </div>
                        
                                            <div class="form-group">
                                                <label>Caption</label>
                                                <input type="text" class="form-control caption_galeri" name="caption" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal fade" id="modalEditYoutube" tabindex="-1" role="dialog" aria-labelledby="modalEditYoutubeLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditYoutubeLabel">Edit Video Youtube</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?php echo base_url('galeri/update_youtube'); ?>" method="POST">
                                        <div class="modal-body">
                                            <input type="hidden" name="id" class="id_youtube">
                                            <div class="form-group">
                                                <label>Link Youtube</label>
                                                <input type="text" class="form-control link_youtube" name="link" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Caption</label>
                                                <input type="text" class="form-control caption_youtube" name="caption" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <script src="<?php echo base_url();?>assets/backview/vendor/jquery/jquery-3.3.1.min.js"></script>
                        <script>
                            $(document).ready(function(){
                                // Handle Edit Galeri (Foto)
                                $('.btn-edit-galeri').on('click', function(){
                                    const id = $(this).data('id');
                                    const caption = $(this).data('caption');
                                    const image = $(this).data('image'); // Ambil url gambar
                                    
                                    $('.id_galeri').val(id);
                                    $('.caption_galeri').val(caption);
                                    $('.img_preview').attr('src', image); // Set src image preview
                                    
                                    $('#modalEditGaleri').modal('show');
                                });
                        
                                // Handle Edit Youtube
                                $('.btn-edit-youtube').on('click', function(){
                                    // Ambil data dari atribut tombol
                                    const id = $(this).data('id');
                                    const link = $(this).data('link');
                                    const caption = $(this).data('caption');
                                    
                                    // Masukkan data ke dalam modal
                                    $('.id_youtube').val(id);
                                    $('.link_youtube').val(link);
                                    $('.caption_youtube').val(caption);
                                    
                                    // Tampilkan modal
                                    $('#modalEditYoutube').modal('show');
                                });
                            });
                        </script>
                </div>
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <div class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                Copyright © 2018 Concept. All rights reserved.
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end footer -->
                <!-- ============================================================== -->
            </d>
            <!-- ============================================================== -->
            <!-- end wrapper  -->
            <!-- ============================================================== -->
</div>