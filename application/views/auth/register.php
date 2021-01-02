<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="mx-auto mt-5 px-5 py-5">
                <div class="card text-dark bg-light mb-3 mt-2 card-us">
                    <?= $this->session->flashdata('message') ?>
                    <div class="card-header bg-info py-3 text-center card-head">
                        <h6>
                            <a href="<?= base_url('auth'); ?>" class="text">Sudah punya
                                akun? Login</a>
                        </h6>
                    </div>
                    <div class="card-body card-bodreg mb-2">
                        <h5 class="card-title">Form Pendaftar</h5>
                        <small class="text-danger text-justify smalest" style="font-size: 11px;">* Ingat No identitas Laundry anda, karena No identitas Laundry antara Manajer dan Admin nanti harus sama</small>
                        <form action="<?= base_url('auth/register'); ?>" method="POST" id="quote_form">
                            <div class="form-row mt-3">
                                <div class="form-group col-md-6">
                                    <label for="name">Fullname</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name') ?>">
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password1">Password</label>
                                    <input type="password" class="form-control" name="password1" id="password1">
                                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password2">Confirm Password</label>
                                    <input type="password" class="form-control" name="password2" id="password2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= set_value('alamat') ?>">
                                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="name_laundry">Nama Laundry</label>
                                    <input type="text" class="form-control" name="name_laundry" id="name_laundry" value="<?= set_value('name_laundry') ?>">
                                    <?= form_error('name_laundry', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="id_entitas">No Identitas Laundry</label>
                                    <input type="password" class="form-control" name="id_entitas" id="id_entitas" value="<?= set_value('id_entitas') ?>">
                                    <?= form_error('id_entitas', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="no_telp">No Whatsapp Aktif</label>
                                    <input type="phone" class="form-control" name="no_telp" id="no_telp" placeholder="cth : 085 . . ." value="<?= set_value('no_telp') ?>">
                                    <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-info">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>