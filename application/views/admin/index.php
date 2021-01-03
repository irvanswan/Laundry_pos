<!-- Isinya -->
<!-- Input Data -->
<div class="content mt-5">
    <!-- Input Data Pemesanan -->
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Selamat Datang <?= $user['name']; ?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h4 class="card-title">Form Data Pemesanan</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/coba'); ?>" name="cart" method="POST" target="_blank">
                        <div class="control-group">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="no_pemesanan">No Pemesanan</label>
                                    <input type="text" class="form-control" name="no_pemesanan" id="no_pemesanan" placeholder="cth : 20/12/00001">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nama_customer">Nama Customer</label>
                                    <input type="text" class="form-control autofill" name="nama_customer" id="nama_customer">
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
                                        <input type="number" class="form-control" name="no_telp_customer" id="no_telp_customer" placeholder="85...">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control" name="status">
                                        <option selected>Pilih...</option>
                                        <option value="1">Tunggu</option>
                                        <option value="2">Cuci - Siap Ambil</option>
                                        <option value="3">Dryer - Siap Ambil</option>
                                        <option value="4">Setrika - Siap Ambil</option>
                                        <option value="5">Selesai</option>
                                    </select>
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
                                                        <th>Action</th>
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

                                                        <td><input class="form-control" type="number" name="berat[]" id="berat"></td>
                                                        <td>
                                                            <select class="form-control" name="paket[]" id="paket">
                                                                <option value="1000">Paket A</option>
                                                                <option value="2000">Paket B</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="jenis[]" id="jenis">
                                                                <option value="1000">Jenis A</option>
                                                                <option value="2000">Jenis B</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="parfum[]" id="parfum">
                                                                <option value="1000">Parfum A</option>
                                                                <option value="2000">Parfum B</option>
                                                            </select>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                        <td><input type="text" class="form-control" name="item_total" id="item_total" value="" jAutoCalc="{#berat} * ({#paket} + {#jenis} + {#parfum})"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">&nbsp;</td>
                                                        <td>Harga Total</td>
                                                        <td>&nbsp;</td>
                                                        <td><input type="text" class="form-control" name="harga_total" id="harga_total" value="" jAutoCalc="SUM({item_total})"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">&nbsp;</td>
                                                        <td>Bayar</td>
                                                        <td>&nbsp;</td>
                                                        <td><input type="text" class="form-control" name="bayar" id="bayar" value="" id="bayar"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">&nbsp;</td>
                                                        <td>Kembalian</td>
                                                        <td>&nbsp;</td>
                                                        <td><input type="text" class="form-control" name="kembalian" value="" jAutoCalc="{#bayar} - {#harga_total}"></td>
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
                        <table id="list_pemesanan" class="table">
                            <thead class="text-primary">
                                <tr>
                                    <th>No</th>
                                    <th>No Pemesanan</th>
                                    <th>Nama Customer</th>
                                    <th>Nama Kasir</th>
                                    <th>Jenis Cucian</th>
                                    <th>Paket Cucian</th>
                                    <th>Berat Cucian</th>
                                    <th>Parfum Cucian</th>
                                    <th>Total Pemesanan</th>
                                    <th>No. Telp</th>
                                    <th class="text-center" colspan="2">Tindakan</th>
                                    <th>Struk</th>
                                    <th>Pesan WA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data_pemesanan as $dt) {
                                ?>
                                <tr class="data-row">
                                    <td><span><?php echo $no++ ?></span></td>
                                    <td>
                                        <span class="caption" name="no_pemesanan" data-id='<?php echo $dt['id_pemesanan'] ?>'><?php echo $dt['no_pemesanan']; ?></span>
                                        <input type="text" name="no_pemesanan" class="editor" value="<?php echo $dt['no_pemesanan']; ?>" data-id=<?php echo $dt['no_pemesanan'] ?>>
                                    </td>
                                    <td>
                                        <span class="caption" name="nama_customer" data-id='<?php echo $dt['id_pemesanan'] ?>'><?php echo $dt['nama_customer']; ?></span>
                                        <input type="text" name="nama_customer" value="<?php echo $dt['nama_customer']; ?>" class="editor" data-id='<?php echo $dt['id_pemesanan'] ?>'>
                                    </td>
                                    <td>
                                        <span class="caption" data-id='<?php echo $dt['id_pemesanan'] ?>' name="nama_kasir"><?php echo $dt['nama_kasir']; ?></span>
                                        <input type="text" name="nama_kasir" value="<?php echo $dt['nama_kasir']; ?>" class="editor" data-id='<?php echo $dt['id_pemesanan'] ?>'>
                                    </td>
                                    <td>
                                        <span class="caption" data-id='<?php echo $dt['id_pemesanan'] ?>' name="jenis_cucian"><?php echo $dt['jenis_cucian']; ?></span>
                                        <input type="text" name="jenis_cucian" value="<?php echo $dt['jenis_cucian'] ?>" data-id='<?php echo $dt['id_pemesanan'] ?>' class = "editor">
                                    </td>
                                    <td>
                                        <span class="caption" data-id='<?php echo $dt['id_pemesanan'] ?>'  name="paket_cucian"><?php echo $dt['paket_cucian']; ?></span>
                                        <input type="text" name="paket_cucian" class="editor" value="<?php echo $dt['paket_cucian'] ?>" data-id='<?php echo $dt['id_pemesanan'] ?>'>
                                    </td>
                                    <td>
                                        <span class="caption" data-id='<?php echo $dt['id_pemesanan'] ?>' name="berat_cucian"><?php echo $dt['berat_cucian']; ?></span>
                                        <input type="text" name="berat_cucian" class="editor" value="<?php echo $dt['berat_cucian'] ?>" data-id='<?php echo $dt['id_pemesanan'] ?>'>
                                    </td>
                                    <td>
                                        <span class="caption" name="parfum_cucian" data-id='<?php echo $dt['id_pemesanan'] ?>'><?php echo $dt['parfum_cucian']; ?></span>
                                        <input type="text" name="parfum_cucian" class="editor" value="<?php echo $dt['parfum_cucian'] ?>" data-id='<?php echo $dt['id_pemesanan'] ?>'>
                                    </td>
                                    <td>
                                        <span class="caption" name="total_pemesanan" data-id='<?php echo $dt['id_pemesanan'] ?>'><?php echo $dt['total_pemesanan'] ?></span>
                                        <input type="text" name="total_pemesanan" class="editor" value="<?php echo $dt['total_pemesanan'] ?>" data-id='<?php echo $dt['id_pemesanan'] ?>'>
                                    </td>
                                    <td>
                                        <span class="caption" name="no_telp_customer" data-id='<?php echo $dt['id_pemesanan'] ?>'><?php echo $dt['no_telp_customer']; ?></span>
                                        <input type="text" name="no_telp_customer" class="editor" data-id="<?php echo $dt['id_pemesanan'] ?>" value="<?php echo $dt['no_telp_customer'] ?>">
                                    </td>
                                    <td>
                                        <form action="<?= base_url('admin/hapuspemesanan'); ?>" class="text-center" method="POST">
                                            <input type="hidden" name="id_pemesanan" value="<?php echo $dt['id_pemesanan']; ?>">
                                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Inactive" onclick="return confirm('Apakah anda yakin menghapus data ini ?');">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </button>
                                        </form>
                                        
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-warning btn_edit" title="Edit"><i></i></button>
                                        <button type="submit" data-id="<?php echo $dt['id_pemesanan'] ?>" class="btn btn-primary btn_confirms" id="btn_confirm" title="Edit">v</button>
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
                                </tr>
                                <tr>
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