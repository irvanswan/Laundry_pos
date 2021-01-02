<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="mx-auto mt-5 px-5 py-5">
                <div class="card text-dark bg-light mt-2 card-us">
                    <h5 class="card-title mb-4 text-center bg-info py-3 text-center card-head">Reset
                        Password</h5>
                    <p class="text-center px-3 sub-forgot">Silahkan reset password anda jika lupa dengan
                        menginputkan email
                        anda
                    </p>
                    <div class="card-body card-bodreg mb-1">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?= base_url('auth/forgot_password') ?>" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-7 mx-auto">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center pt-4 mt-4">
                        <h6>
                            <a href="<?= base_url('auth'); ?>" class="btn btn-info btn-round" style="font-size: 60%; font-weight: 900;"> <i class="now-ui-icons arrows-1_minimal-left"></i> Kembali</a>
                        </h6>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>