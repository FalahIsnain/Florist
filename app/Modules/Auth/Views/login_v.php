<?= $this->extend('layout/template_login'); ?>
<?= $this->section('content'); ?>


<div class="registration-form">

    <?= form_open(base_url('Login/auth')) ?>
    <div class="mt-4 text-center">
        <h2>LOGIN</h2>
    </div>
    <div class="form-icon">
        <span><i class="fas fa-user"></i></i></span>
    </div>
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('pesan') ?></div>
    <?php endif; ?>
    <div class="form-group">
        <input type="email" class="form-control item" id="Email" placeholder="Email" name="email" value="<?= old('email') ?>">
    </div>
    <div class="form-group">
        <input type="password" class="form-control item" id="password" placeholder="Password" name="password" value="<?= old('password') ?>">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-block create-account">Login</button>
    </div>
    <div class="mt-4 text-center">
        Belum punya akun? <a href="<?= base_url('Register/') ?>">silahkan daftar</a>
    </div>
    <?= form_close() ?>
</div>
<?= $this->endSection(); ?>