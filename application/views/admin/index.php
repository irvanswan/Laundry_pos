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
                            <h4 class="card-title">Form Data Pemesanan</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/index'); ?>" name="cart" method="POST">
                        <div class="control-group">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="no_pemesanan">No Pemesanan</label>
                                    <input type="text" class="form-control" name="no_pemesanan" id="no_pemesanan" placeholder="cth : 20/12/00001" value="<?php echo $kode ?>" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nama_customer">Nama Customer</label>
                                    <input type="text" class="form-control autofill" name="nama_customer" id="nama_customer" value="<?= set_value('nama_customer') ?>">
                                    <?= form_error('nama_customer', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nama_kasir">Nama Kasir</label>
                                    <input type="text" class="form-control" name="nama_kasir" value="<?= $user['name']; ?>" id="nama_kasir" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_telp_customer">No Whatsapp Aktif</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+62</div>
                                        </div>
                                        <input type="tel" class="form-control" name="no_telp_customer" id="no_telp_customer" placeholder="85..." value="<?= set_value('no_telp_customer') ?>">
                                    </div>
                                    <?= form_error('no_telp_customer', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control" name="status">
                                        <option value="">Pilih...</option>
                                        <option value="0">Tunggu</option>
                                        <option value="1">Cuci - Siap Ambil</option>
                                        <option value="2">Dryer - Siap Ambil</option>
                                        <option value="3">Setrika - Siap Ambil</option>
                                        <option value="4">Selesai</option>
                                    </select>
                                    <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive table-hover table-striped">
                                                <table name="cart" class="table">
                                                    <tr>
                                                        <th>Tindakan</th>
                                                        <th>Berat</th>
                                                        <th>Paket</th>
                                                        <th>Jenis</th>
                                                        <th>Parfum</th>
                                                        <th>&nbsp;</th>
                                                        <th>Item Total</th>
                                                    </tr>
                                                    <tr name="line_items">
                                                        <td>
                                                            <button class="btn btn-danger btn-fab btn-icon btn-round btn-sm" data-toggle="tooltip" data-placement="top" title="Tambah Form Data" name="remove">
                                                                <i class="now-ui-icons ui-1_simple-delete"></i>
                                                            </button>
                                                        </td>

                                                        <td>
                                                            <input type="number" name="berat[]" id="berat" value="<?= set_value('berat[]') ?>">
                                                            <?= form_error('berat[]', '<small class="text-danger">', '</small>'); ?>
                                                        </td>
                                                        <td>
                                                            <select name="paket[]" id="paket">
                                                                <option value="1000">Paket A</option>
                                                                <option value="2000">Paket B</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select name="jenis[]" id="jenis">
                                                                <option value="1000">Jenis A</option>
                                                                <option value="2000">Jenis B</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select name="parfum[]" id="parfum">
                                                                <option value="1000">Parfum A</option>
                                                                <option value="2000">Parfum B</option>
                                                            </select>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <input type="text" name="item_total[]" id="item_total" value="" jAutoCalc="{#berat} * ({#paket} + {#jenis} + {#parfum})">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">&nbsp;</td>
                                                        <td>Harga Total</td>
                                                        <td>&nbsp;</td>
                                                        <td> 
                                                            <input type="text" name="harga_total" id="harga_total" value="" jAutoCalc="SUM({item_total[]})">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">&nbsp;</td>
                                                        <td>Bayar</td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                                <input type="text"  name="bayar" id="bayar" value="<?= set_value('bayar'); ?>" id="bayar">
                                                                <?= form_error('bayar', '<small class="text-danger">', '</small>'); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">&nbsp;</td>
                                                        <td>Kembalian</td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                                <input type="text"  name="kembalian" value="" jAutoCalc="{#bayar} - {#harga_total}">
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
                    <h4 class="card-title">List Pemesanan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-hover table-striped">
                        <form class="row">
                            <div class="form-group col-md-2">
                                <label for="from-date">From :</label>
                                <input type="date" id="from-date" name="trip-start" value="<?php echo date("d-m-Y"); ?>" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="to-date">To :</label>
                                <input type="date" id="to-date" name="trip-start" value="<?php echo date("d-m-Y"); ?>" class="form-control">
                            </div>
                        </form>
                        <table id="list_pemesanan" class="table" name="cart">
                            <thead class="text-primary">
                                <tr>
                                    <th>No</th>
                                    <th>No Pemesanan</th>
                                    <th>Nama Customer</th>
                                    <th>Nama Kasir</th>
                                    <th>Grand Total</th>
                                    <th>No. Telp</th>
                                    <th class="text-center">Tindakan</th>
                                    <th>Struk</th>
                                    <th>Pesan WA</th>
                                    <th>Lihat Rincian</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <?php
                                $no = 1;
                                foreach ($data_pemesanan as $dt) {
                                ?>
                                <tr class="data-row-asli" id="data-row" name="list_data_pesan">
                                    <td><span><?php echo $no++ ?></span></td>
                                    <td>
                                        <span class="caption" name="no_pemesanan" data-id='<?php echo $dt['id_pemesanan'] ?>'><?php echo $dt['no_pemesanan']; ?></span>
                                        <input type="text" name="no_pemesanan" class="editor" value="<?php echo $dt['no_pemesanan']; ?>" data-id="<?php echo $dt['no_pemesanan'] ?>" disabled>
                                    </td>
                                    <td>
                                        <span class="caption" name="nama_customer" data-id='<?php echo $dt['id_pemesanan'] ?>'><?php echo $dt['nama_customer']; ?></span>
                                        <input type="text" name="nama_customer" value="<?php echo $dt['nama_customer']; ?>" class="editor" data-id='<?php echo $dt['id_pemesanan'] ?>'>
                                    </td>
                                    <td>
                                        <span class="caption" data-id='<?php echo $dt['id_pemesanan'] ?>' name="nama_kasir"><?php echo $dt['nama_kasir']; ?></span>
                                        <input type="text" name="nama_kasir" value="<?php echo $dt['nama_kasir']; ?>" class="editor" data-id='<?php echo $dt['id_pemesanan'] ?>' disabled>
                                    </td>
                                    <td>
                                        <span class="caption" name="grand_ttl" data-id='<?php echo $dt['id_pemesanan'] ?>'><?php echo $dt['total_pemesanan']; ?></span>
                                        <input type="text" name="grand_ttl" class="editor" data-id="<?php echo $dt['id_pemesanan'] ?>" value="<?php echo $dt['total_pemesanan'] ?>" disabled>
                                    </td>
                                    <td>
                                        <span class="caption" name="no_telp_customer" data-id='<?php echo $dt['id_pemesanan'] ?>'><?php echo $dt['no_telp_customer']; ?></span>
                                        <input type="text" name="no_telp_customer" class="editor" data-id="<?php echo $dt['id_pemesanan'] ?>" value="<?php echo $dt['no_telp_customer'] ?>">
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-warning btn_edit" title="Edit">
                                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                                </button>
                                                <button type="submit" data-id="<?php echo $dt['id_pemesanan'] ?>" class="btn btn-primary btn_confirms" id="btn_confirm" title="Edit">
                                                    <i class="now-ui-icons ui-1_check"></i>
                                                </button>
                                            </div>
                                            <div class="col-sm-6">
                                                <form action="<?= base_url('admin/hapuspemesanan'); ?>" class="text-center" method="POST">
                                                    <input type="hidden" name="id_pemesanan" value="<?php echo $dt['id_pemesanan']; ?>">
                                                    <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Inactive" onclick="return confirm('Apakah anda yakin menghapus data ini ?');">
                                                        <i class="now-ui-icons ui-1_simple-remove"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="<?= base_url('admin/printpemesanan'); ?>" class=" text-center" method="POST">
                                            <input type="hidden" name="id_pemesanan" value="<?php echo $dt['id_pemesanan']; ?>">
                                            <input type="hidden" name="no_pemesanan" value="<?php echo $dt['no_pemesanan']; ?>">
                                            <button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Cetak Struk">
                                                <i class="now-ui-icons files_paper"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="" class=" text-center">
                                            <input type="hidden" name="" id="">
                                            <button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Cetak Struk">
                                                <i class="now-ui-icons ui-1_send"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary" title="Lihat" data-id="<?php echo $dt['id_pemesanan'] ?>">
                                             <i class="now-ui-icons ui-1_zoom-bold"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php } ?>
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