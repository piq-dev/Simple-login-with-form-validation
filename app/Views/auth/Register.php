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
            <form method="POST" action="<?= base_url('auth/register'); ?>" enctype="multipart/form-data">
                <h2>Register</h2>
                <small class="text-muted">Lengkapi data diri anda untuk mendaftar.</small>
                <div class="form-group mt-2">
                    <label>Nama Lengkap</label>
                    <input type="nama" class="form-control form-control-lg <?= ($validation->hasError('fullname') ? 'is-invalid' : ''); ?>" placeholder="masukan nama lengkap anda" name="fullname" autofocus value="<?= old('fullname'); ?>" />
                    <div class="invalid-feedback">
                        <?= $validation->getError('fullname'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Nim</label>
                    <input type="text" class="form-control form-control-lg  <?= ($validation->hasError('nim') ? 'is-invalid' : ''); ?>" placeholder="masukan nim anda" name="nim" value="<?= old('nim'); ?>" />
                    <div class=" invalid-feedback">
                        <?= $validation->getError('nim'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control form-control-lg  <?= ($validation->hasError('username') ? 'is-invalid' : ''); ?>" placeholder="masukan username anda" name="username" value="<?= old('username'); ?>" />
                    <div class=" invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label>Password</label>
                    <input type="password" class="form-control form-control-lg  <?= ($validation->hasError('password') ? 'is-invalid' : ''); ?>" placeholder="Masukan Password" name="password" value="<?= old('password'); ?>" />
                    <div class=" invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('profile') ? 'is-invalid' : ''); ?>" id="profile" name="profile">
                        <label class="custom-file-label" for="profile">Pilih Gambar</label>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('profile'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Register
                </button>
                <label class="mt-4">Sudah memiliki akun?
                    <span><a href="<?= base_url('/'); ?>">Login</a></span></label>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>