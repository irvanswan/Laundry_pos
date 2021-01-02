<!-- Input Data -->
<div class="content mt-5">
    <!-- List Data -->
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Selamat Datang <?= $user['name']; ?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-info ml-5 mr-5">
                    <h5 class="card-title text-center pb-4">Edit Profile</h5>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('manajer/edit_profile') ?>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="name">Fullname</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?= $user['name']; ?>">
                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="telp">No Whatsapp Aktif</label>
                            <input type="tel" class="form-control" name="no_telp" id="no_telp" value="<?= $user['no_telp']; ?>">
                            <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-12 col-lg-6">
                            <label for="testi">Testimoni</label>
                            <textarea name="testi" id="testi" class="form-control"><?= $user['testi']; ?></textarea>
                            <?= form_error('testi', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-2">Picture</div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info ">Simpan</button>
                    <?= form_close(); ?>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="now-ui-icons arrows-1_refresh-69"></i> Baru Update
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End List Data -->