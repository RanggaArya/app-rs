<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <?php echo form_open_multipart('karir/update'); ?>

                    <h5 class="card-header">Edit Lowongan</h5>
                    <div class="card-body">

                        <input type="hidden" name="id" value="<?= $karir->id ?>">
                        <input type="hidden" name="old_attachment" value="<?= $karir->attachment ?>">

                        <div class="form-group">
                            <label>Posisi</label>
                            <input type="text" name="position" class="form-control" value="<?= $karir->posisi ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="description" id="editor"><?= $karir->deskripsi ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option value="1" <?= ($karir->status == 1 ? 'selected' : '') ?>>Open</option>
                                <option value="2" <?= ($karir->status == 2 ? 'selected' : '') ?>>Closed</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Mekanisme Pelamaran</label>
                            <select class="form-control" name="type" id="lamar_mekanisme">
                                <option value="manual" <?= ($karir->type == 'manual' ? 'selected' : '') ?>>Manual</option>
                                <option value="google" <?= ($karir->type == 'google' ? 'selected' : '') ?>>Google Form</option>
                            </select>
                        </div>

                        <div class="form-group" id="link_googleform" style="<?= $karir->type == 'google' ? '' : 'display:none;' ?>">
                            <label>Link Informasi</label>
                            <input type="text" name="link" class="form-control" value="<?= $karir->link ?>">
                        </div>

                        <div class="form-group">
                            <label>Attachment Sebelumnya:</label><br>
                        
                            <?php if ($karir->attachment): ?>
                                <span><?= $karir->attachment ?></span><br>
                        
                                <label class="mt-2">
                                    <input type="checkbox" name="hapus_attachment" value="1">
                                    Hapus attachment ini
                                </label>
                            <?php else: ?>
                                <span>Tidak ada file</span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label>Upload File Baru (optional)</label>
                            <input type="file" name="berkas" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        <a href="<?= base_url('admin/karir') ?>" class="btn btn-secondary btn-sm">Kembali</a>

                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $('#lamar_mekanisme').on('change', function() {
        if ($(this).val() === 'google') {
            $('#link_googleform').show();
        } else {
            $('#link_googleform').hide();
        }
    });
</script>
