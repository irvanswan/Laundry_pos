<!-- Isinya -->
<!-- Input Data -->
<div class="content mt-5">
    <!-- Input Data User -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Selamat Datang <?= $user['name']; ?></h5>
                    <?= $this->session->flashdata('message') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">Form Tambah User Admin</h4>
                            <!-- <h5 class="card-category">Data ke - 1</h5> -->
                        </div>
                        <div class="col-md-5 d-flex flex-row-reverse bd-highlight">
                            <small class="text-danger text-justify">* Diwajibkan No Identitas Laundry Adminharus sama dengan No Identitas Laundry Manajer saat mendaftar</small>
                        </div>
                        <!-- <div class="col-md-3 d-flex flex-row-reverse bd-highlight">
                                        <button class="btn btn-info btn-fab btn-icon btn-round btn-sm" data-toggle="tooltip" data-placement="top" title="Tambah Form Data" id="add-more">
                                        <i class="now-ui-icons ui-1_simple-add"></i>
                                        </button>
                                    </div> -->
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('manajer/manajemen_user') ?>" method="POST" name="formDataUser">
                        <div class="control-group after-add-more">
                            <div class="form-row">
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
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= set_value('alamat') ?>">
                                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="name_laundry">Nama Laundry</label>
                                    <input type="text" class="form-control" name="name_laundry" id="name_laundry" value="<?= set_value('name_laundry') ?>">
                                    <?= form_error('name_laundry', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="id_entitas">No Identitas Laundry</label>
                                    <input type="text" class="form-control" name="id_entitas" id="id_entitas" value="<?= set_value('id_entitas') ?>">
                                    <?= form_error('id_entitas', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="no_telp">No Whatsapp Aktif</label>
                                    <input type="tel" class="form-control" name="no_telp" id="no_telp" value="<?= set_value('no_telp') ?>">
                                    <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <!-- Invisible -->

                            <!-- <div class="copy invisible">
                                <div class="control-group">
                                    <hr>
                                    <div class="col-md-12 d-flex flex-row-reverse bd-highlight">
                                        <button class="btn btn-warning btn-fab btn-icon btn-round btn-sm d-flex flex-row-reverse bd-highlight remove" data-toggle="tooltip" data-placement="top" title="Reset Form Data" id="">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Fullname</label>
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="password1">Password</label>
                                            <input type="password" class="form-control" name="password1" id="password1">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" id="alamat">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="laundry_name">Nama Laundry</label>
                                            <input type="text" class="form-control" name="laundry_name" class="laundry_name" id="laundry_name">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="no_identitas">No Identitas Laundry</label>
                                            <input type="number" class="form-control" name="no_identitas" class="no_identitas" id="no_identitas">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="no_telp">No Whatsapp Aktif</label>
                                            <input type="tel" class="form-control" name="no_telp" class="no_telp" id="no_telp">
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div id="insert-form"></div> -->
                            <button type="submit" class="btn btn-info ">Simpan</button>
                        </div>
                    </form>
                    <!-- <input type="hidden" id="jumlah-form" value="1"> -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Of Input Data User-->

    <!-- List Data -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Data User</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-hover table-striped">
                        <table id="list_pemesanan" class="table">
                            <thead class="text-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Whatsapp</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Waktu Daftar</th>
                                    <th class="text-center">Photos</th>
                                    <th class="text-center">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($m_user as $musr) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $musr['name']; ?></td>
                                        <td><?= $musr['email']; ?></td>
                                        <td><?= $musr['no_telp']; ?></td>
                                        <td><?= $musr['alamat']; ?></td>
                                        <td><?= $musr['role_id']; ?></td>
                                        <td><?= date('d F Y', $musr['date_created']); ?></td>
                                        <td>
                                            <div class="row col-md-5 mx-auto">
                                                <img class="img-thumbnail" src="<?= base_url('assets/img/profile/') . $musr['image']; ?>" alt="pict">
                                            </div>
                                        </td>
                                        <td>
                                            <form action="<?= base_url('manajer/edit_manajemen_user') ?>" method="POST" class="mb-3 text-center">
                                                <input type="hidden" name="id" id="id" value="<?= $musr['id']; ?>">
                                                <button type="submit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="now-ui-icons design_bullet-list-67"></i>
                                                </button>
                                            </form>
                                            <form action="<?= base_url('manajer/inactive_manajemen_user') ?>" method="POST" class="text-center">
                                                <input type="hidden" name="id" id="id" value="<?= $musr['id']; ?>">
                                                <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Inactive">
                                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
<!-- End of Input Data -->
<!-- End of Isinya -->