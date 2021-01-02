<!-- Input Data -->
<div class="content mt-5">
    <!-- List Data -->
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Selamat Datang <?= $user['name']; ?></h5>
                    <?= $this->session->flashdata('message') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-info ml-5 mr-5">
                    <h5 class="card-title text-center pb-4">Change Password</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/change_password'); ?>" method="POST">
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label for="current">Current Password</label>
                                <input type="password" class="form-control mt-3" name="current_password" id="current_password">
                                <?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="new_password1">New Password</label>
                                <input type="password" class="form-control mt-3" name="new_password1" id="new_password1">
                                <?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="new_password2">Repeat Password</label>
                                <input type="password" class="form-control mt-3" name="new_password2" id="new_password2">
                                <?= form_error('new_password2', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="now-ui-icons arrows-1_refresh-69"></i> Baru Update
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End List Data -->