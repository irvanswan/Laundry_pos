<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="mx-auto mt-5 px-5 py-5">
                <div class="card text-dark bg-light mt-2 card-us">
                    <div class="card-body card-bodreg mb-1">
                        <h5 class="card-title mb-4">Reset your password</h5>
                        <h6 class="card-title mb-4">Change your password for <?= $this->session->userdata('reset_email'); ?> </h6>
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?= base_url('auth/change_password'); ?>" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="password1">Password</label>
                                    <input type="password" class="form-control" name="password1" id="password1">
                                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="password2">Confirm Password</label>
                                    <input type="password" class="form-control" name="password2" id="password2">
                                    <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-info">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>