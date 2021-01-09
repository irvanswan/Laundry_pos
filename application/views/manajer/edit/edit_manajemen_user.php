 <!-- Input Data -->
 <div class="content mt-5">
     <!-- Input Edit Data User -->
     <div class="row">
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
                         <div class="col-md-9">
                             <h4 class="card-title">Form Edit Data User</h4>
                         </div>
                     </div>
                 </div>
                 <div class="card-body">
                     <form action="<?= base_url('manajer/update_manajemen_user') ?>" method="POST" name="formEditManajemenUser">
                         <div class="control-group after-add-more">
                             <div class="form-row">
                                 <div class="form-group col-md-3">
                                     <label for="name">Fullname</label>
                                     <input type="hidden" name="id" id="id" value="<?= $em_user['id']; ?>">
                                     <input type="text" class="form-control" name="name" id="name" value="<?= $em_user['name']; ?>">
                                     <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                 </div>
                                 <div class="form-group col-md-3">
                                     <label for="email">Email</label>
                                     <input type="email" class="form-control" name="email" id="email" value="<?= $em_user['email']; ?>">
                                     <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                 </div>
                                 <div class="form-group col-md-3">
                                     <label for="alamat">Alamat</label>
                                     <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $em_user['alamat']; ?>">
                                     <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                 </div>
                                 <div class="form-group col-md-3">
                                     <label for="is_active">Status Aktif</label>
                                     <select id="is_active" class="form-control" name="is_active">
                                         <option value="1" <?= ($em_user['is_active'] == 1) ? 'selected' : ''; ?>>Active</option>
                                         <option value="0" <?= ($em_user['is_active'] == 0) ? 'selected' : ''; ?>>Inactive</option>
                                     </select>
                                     <?= form_error('is_active', '<small class="text-danger">', '</small>'); ?>
                                 </div>
                             </div>
                             <div class="form-row justify-content-center">
                                 <div class="form-group col-md-2">
                                     <label for="jam_masuk">Jam Masuk</label>
                                     <input type="time" class="form-control" name="jam_masuk" id="jam_masuk" value="<?= $em_user['jam_masuk']; ?>">
                                     <?= form_error('jam_masuk', '<small class="text-danger">', '</small>'); ?>
                                 </div>
                                 <div class="form-group col-md-2">
                                     <label for="jam_keluar">Jam Pulang</label>
                                     <input type="time" class="form-control" name="jam_keluar" id="jam_keluar" value="<?= $em_user['jam_keluar']; ?>">
                                     <?= form_error('jam_keluar', '<small class="text-danger">', '</small>'); ?>
                                 </div>
                                 <div class="form-group col-md-4">
                                     <label for="no_telp">No Whatsapp Aktif</label>
                                     <input type="tel" class="form-control" name="no_telp" class="no_telp" id="no_telp" value="<?= $em_user['no_telp']; ?>">
                                     <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                                 </div>
                             </div>
                             <button type="submit" class="btn btn-info">Simpan</button>
                             <a href="<?= base_url('manajer/manajemen_user') ?>" class="btn btn-primary">
                                 <i class="now-ui-icons arrows-1_minimal-left"></i>
                             </a>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Of Input Edit Data User-->
 </div>