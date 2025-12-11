<section class="breadcrumbs_custom">
    <div class="container breadcrumbs_custom">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>karir">Karir</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lowongan kerja sebagai <?php echo $karir_open[0]->posisi; ?> </li>
            </ol>
    </div>
    </nav>
</section>
<br />
<br />
<section style="margin-bottom:50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <h4 class="job-title">Lowongan Kerja sebagai '<?php echo $karir_open[0]->posisi; ?>'</h4>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <?php
                if ($karir_open[0]->type == 'manual') {
                ?>
                    <a href="https://wa.me/6287833254882?text=Halo,%20saya%20tertarik%20untuk%20melamar%20posisi%20<?php echo urlencode($karir_open[0]->posisi); ?>" target="_blank">
                        <button class="btn btn-success btn-sm" style="float:right;">
                            <i class="lnr lnr-phone-handset" style="margin-right:5px;"></i> Lamar via WA
                        </button>
                    </a>
                <?php
                } else {
                ?>
                    <a target="_blank" href="<?php echo $karir_open[0]->link ?>">
                        <button class="btn btn-success btn-sm" style="float:right;">Lamar via Google Form</button>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <?php echo $karir_open[0]->deskripsi; ?>
                    </div>
                </div>
            </div>
        </div>
        <br />

        <!-- Gallery Preview Section -->
        <?php
        if ($karir_open[0]->attachment != '') {
            $file_url = base_url() . 'assets/karir/attachment/' . $karir_open[0]->attachment;
            $file_ext = strtolower(pathinfo($karir_open[0]->attachment, PATHINFO_EXTENSION));
        ?>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header-custom">
                            <i class="lnr lnr-file-empty"></i>
                            <span>Brief Lowongan Pekerjaan</span>
                        </div>
                        <div class="card-body p-0">
                            <div class="attachment-gallery-wrapper">
                                <?php if (in_array($file_ext, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg'])): ?>
                                    <!-- Image Preview -->
                                    <div class="attachment-container">
                                        <div class="image-wrapper">
                                            <img src="<?php echo $file_url; ?>" alt="Brief" class="preview-image" id="attachmentThumb">
                                        </div>
                                        <div class="action-buttons-overlay">
                                            <button class="action-btn zoom-btn" id="zoomBtn" data-file="<?php echo $file_url; ?>" data-ext="<?php echo $file_ext; ?>">
                                                <i class="lnr lnr-eye"></i>
                                                <span>Perbesar</span>
                                            </button>
                                            <a href="<?php echo $file_url; ?>" target="_blank" class="action-btn open-btn">
                                                <i class="lnr lnr-exit-up"></i>
                                                <span>Buka</span>
                                            </a>
                                            <a href="<?php echo $file_url; ?>" download class="action-btn download-btn">
                                                <i class="lnr lnr-download"></i>
                                                <span>Unduh</span>
                                            </a>
                                        </div>
                                    </div>
                                <?php elseif ($file_ext === 'pdf'): ?>
                                    <!-- PDF Preview -->
                                    <div class="attachment-container pdf-container">
                                        <div class="pdf-wrapper">
                                            <iframe src="<?php echo $file_url; ?>#toolbar=0&navpanes=0&scrollbar=0&view=FitH" class="pdf-preview"></iframe>
                                        </div>
                                        <div class="action-buttons-overlay">
                                            <button class="action-btn zoom-btn" id="zoomBtn" data-file="<?php echo $file_url; ?>" data-ext="<?php echo $file_ext; ?>">
                                                <i class="lnr lnr-eye"></i>
                                                <span>Lihat Full</span>
                                            </button>
                                            <a href="<?php echo $file_url; ?>" target="_blank" class="action-btn open-btn">
                                                <i class="lnr lnr-exit-up"></i>
                                                <span>Buka</span>
                                            </a>
                                            <a href="<?php echo $file_url; ?>" download class="action-btn download-btn">
                                                <i class="lnr lnr-download"></i>
                                                <span>Unduh</span>
                                            </a>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <!-- Other File Types -->
                                    <div class="attachment-container file-container">
                                        <div class="file-icon-wrapper">
                                            <i class="lnr lnr-file-empty file-icon"></i>
                                            <p class="file-extension">.<?php echo strtoupper($file_ext); ?></p>
                                            <p class="file-title"><?php echo basename($karir_open[0]->attachment); ?></p>
                                        </div>
                                        <div class="action-buttons-overlay">
                                            <a href="<?php echo $file_url; ?>" target="_blank" class="action-btn open-btn">
                                                <i class="lnr lnr-exit-up"></i>
                                                <span>Buka</span>
                                            </a>
                                            <a href="<?php echo $file_url; ?>" download class="action-btn download-btn">
                                                <i class="lnr lnr-download"></i>
                                                <span>Unduh</span>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12">
                    <?php if ($karir_open[0]->type == 'manual'): ?>
                        <a href="https://wa.me/6285868861818?text=Halo,%20saya%20tertarik%20untuk%20melamar%20posisi%20<?php echo urlencode($karir_open[0]->posisi); ?>" target="_blank">
                            <button class="apply-button primary-apply">
                                <i class="lnr lnr-phone-handset"></i>
                                <span>Lamar via WhatsApp</span>
                            </button>
                        </a>
                    <?php else: ?>
                        <a target="_blank" href="<?php echo $karir_open[0]->link ?>">
                            <button class="apply-button success-apply">
                                <i class="lnr lnr-briefcase"></i>
                                <span>Lamar via Google Form</span>
                            </button>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php } ?>

        <!-- Modal Zoom - UKURAN LEBIH KECIL -->
        <div class="modal fade" id="zoomModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content modern-modal">
                    <div class="modal-header-custom">
                        <h5 class="modal-title">
                            <i class="lnr lnr-eye"></i> Preview - Brief Lowongan Pekerjaan
                        </h5>
                        <button type="button" class="close-modal" data-dismiss="modal">
                            <i class="lnr lnr-cross"></i>
                        </button>
                    </div>
                    <div class="modal-body" id="zoomPreview">
                        <div class="loading-container">
                            <div class="spinner"></div>
                            <p>Memuat preview...</p>
                        </div>
                    </div>
                    <div class="modal-footer-custom">
                        <a id="downloadLink" href="#" download class="modal-btn download">
                            <i class="lnr lnr-download"></i> Download
                        </a>
                        <a id="openNewTab" href="#" target="_blank" class="modal-btn open">
                            <i class="lnr lnr-exit-up"></i> Buka di Tab Baru
                        </a>
                        <button type="button" class="modal-btn close" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle zoom button
        var zoomBtn = document.getElementById('zoomBtn');
        if (zoomBtn) {
            zoomBtn.addEventListener('click', function(e) {
                e.preventDefault();
                var fileUrl = this.getAttribute('data-file');
                var fileExt = this.getAttribute('data-ext');
                var previewHtml = '';

                document.getElementById('downloadLink').setAttribute('href', fileUrl);
                document.getElementById('openNewTab').setAttribute('href', fileUrl);

                if (typeof jQuery !== 'undefined') {
                    $('#zoomModal').modal('show');
                }

                if (fileExt === 'pdf') {
                    previewHtml = '<iframe src="' + fileUrl + '#toolbar=1&navpanes=1&scrollbar=1&view=FitH" class="full-preview-iframe"></iframe>';
                } else if (['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg'].indexOf(fileExt) !== -1) {
                    previewHtml = '<div class="full-preview-image"><img src="' + fileUrl + '" alt="Preview"></div>';
                } else if (['doc', 'docx'].indexOf(fileExt) !== -1) {
                    if (window.location.hostname !== 'localhost' && window.location.hostname !== '127.0.0.1') {
                        previewHtml = '<iframe src="https://docs.google.com/viewer?url=' + encodeURIComponent(fileUrl) + '&embedded=true" class="full-preview-iframe"></iframe>';
                    } else {
                        previewHtml = '<div class="preview-alert"><i class="lnr lnr-warning"></i><p>Preview Word document tidak tersedia di localhost.</p><a href="' + fileUrl + '" target="_blank" class="alert-link">Buka di tab baru</a></div>';
                    }
                }

                setTimeout(function() {
                    document.getElementById('zoomPreview').innerHTML = previewHtml;
                }, 200);
            });
        }

        // Modal reset
        if (typeof jQuery !== 'undefined') {
            $('#zoomModal').on('hidden.bs.modal', function() {
                $('#zoomPreview').html('<div class="loading-container"><div class="spinner"></div><p>Memuat preview...</p></div>');
            });
        }
    });
</script>

<style>
    /* Global Styles */
    .job-title {
        font-weight: 600;
        color: #2d3748;
        font-size: 1.3rem;
    }

    .shadow-sm {
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.05) !important;
    }

    .card {
        border: none;
        border-radius: 6px;
        overflow: hidden;
    }

    /* Override Bootstrap btn-success untuk warna hijau */
    .btn-success {
        background: linear-gradient(135deg, #059669 0%, #10b981 100%) !important;
        border: none !important;
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3) !important;
    }

    /* Custom Card Header */
    .card-header-custom {
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        color: white;
        padding: 10px 15px;
        font-weight: 600;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .card-header-custom i {
        font-size: 1rem;
    }

    /* Attachment Gallery */
    .attachment-gallery-wrapper {
        position: relative;
        background: #f7fafc;
    }

    .attachment-container {
        position: relative;
        min-height: 280px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        overflow: hidden;
    }

    .image-wrapper,
    .pdf-wrapper {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 12px;
    }

    .preview-image {
        max-width: 100%;
        max-height: 300px;
        object-fit: contain;
        border-radius: 5px;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease;
    }

    .pdf-preview {
        width: 100%;
        height: 300px;
        border: none;
        border-radius: 5px;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
    }

    /* Action Buttons Overlay */
    .action-buttons-overlay {
        position: absolute;
        bottom: 12px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 6px;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 10;
    }

    .attachment-container:hover .action-buttons-overlay {
        opacity: 1;
    }

    .attachment-container:hover .preview-image {
        transform: scale(1.02);
    }

    .action-btn {
        background: white;
        color: #059669;
        border: none;
        border-radius: 25px;
        padding: 6px 12px;
        display: flex;
        align-items: center;
        gap: 5px;
        font-weight: 600;
        font-size: 0.75rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.18);
        color: #059669;
        text-decoration: none;
    }

    .action-btn i {
        font-size: 0.9rem;
    }

    .zoom-btn {
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        color: white !important;
    }

    .zoom-btn:hover {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white !important;
    }

    /* File Icon */
    .file-container {
        background: linear-gradient(135deg, #059669 0%, #34d399 100%);
    }

    .file-icon-wrapper {
        text-align: center;
        color: white;
        padding: 35px 18px;
    }

    .file-icon {
        font-size: 60px;
        margin-bottom: 12px;
        opacity: 0.9;
    }

    .file-extension {
        font-size: 20px;
        font-weight: bold;
        margin: 8px 0 6px;
    }

    .file-title {
        font-size: 13px;
        opacity: 0.9;
        word-break: break-word;
        padding: 0 12px;
    }

    /* Apply Button */
    .apply-button {
        width: 100%;
        padding: 10px 20px;
        border: none;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .apply-button i {
        font-size: 1rem;
    }

    .primary-apply {
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        color: white;
    }

    .success-apply {
        background: linear-gradient(135deg, #059669 0%, #34d399 100%);
        color: white;
    }

    .apply-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 18px rgba(5, 150, 105, 0.25);
    }

    /* Modal Styles - UKURAN LEBIH COMPACT */
    .modern-modal {
        border: none;
        border-radius: 10px;
        overflow: hidden;
    }

    .modal-header-custom {
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        color: white;
        padding: 12px 18px;
        border: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-header-custom .modal-title {
        font-weight: 600;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 6px;
        margin: 0;
    }

    .close-modal {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: white;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1.2rem;
    }

    .close-modal:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg);
    }

    /* Ukuran preview di modal lebih kecil */
    #zoomPreview {
        min-height: 300px;
        padding: 0;
        background: #f7fafc;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .full-preview-image {
        padding: 12px;
        text-align: center;
        max-height: 450px;
        overflow: auto;
    }

    .full-preview-image img {
        max-width: 100%;
        max-height: 400px;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.12);
    }

    .full-preview-iframe {
        width: 100%;
        height: 450px;
        border: none;
    }

    .loading-container {
        text-align: center;
        padding: 50px 18px;
    }

    .spinner {
        width: 35px;
        height: 35px;
        border: 3px solid #e2e8f0;
        border-top-color: #059669;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto 12px;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .preview-alert {
        text-align: center;
        padding: 45px 25px;
    }

    .preview-alert i {
        font-size: 45px;
        color: #f59e0b;
        margin-bottom: 12px;
    }

    .preview-alert p {
        font-size: 0.95rem;
        color: #4a5568;
        margin-bottom: 12px;
    }

    .alert-link {
        display: inline-block;
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        color: white;
        padding: 8px 20px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.85rem;
        transition: all 0.3s ease;
    }

    .alert-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(5, 150, 105, 0.25);
        color: white;
        text-decoration: none;
    }

    .modal-footer-custom {
        background: #f7fafc;
        padding: 12px 18px;
        border: none;
        display: flex;
        gap: 6px;
        justify-content: flex-end;
    }

    .modal-btn {
        padding: 7px 14px;
        border: none;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.8rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 5px;
        text-decoration: none;
    }

    .modal-btn i {
        font-size: 0.85rem;
    }

    .modal-btn.download {
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        color: white;
    }

    .modal-btn.open {
        background: linear-gradient(135deg, #0891b2 0%, #06b6d4 100%);
        color: white;
    }

    .modal-btn.close {
        background: #e2e8f0;
        color: #4a5568;
    }

    .modal-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.12);
        color: white;
        text-decoration: none;
    }

    .modal-btn.close:hover {
        background: #cbd5e0;
        color: #2d3748;
    }

    /* Form Styles */
    .form-group-custom {
        margin-bottom: 18px;
    }

    .form-group-custom label {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 5px;
        display: block;
        font-size: 0.85rem;
    }

    .form-control-custom {
        width: 100%;
        padding: 9px 13px;
        border: 2px solid #e2e8f0;
        border-radius: 6px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-control-custom:focus {
        outline: none;
        border-color: #059669;
        box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.08);
    }

    .file-upload-wrapper {
        position: relative;
    }

    .file-input {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    .file-label {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 9px 13px;
        border: 2px dashed #cbd5e0;
        border-radius: 6px;
        background: #f7fafc;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #4a5568;
        font-weight: 500;
        font-size: 0.85rem;
    }

    .file-label:hover {
        border-color: #059669;
        background: #ecfdf5;
        color: #059669;
    }

    .file-label i {
        font-size: 1rem;
    }

    .form-hint {
        display: block;
        margin-top: 4px;
        color: #718096;
        font-size: 0.75rem;
    }

    .submit-btn {
        width: 100%;
        padding: 10px 20px;
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        color: white;
        border: none;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        box-shadow: 0 2px 10px rgba(5, 150, 105, 0.25);
    }

    .submit-btn i {
        font-size: 1rem;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 18px rgba(5, 150, 105, 0.35);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .attachment-container {
            min-height: 220px;
        }

        .preview-image {
            max-height: 250px;
        }

        .action-buttons-overlay {
            opacity: 1;
            background: rgba(0, 0, 0, 0.5);
            bottom: 0;
            left: 0;
            right: 0;
            transform: none;
            border-radius: 0;
            padding: 10px;
            justify-content: center;
        }

        .action-btn {
            padding: 6px 10px;
            font-size: 0.7rem;
        }

        .action-btn span {
            display: none;
        }

        .apply-button {
            margin-top: 12px;
            font-size: 0.8rem;
            padding: 9px 18px;
        }

        .modal-footer-custom {
            flex-wrap: wrap;
        }

        .modal-btn {
            flex: 1;
            min-width: 90px;
            justify-content: center;
            font-size: 0.75rem;
        }

        .job-title {
            font-size: 1.2rem;
        }
    }
</style>

<br />