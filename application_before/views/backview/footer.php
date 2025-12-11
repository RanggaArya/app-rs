<script src="<?php echo base_url()?>assets/backview/vendor/jquery/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/backview/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <script src="<?php echo base_url()?>assets/backview/vendor/slimscroll/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url()?>assets/backview/libs/js/main-js.js"></script>
        <script src="<?php echo base_url()?>assets/backview/libs/js/gmaps.min.js"></script>

        <!-- jvectormap js -->
        <script src="<?php echo base_url()?>assets/backview/vendor/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="<?php echo base_url()?>assets/backview/vendor/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo base_url()?>assets/backview/vendor/jvectormap/jquery-jvectormap-in-mill.js"></script>
        <script src="<?php echo base_url()?>assets/backview/vendor/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
        <script src="<?php echo base_url()?>assets/backview/vendor/jvectormap/jquery-jvectormap-uk-mill-en.js"></script>
        <script src="<?php echo base_url()?>assets/backview/vendor/jvectormap/jquery-jvectormap-au-mill.js"></script>
        <script src="<?php echo base_url()?>assets/backview/libs/js/jvectormap.custom.js"></script>

        <!-- CKEditor -->
        <script src="https://cdn.ckeditor.com/4.22.1/standard-all/ckeditor.js"></script>

        <script>
            var ck_config = {
                extraPlugins: 'codesnippet,autogrow,justify,pastefromword,filebrowser,uploadimage',
                autoGrow_onStartup: true,
                autoGrow_minHeight: 360,
                autoGrow_maxHeight: 600,
                codeSnippet_theme: 'monokai_sublime',
                // Nonaktifkan Easy Image & Cloud Services agar gambar tersimpan lokal
                removePlugins: 'easyimage,cloudservices',
                removeDialogTabs: 'link:advanced',
                allowedContent: true, // biar gak hapus tag HTML custom
                enterMode: CKEDITOR.ENTER_P,
                shiftEnterMode: CKEDITOR.ENTER_BR,

                toolbar: [
                    { name: 'document', items: ['Undo', 'Redo'] },
                    { name: 'styles', items: ['Format', 'FontSize'] },
                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat'] },
                    { name: 'paragraph', items: ['NumberedList', 'BulletedList', 'JustifyLeft', 'JustifyCenter', 'JustifyRight'] },
                    { name: 'links', items: ['Link', 'Unlink'] },
                    { name: 'insert', items: ['Image', 'CodeSnippet'] },
                    { name: 'tools', items: ['Maximize', 'Source'] }
                ],
                
                filebrowserUploadUrl: '<?php echo base_url('profil/upload_image') ?>',
                filebrowserImageUploadUrl: '<?php echo base_url('profil/upload_image') ?>',
                uploadUrl: '<?php echo base_url('profil/upload_image') ?>',
                filebrowserUploadMethod: 'form',

                // biar otomatis rapihkan HTML hasil paste
                forcePasteAsPlainText: false,
                pasteFilter: 'p; a[!href]; strong; em; ul; ol; li; img[!src,alt,width,height]; h1; h2; h3; pre; code',

                // // Cloud upload CKEditor
                // cloudServices_uploadUrl: 'https://33333.cke-cs.com/easyimage/upload/',
                // cloudServices_tokenUrl: 'https://33333.cke-cs.com/token/dev/ijrDsqFix838Gh3wGO3F77FSW94BwcLXprJ4APSp3XQ26xsUHTi0jcb1hoBt',

                // // EasyImage styling
                // easyimage_styles: {
                //     gradient1: {
                //         group: 'easyimage-gradients',
                //         attributes: { 'class': 'easyimage-gradient-1' },
                //         label: 'Blue Gradient',
                //         icon: 'https://ckeditor.com/docs/ckeditor4/4.13.0/examples/assets/easyimage/icons/gradient1.png'
                //     },
                //     gradient2: {
                //         group: 'easyimage-gradients',
                //         attributes: { 'class': 'easyimage-gradient-2' },
                //         label: 'Pink Gradient',
                //         icon: 'https://ckeditor.com/docs/ckeditor4/4.13.0/examples/assets/easyimage/icons/gradient2.png'
                //     },
                //     noGradient: {
                //         group: 'easyimage-gradients',
                //         attributes: { 'class': 'easyimage-no-gradient' },
                //         label: 'No Gradient',
                //         icon: 'https://ckeditor.com/docs/ckeditor4/4.13.0/examples/assets/easyimage/icons/nogradient.png'
                //     }
                // },
                // easyimage_toolbar: [
                //     'EasyImageFull',
                //     'EasyImageSide',
                //     'EasyImageGradient1',
                //     'EasyImageGradient2',
                //     'EasyImageNoGradient',
                //     'EasyImageAlt'
                // ]
            };

            // CSS Custom untuk auto-center images
            CKEDITOR.addCss(`
                figure[class*=easyimage-gradient]::before { 
                    content: ""; position: absolute; top: 0; bottom: 0; left: 0; right: 0;
                }
                figure[class*=easyimage-gradient] figcaption { position: relative; z-index: 2; }
                .easyimage-gradient-1::before { 
                    background-image: linear-gradient(135deg, rgba(115,110,254,0) 0%, rgba(66,174,234,.72) 100%);
                }
                .easyimage-gradient-2::before { 
                    background-image: linear-gradient(135deg, rgba(115,110,254,0) 0%, rgba(228,66,234,.72) 100%);
                }
                
                /* AUTO CENTER SEMUA GAMBAR */
                figure.image, 
                figure.easyimage,
                figure[class*="easyimage"] {
                    text-align: center !important;
                    margin: 20px auto !important;
                    display: block !important;
                }
                
                figure.image img,
                figure.easyimage img,
                figure[class*="easyimage"] img {
                    margin: 0 auto !important;
                    display: inline-block !important;
                }
                
                /* Center gambar biasa yang bukan dalam figure */
                p img {
                    display: block !important;
                    margin: 20px auto !important;
                }
            `);

            // Initialize CKEditor
            CKEDITOR.replace('editor', ck_config);

            // Event listener untuk auto-center gambar saat upload/paste
            CKEDITOR.on('instanceReady', function(evt) {
                var editor = evt.editor;
                
                // Auto center saat paste gambar
                editor.on('paste', function(e) {
                    setTimeout(function() {
                        var images = editor.document.$.querySelectorAll('img');
                        images.forEach(function(img) {
                            var parent = img.parentElement;
                            if (parent && (parent.tagName === 'P' || parent.tagName === 'DIV')) {
                                parent.style.textAlign = 'center';
                            }
                        });
                    }, 100);
                });
                
                // Auto center saat upload gambar via EasyImage
                editor.on('fileUploadResponse', function(e) {
                    setTimeout(function() {
                        var figures = editor.document.$.querySelectorAll('figure');
                        figures.forEach(function(fig) {
                            fig.style.textAlign = 'center';
                            fig.style.margin = '20px auto';
                        });
                    }, 200);
                });
                
                // Auto center saat gambar selesai di-load
                editor.on('contentDom', function() {
                    var editable = editor.editable();
                    editable.attachListener(editable, 'load', function() {
                        var images = editor.document.$.querySelectorAll('img');
                        images.forEach(function(img) {
                            var parent = img.parentElement;
                            if (parent) {
                                parent.style.textAlign = 'center';
                            }
                        });
                    }, null, null, 1);
                });
            });
        </script>

        <script src="<?php echo base_url()?>assets/general/js/main.js"></script>
    </body>
</html>