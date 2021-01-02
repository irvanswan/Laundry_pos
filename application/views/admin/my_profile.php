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
                    <h5 class="card-title text-center pb-4">My Profil</h5>
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <h5>Data Admin</h5>
                        <div class="col-md-12 d-flex justify-content-center gbr">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="pict" width="25%" class="img-thumbnail rounded-circle shadow p-3 bg-white rounded gbr-gbr">
                        </div>
                    </div>
                    <div class="row text-center mt-4">
                        <div class="col-md-12">
                            <div class="card-body pt-1 ml-2 mr-2 rounded">
                                <div class="row justify-content-center">
                                    <div class="col-md-12 col-lg-6 mx-auto lab">
                                        <p class="labelku pb-1 pt-2"><?= $user['name']; ?></p>
                                        <p class="labelku pb-1"><?= $user['email']; ?></p>
                                        <p class="labelku" class="pb-1"><?= $user['no_telp']; ?></p>
                                        <label for="since">Member Since <?= date('d F Y', $user['date_created']); ?></label><br><br>
                                    </div>
                                    <div class="col-md-12 col-lg-6 mx-auto lab">
                                        <p class="labelku-lab">Testimoni Anda</p>
                                        <p class="text-justify"><?= $user['testi']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
</div>