<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="mx-auto mt-5 px-5 py-5">
                <div class="card text-dark bg-light mt-2 card-us">
                    <?= $this->session->flashdata('message') ?>
                    <div class="card-header bg-info py-3 mb-3 text-center card-head">
                        <h6>
                            <a href="<?= base_url('auth/register'); ?>" class="text my-auto text-center">Belum punya akun? Daftar</a>
                        </h6>
                    </div>
                    <div class="card-body card-bodreg mb-1">
                        <h5 class="card-title mb-4">Login</h5>
                        <form action="<?= base_url('auth'); ?>" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-info">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center pt-4 mt-4">
                        <h6>
                            <a href="<?= base_url('auth/forgot_password'); ?>" class="btn btn-info btn-round" style="font-size: 60%; font-weight: 900;">Lupa password? <i class="now-ui-icons arrows-1_minimal-right"></i> </a>
                        </h6>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>