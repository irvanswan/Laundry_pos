<!-- Isinya -->
<!-- Input Data -->
<div class="content mt-5">
    <!-- Input Data Pemesanan -->
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <?= $this->session->flashdata('message') ?>
                    <h5 class="text-center">Selamat Datang <?= $user['name']; ?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h4 class="card-title">Form Stok Barang</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/stok_barang'); ?>" name="cart" method="POST">
                        <div class="control-group">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive table-hover table-striped">
                                                <table name="cart" class="table">
                                                    <tr>
                                                        <th>Tindakan</th>
                                                        <th>Kode Barang</th>
                                                        <th>Nama Barang</th>
                                                        <th>Tanggal</th>
                                                        <th>Harga Satuan</th>
                                                        <th>Jumlah</th>
                                                        <th>Total Harga</th>
                                                        <th>Digunakan</th>
                                                        <th>Tersedia</th>
                                                    </tr>
                                                    <tr name="line_items">
                                                        <td>
                                                            <button class="btn btn-danger btn-fab btn-icon btn-round btn-sm" data-toggle="tooltip" data-placement="top" title="Tambah Form Data" name="remove">
                                                                <i class="now-ui-icons ui-1_simple-delete"></i>
                                                            </button>
                                                        </td>

                                                        <td>
                                                            <input type="text" name="kode_barang[]" id="kode_barang[]" value="<?php echo $kode_barang ?>">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="nama_barang[]" id="nama_barang" value="<?= set_value('nama_barang[]') ?>">
                                                            <?= form_error('nama_barang[]', '<small class="text-danger">', '</small>'); ?>
                                                        </td>
                                                        <td>
                                                            <input type="date" name="tanggal_barang[]" id="tanggal_barang" value="<?= set_value('tanggal_barang[]') ?>">
                                                            <?= form_error('tanggal_barang[]', '<small class="text-danger">', '</small>'); ?>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="harga_satuan[]" id="harga_satuan" value="<?= set_value('harga_satuan[]') ?>">
                                                            <?= form_error('harga_satuan[]', '<small class="text-danger">', '</small>'); ?>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="jumlah_barang[]" id="jumlah_barang" value="<?= set_value('jumlah_barang[]') ?>">
                                                            <?= form_error('jumlah_barang[]', '<small class="text-danger">', '</small>'); ?>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="total_harga_barang[]" id="total_harga_barang" value="" jAutoCalc="{#harga_satuan} * {#jumlah_barang}">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="digunakan[]" id="digunakan" value="<?= set_value('digunakan[]') ?>">
                                                            <?= form_error('digunakan[]', '<small class="text-danger">', '</small>'); ?>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="tersedia[]" id="tersedia" value="" jAutoCalc="{#jumlah_barang} - {#digunakan}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="99">
                                                            <button class="btn btn-info btn-fab btn-icon btn-round btn-sm" data-toggle="tooltip" data-placement="top" title="Tambah Form Data" name="add">
                                                                <i class="now-ui-icons ui-1_simple-add"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info ">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Of Input Data Pemesanan-->

    <!-- List Data -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Stok Barang</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-hover table-striped">
                        <table id="list_pemesanan" class="table">
                            <thead class="text-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Digunakan</th>
                                    <th>Tersedia</th>
                                    <th>Tanggal</th>
                                    <th class="text-center">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($stok as $stk) : ?>
                                <tr class="data-row-asli" id="data-row" name="list_data_pesan">
                                    <td><span><?= $i++ ?></span></td>
                                    <td>
                                        <span class="caption" name="kode_barang" data-id='<?= $stk['id_stok'] ?>'><?= $stk['kode_barang']; ?></span>

                                        <input type="text" name="kode_barang" class="editor" value="<?= $stk['kode_barang']; ?>" data-id="<?= $stk['kode_barang'] ?>" disabled>
                                    </td>
                                    <td>
                                        <span class="caption" name="nama_barang" data-id='<?= $stk['id_stok'] ?>'><?= $stk['nama_barang']; ?></span>

                                        <input type="text" name="nama_barang" class="editor" value="<?= $stk['nama_barang']; ?>" data-id="<?= $stk['id_stok'] ?>">
                                    </td>
                                    <td>
                                        <span class="caption" name="harga_satuan" data-id='<?= $stk['id_stok'] ?>'><?= number_format($stk['harga_satuan'], 2, ',', '.'); ?></span>
    
                                        <input type="text" name="harga_satuan" class="editor" value="<?= number_format($stk['harga_satuan'], 2, ',', '.'); ?>" data-id="<?= $stk['id_stok'] ?>">
                                    </td>
                                    <td>
                                        <span class="caption" name="jumlah_barang" data-id='<?= $stk['id_stok'] ?>'><?= $stk['jumlah_barang']; ?></span>
    
                                        <input type="text" name="jumlah_barang" class="editor" value="<?= $stk['jumlah_barang']; ?>" data-id="<?= $stk['jumlah_barang']; ?>">
                                    </td>
                                    <td><?= number_format($stk['total_harga_barang'], 2, ',', '.'); ?></td>
                                    <td class="text-center"><?= $stk['digunakan']; ?></td>
                                    <td><?= $stk['tersedia']; ?></td>
                                    <td><?= date('d-m-Y', strtotime($stk['tanggal_barang'])); ?></td>
                                    <td>
                                        <div class="col-sm-6 mb-1">
                                            <button type="submit" class="btn btn-warning btn_edit" title="Edit">
                                                <i class="now-ui-icons ui-2_settings-90"></i>
                                            </button>
                                            <button type="submit" data-id="<?php echo $stk['id_stok'] ?>" class="btn btn-primary btn_confirms" id="btn_confirm" title="Edit">
                                                    <i class="now-ui-icons ui-1_check"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-6 mr-1">
                                            <form action="<?= base_url('admin/hapusstok'); ?>" class="text-center" method="POST">
                                                <input type="hidden" name="id_stok" value="<?php echo $stk['id_stok']; ?>">
                                                    <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Inactive" onclick="return confirm('Apakah anda yakin menghapus data ini ?');">
                                                        <i class="now-ui-icons ui-1_simple-remove"></i>
                                                    </button>
                                            </form>
                                        </div>
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