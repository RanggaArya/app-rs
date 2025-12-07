$(document).ready(function(){
    $('#upload_thumb').on('change', function(){
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
        {
            var reader = new FileReader();

            reader.onload = function (e) {
            $('#img_thumb').attr('src', e.target.result);
            }
        reader.readAsDataURL(input.files[0]);
        }
        else
        {
        $('#img').attr('src', '/assets/no_preview.png');
        }
    });

    //fetch blog
    fetchblog(); // ← Aktifkan ini
});

// Fungsi untuk sanitize slug
function sanitizeSlug(str) {
    return str.toString()
        .toLowerCase()
        .trim()
        .replace(/\s+/g, '-')           // Ganti spasi dengan -
        .replace(/[,\.;:]/g, '-')       // Ganti koma, titik, dll dengan -
        .replace(/[^\w\-]+/g, '')       // Hapus karakter spesial
        .replace(/\-\-+/g, '-')         // Ganti multiple - dengan single -
        .replace(/^-+/, '')             // Hapus - di awal
        .replace(/-+$/, '');            // Hapus - di akhir
}

function fetchblog(){
    $('#containerblog').hide();
    $('#loaderse').fadeIn(100);
    $.ajax({
        url: "<?php echo base_url(); ?>blog/blog_content_list", 
        success: function(result){
            let decode_result = JSON.parse(result);
            let result_url;
            let url_link = "<?php echo base_url(); ?>";
            console.log(decode_result);
            let image_path = "";
            let i = 0;
            
            for(i; i < decode_result.length; i++){
                // Sanitize slug untuk URL yang aman
                let cleanSlug = sanitizeSlug(decode_result[i].slug);
                result_url = url_link + 'artikel/' + cleanSlug;
                
                if(decode_result[i].image_path == ""){
                    image_path = "<?php echo base_url() ?>assets/img/work/prowire.png";
                }else{
                    image_path = "<?php echo base_url() ?>assets/thumb_img/" + decode_result[i].image_path;
                }
                
                let adapter = `
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="${image_path}" alt="${decode_result[i].title}" style="height:200px;object-fit:cover;">
                            <div class="card-body">
                                <div>
                                    <h5 class="blog_head">${decode_result[i].title}</h5>
                                    <p class="card-text">${decode_result[i].description || decode_result[i].title}</p>
                                </div>
                                <div class="card-footer-custom">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">${decode_result[i].date_created}</small>
                                        <a href="${result_url}" class="btn btn-sm btn-outline-secondary">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                $('#bloglist_container').append(adapter);
            }
            
            $('#loaderse').fadeOut(100);
            $('.containerblog').fadeIn(100);
        }
    });
}