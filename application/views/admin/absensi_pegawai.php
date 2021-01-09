<!-- Input Data -->
<div class="content mt-5">
    <!-- Input Absensi Pegawai -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <?= $this->session->flashdata('message') ?>
                    <h5 class="text-center">Selamat Datang <?= $user['name']; ?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">Form Absensi Pegawai</h4>
                        </div>
                        <div class="col-md-5 d-flex flex-row-reverse bd-highlight">
                            <small class="text-danger text-justify">* Absen hanya diperbolehkan pada pukul <?= $user['jam_masuk']; ?> sampai <?= $user['jam_keluar']; ?></small>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/absensi_pegawai'); ?>" name="formAbsensi" method="POST">
                        <div class="control-group after-add-more">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="nama_pegawai">Nama Pegawai</label>
                                    <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Santika Dewi . . .">
                                    <?= form_error('nama_pegawai', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tanggal_hadir">Tanggal Hadir</label>
                                    <input type="date" class="form-control" name="tanggal_hadir" id="tanggal_hadir">
                                    <?= form_error('tanggal_hadir', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="presensi">Presensi</label>
                                    <select id="presensi" class="form-control" name="presensi">
                                        <option value="">Pilih . . .</option>
                                        <option value="1">Hadir</option>
                                        <option value="0">Absen</option>
                                    </select>
                                    <?= form_error('presensi', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <?php
                            $current_time = date('H:i', strtotime('+9 hour', strtotime(date('H:i:s'))));
                            $start_time = date('H:i', strtotime($user['jam_masuk']));
                            $end_time = date('H:i', strtotime($user['jam_keluar']));
                            if ($current_time >= $start_time and $current_time <= $end_time) {
                                echo '<button type="submit" class="btn btn-info">Simpan</button>';
                            } else {
                                echo '<button type="submit" class="btn btn-info disabled">Simpan</button>';
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Of Input Absensi Pegawai-->

    <!-- List Data -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Absen Pegawai</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-hover table-striped">
                        <table id="list_pemesanan" class="table">
                            <thead class="text-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Tanggal</th>
                                    <th>Presensi</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($data_absen as $da) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $da['nama_pegawai']; ?></td>
                                        <td><?= $da['tanggal_hadir']; ?></td>
                                        <td><?= ($da['presensi'] == 1 ? 'Hadir' : 'Absen'); ?></td>
                                        <td>
                                            <?= date('H:i', strtotime($da['jam_masuk'])); ?>
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