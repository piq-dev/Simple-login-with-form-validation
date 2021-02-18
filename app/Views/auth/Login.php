<?= $this->extend('auth/themplates/index'); ?>
<?= $this->section('content'); ?>

<div class="d-md-flex h-md-100 align-items-center">

    <!-- Screen kiri -->

    <div class="col-md-6 p-0 bg-indigo h-md-100">
        <div class="text-white d-md-flex align-items-center h-100 text-center justify-content-center">
            <div id="particles-js"></div>
        </div>
    </div>

    <!-- Screen kanan -->

    <div class="col-md-6 p-0 bg-white h-md-100 loginarea">
        <div class="d-md-flex align-items-center h-md-100 p-5 justify-content-center">
            <form method="POST" action="<?= base_url('auth/login'); ?>">
                <h2>Login</h2>
                <small class="text-muted">Login menggunakan email dan password untuk melihat biodata
                    pribadi anda.</small>
                <p>
                    <?php
                    if (!empty(session()->getFlashdata('berhasil'))) { ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('berhasil') ?>
                </div>
            <?php } ?>
            </p>
            <p>
                <?php
                if (!empty(session()->getFlashdata('gagal'))) { ?>
            <div class="alert alert-danger">
                <?php echo session()->getFlashdata('gagal') ?>
            </div>
        <?php } ?>
        </p>

        <div class="form-group mt-4">
            <label>Username</label>
            <input type="text" class="form-control form-control-lg" placeholder="masukan username" name="username" />
        </div>
        <div class="form-group mb-4">
            <label>Password</label>
            <input type="password" class="form-control form-control-lg" placeholder="masukan password" name="password" />
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">
            Login
        </button>
        <label class="mt-4">Belum memiliki akun?
            <span><a href="<?= base_url('Auth/registerView'); ?>">Register</a></span></label>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>