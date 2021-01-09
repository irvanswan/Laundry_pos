 <!-- Input Data -->
 <div class="content mt-5">
     <!-- Input Stok Pegawai -->
     <div class="row">
         <div class="col-lg-12">
             <div class="card">
                 <div class="card-header">
                     <div class="row">
                         <div class="col-md-9">
                             <h4 class="card-title">Form Stok Barang</h4>
                         </div>
                     </div>
                 </div>
                 <div class="card-body">
                     <form action="" name="formStok">
                         <div class="control-group after-add-more">
                             <div class="form-row">
                                 <div class="form-group col-md-4">
                                     <label for="nama_barang">Nama Barang</label>
                                     <input type="text" class="form-control" name="nama_barang[]" id="nama_barang" placeholder="So Klin . . .">
                                 </div>
                                 <div class="form-group col-md-4">
                                     <label for="kode_barang">Kode Barang</label>
                                     <input type="text" class="form-control" name="kode_barang[]" id="kode_barang" placeholder="cth : 20/12/b0001">
                                 </div>
                                 <div class="form-group col-md-4">
                                     <label for="tanggal_barang">Tanggal</label>
                                     <input type="date" class="form-control" name="tanggal_barang[]" id="tanggal_barang">
                                 </div>
                             </div>
                             <div class="form-row">
                                 <div class="form-group col-md-3">
                                     <label for="harga_satuan">Harga Satuan</label>
                                     <div class="input-group mb-2">
                                         <div class="input-group-prepend">
                                             <div class="input-group-text">Rp</div>
                                         </div>
                                         <input type="text" class="form-control" name="harga_satuan[]" id="harga_satuan">
                                     </div>
                                 </div>
                                 <div class="form-group col-md-3">
                                     <label for="jumlah">Jumlah</label>
                                     <input type="number" class="form-control" name="jumlah[]" id="jumlah" placeholder="1">
                                 </div>
                                 <div class="form-group col-md-3">
                                     <label for="digunakan">Digunakan</label>
                                     <input type="number" class="form-control" name="digunakan[]" id="digunakan" placeholder="1">
                                 </div>
                                 <div class="form-group col-md-3">
                                     <label for="tersedia">Tersedia</label>
                                     <input type="number" class="form-control" name="tersedia[]" id="tersedia" placeholder="1">
                                 </div>
                             </div>
                             <div class="form-row">
                                 <div class="form-group col-md-3">
                                     <label for="total_harga">Total Harga</label>
                                     <div class="input-group mb-2">
                                         <div class="input-group-prepend">
                                             <div class="input-group-text">Rp</div>
                                         </div>
                                         <input type="text" class="form-control money" name="total_harga[]" id="total_harga">
                                     </div>
                                 </div>
                             </div>
                             <button type="submit" class="btn btn-info">Simpan</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Of Input Stok Pegawai-->

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
                                     <th class="text-center">Tindakan</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>1</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>
                                         <form action="edit/edit_stok_barang.php" class="mb-3 text-center">
                                             <input type="hidden" name="" id="">
                                             <button type="submit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                                 <i class="now-ui-icons design_bullet-list-67"></i>
                                             </button>
                                         </form>
                                         <form action="" class=" text-center">
                                             <input type="hidden" name="" id="">
                                             <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Inactive">
                                                 <i class="now-ui-icons ui-1_simple-remove"></i>
                                             </button>
                                         </form>
                                     </td>
                                 </tr>
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

     <!-- Input Paket,Jenis,Bahan -->

     <div class="row">

         <!-- Paket -->

         <div class="col-lg-4 col-md-12">
             <div class="card">
                 <div class="card-header">
                     <div class="row">
                         <div class="col-md-9">
                             <h4 class="card-title">Paket Cuci</h4>
                         </div>
                     </div>
                 </div>
                 <div class="card-body">
                     <form action="" name="formPaketCuci">
                         <div class="control-group after-add-more">
                             <div class="form-row">
                                 <div class="form-group col-md-4 col-lg-12">
                                     <label for="nama_paket">Nama Paket</label>
                                     <input type="text" class="form-control" name="nama_paket[]" id="nama_paket">
                                 </div>
                                 <div class="form-group col-md-4 col-lg-12">
                                     <label for="harga_paket">Harga Paket</label>
                                     <input type="text" class="form-control" name="harga_paket[]" id="harga_paket">
                                 </div>
                                 <div class="form-group col-md-4 col-lg-12">
                                     <label for="tanggal_paket">Tanggal</label>
                                     <input type="date" class="form-control" name="tanggal_paket[]" id="tanggal_paket">
                                 </div>
                             </div>
                             <button type="submit" class="btn btn-info">Simpan</button>

                             <!-- Invisible -->
                             <div class="copy invisible">
                                 <div class="control-group">
                                     <hr>
                                     <div class="col-md-12 d-flex flex-row-reverse bd-highlight">
                                         <button class="btn btn-warning btn-fab btn-icon btn-round btn-sm d-flex flex-row-reverse bd-highlight remove" data-toggle="tooltip" data-placement="top" title="Reset Form Data" id="">
                                             <i class="now-ui-icons ui-1_simple-remove"></i>
                                         </button>
                                     </div>
                                     <div class="form-row">
                                         <div class="form-group col-md-4 col-lg-12">
                                             <label for="nama_paket">Nama Jenis</label>
                                             <input type="text" class="form-control" name="nama_paket[]" id="nama_paket">
                                         </div>
                                         <div class="form-group col-md-4 col-lg-12">
                                             <label for="harga_paket">Kode Barang</label>
                                             <input type="text" class="form-control" name="harga_paket[]" id="harga_paket">
                                         </div>
                                         <div class="form-group col-md-4 col-lg-12">
                                             <label for="tanggal_paket">Tanggal</label>
                                             <input type="date" class="form-control" name="tanggal_paket[]" id="tanggal_paket">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>

         <!-- End Paket -->

         <!-- Jenis -->
         <div class="col-lg-4 col-md-12">
             <div class="card">
                 <div class="card-header">
                     <div class="row">
                         <div class="col-md-9">
                             <h4 class="card-title">Jenis Cuci</h4>
                         </div>
                     </div>
                 </div>
                 <div class="card-body">
                     <form action="" name="formJenisCuci">
                         <div class="control-group after-add-more">
                             <div class="form-row">
                                 <div class="form-group col-md-4 col-lg-12">
                                     <label for="nama_jenis">Nama Jenis</label>
                                     <input type="text" class="form-control" name="nama_jenis[]" id="nama_jenis">
                                 </div>
                                 <div class="form-group col-md-4 col-lg-12">
                                     <label for="harga_jenis">Harga Jenis</label>
                                     <input type="text" class="form-control" name="harga_jenis[]" id="harga_jenis" placeholder="cth : 20/12/b0001">
                                 </div>
                                 <div class="form-group col-md-4 col-lg-12">
                                     <label for="tanggal_jenis">Tanggal</label>
                                     <input type="date" class="form-control" name="tanggal_jenis[]" id="tanggal_jenis">
                                 </div>
                             </div>
                             <button type="submit" class="btn btn-info">Simpan</button>

                             <!-- Invisible -->
                             <div class="copy invisible">
                                 <div class="control-group">
                                     <hr>
                                     <div class="col-md-12 d-flex flex-row-reverse bd-highlight">
                                         <button class="btn btn-warning btn-fab btn-icon btn-round btn-sm d-flex flex-row-reverse bd-highlight remove" data-toggle="tooltip" data-placement="top" title="Reset Form Data" id="">
                                             <i class="now-ui-icons ui-1_simple-remove"></i>
                                         </button>
                                     </div>
                                     <div class="form-row">
                                         <div class="form-group col-md-4 col-lg-12">
                                             <label for="nama_jenis">Nama Jenis</label>
                                             <input type="text" class="form-control" name="nama_jenis[]" id="nama_jenis">
                                         </div>
                                         <div class="form-group col-md-4 col-lg-12">
                                             <label for="harga_jenis">Harga Jenis</label>
                                             <input type="text" class="form-control" name="harga_jenis[]" id="harga_jenis">
                                         </div>
                                         <div class="form-group col-md-4 col-lg-12">
                                             <label for="tanggal_jenis">Tanggal</label>
                                             <input type="date" class="form-control" name="tanggal_jenis[]" id="tanggal_jenis">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>

         <!-- End Jenis -->

         <!-- Bahan -->

         <div class="col-lg-4 col-md-12">
             <div class="card">
                 <div class="card-header">
                     <div class="row">
                         <div class="col-md-9">
                             <h4 class="card-title">Bahan Cuci</h4>
                         </div>
                     </div>
                 </div>
                 <div class="card-body">
                     <form action="" name="formDataPemesanan">
                         <div class="control-group after-add-more">
                             <div class="form-row">
                                 <div class="form-group col-md-4 col-lg-12">
                                     <label for="nama_bahan">Nama Bahan</label>
                                     <input type="text" class="form-control" name="nama_bahan[]" id="nama_bahan">
                                 </div>
                                 <div class="form-group col-md-4 col-lg-12">
                                     <label for="harga_bahan">Harga Bahan</label>
                                     <input type="text" class="form-control" name="harga_bahan[]" id="harga_bahan">
                                 </div>
                                 <div class="form-group col-md-4 col-lg-12">
                                     <label for="tanggal_bahan">Tanggal</label>
                                     <input type="date" class="form-control" name="tanggal_bahan[]" id="tanggal_bahan">
                                 </div>
                             </div>
                             <button type="submit" class="btn btn-info">Simpan</button>

                             <!-- Invisible -->
                             <div class="copy invisible">
                                 <div class="control-group">
                                     <hr>
                                     <div class="col-md-12 d-flex flex-row-reverse bd-highlight">
                                         <button class="btn btn-warning btn-fab btn-icon btn-round btn-sm d-flex flex-row-reverse bd-highlight remove" data-toggle="tooltip" data-placement="top" title="Reset Form Data" id="">
                                             <i class="now-ui-icons ui-1_simple-remove"></i>
                                         </button>
                                     </div>
                                     <div class="form-row">
                                         <div class="form-group col-md-4 col-lg-12">
                                             <label for="nama_bahan">Nama Bahan</label>
                                             <input type="text" class="form-control" name="nama_bahan[]" id="nama_bahan">
                                         </div>
                                         <div class="form-group col-md-4 col-lg-12">
                                             <label for="harga_bahan">Harga Bahan</label>
                                             <input type="text" class="form-control" name="harga_bahan[]" id="harga_bahan">
                                         </div>
                                         <div class="form-group col-md-4 col-lg-12">
                                             <label for="tanggal_bahan">Tanggal</label>
                                             <input type="date" class="form-control" name="tanggal_bahan[]" id="tanggal_bahan">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         <!-- End Bahan -->
     </div>
     <!-- End Of Input Stok Pegawai-->

     <!-- List Data -->

     <div class="row">

         <div class="col-lg-4 col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title">List Paket Cuci</h4>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive table-hover table-striped">
                         <table id="list_pemesanan" class="table">
                             <thead class="text-primary">
                                 <tr>
                                     <th>No</th>
                                     <th>Nama Paket</th>
                                     <th>Harga Paket</th>
                                     <th>Tanggal</th>
                                     <th class="text-center">Tindakan</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>1</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>
                                         <form action="edit/edit_stok_barang.php" class="mb-3 text-center">
                                             <input type="hidden" name="" id="">
                                             <button type="submit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                                 <i class="now-ui-icons design_bullet-list-67"></i>
                                             </button>
                                         </form>
                                         <form action="" class=" text-center">
                                             <input type="hidden" name="" id="">
                                             <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Inactive">
                                                 <i class="now-ui-icons ui-1_simple-remove"></i>
                                             </button>
                                         </form>
                                     </td>
                                 </tr>
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

         <!-- End List Data -->



         <!-- List Data -->

         <div class="col-lg-4 col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title">List Jenis Cuci</h4>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive table-hover table-striped">
                         <table id="jenis" class="table">
                             <thead class="text-primary">
                                 <tr>
                                     <th>No</th>
                                     <th>Nama Jenis</th>
                                     <th>Harga Jenis</th>
                                     <th>Tanggal</th>
                                     <th class="text-center">Tindakan</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>1</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>
                                         <form action="edit/edit_stok_barang.php" class="mb-3 text-center">
                                             <input type="hidden" name="" id="">
                                             <button type="submit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                                 <i class="now-ui-icons design_bullet-list-67"></i>
                                             </button>
                                         </form>
                                         <form action="" class=" text-center">
                                             <input type="hidden" name="" id="">
                                             <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Inactive">
                                                 <i class="now-ui-icons ui-1_simple-remove"></i>
                                             </button>
                                         </form>
                                     </td>
                                 </tr>
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

         <!-- End List Data -->



         <!-- List Data -->
         <div class="col-lg-4 col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title">List Bahan Cuci</h4>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive table-hover table-striped">
                         <table id="bahan" class="table">
                             <thead class="text-primary">
                                 <tr>
                                     <th>No</th>
                                     <th>Nama Bahan</th>
                                     <th>Harga Bahan</th>
                                     <th>Tanggal</th>
                                     <th class="text-center">Tindakan</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>1</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>Lorem ipsum dolor sit amet consectetur</td>
                                     <td>
                                         <form action="edit/edit_stok_barang.php" class="mb-3 text-center">
                                             <input type="hidden" name="" id="">
                                             <button type="submit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                                 <i class="now-ui-icons design_bullet-list-67"></i>
                                             </button>
                                         </form>
                                         <form action="" class=" text-center">
                                             <input type="hidden" name="" id="">
                                             <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Inactive">
                                                 <i class="now-ui-icons ui-1_simple-remove"></i>
                                             </button>
                                         </form>
                                     </td>
                                 </tr>
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
 </div>
 <!-- End List Data -->