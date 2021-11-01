<?= $this->extend('layout/template_login'); ?>
<?= $this->section('content'); ?>


<div class="registration-form">
    <?= form_open(base_url('Register/save')) ?>
    <div class="mt-4 text-center">
        <h2>DAFTAR</h2>
    </div>
    <div class="form-icon">
        <span><i class="fas fa-user"></i></i></span>
    </div>

    <?php if (session()->getFlashdata('pesan')) : ?>

        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>

    <?php endif; ?>

    <div class="form-group">
        <input type="text" class="form-control item <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="username" placeholder="Nama" name="nama" value="<?= old('nama') ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('nama'); ?>
        </div>
    </div>
    <div class="form-group">
        <input type="text" class="form-control item <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" placeholder="Username" name="username" value="<?= old('username') ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('username'); ?>
        </div>
    </div>
    <div class=" form-group">
        <input type="password" class="form-control item <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" name="password" value="<?= old('password') ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('password'); ?>
        </div>
    </div>
    <div class=" form-group">
        <input type="password" class="form-control item <?= ($validation->hasError('confPass')) ? 'is-invalid' : ''; ?>" id="phone-number" placeholder="konfirmasi password" name="confPass" value="<?= old('confPass') ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('confPass'); ?>
        </div>
    </div>
    <div class=" form-group">
        <input type="email" class="form-control item <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" placeholder="Email" name="email" value="<?= old('email') ?>">
        <div class="invalid-feedback">
            <?= $validation->getError('email'); ?>
        </div>
    </div>
    <div class=" form-group">
        <button type="submit" class="btn btn-block create-account">Create Account</button>
    </div>

    <div class="mt-4 text-center">
        sudah punya akun? <a href="<?= base_url('Login/') ?>">silahkan login</a>
    </div>
    <?= form_close() ?>
</div>
<?= $this->endSection(); ?>