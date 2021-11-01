<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>

<div class="container mb-5">
    <div class="row">
        <div class="container2 mt-4">
            <div class="col-8">

                <h2 class="my-3">From Tambah Data Pengguna</h2>
                <form action="<?= base_url('User/save') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row mb-3">
                        <label for="username" class="col-sm-4 col-form-label">Username</label>
                        <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" autofocus value="<?= old('username') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-sm-4 col-form-label">email</label>
                        <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" autofocus value="<?= old('email') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-sm-4 col-form-label">password</label>
                        <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" autofocus value="<?= old('password') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary">Kirim</button>
                    <a href="<?= base_url('User') ?>">
                        <button type="button" class="btn btn-danger">back </button>
                    </a>
                </form>


            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>