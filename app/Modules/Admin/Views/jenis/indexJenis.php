<?= $this->extend('layout/templateAdmin'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">

            <h1 class="mt-2"> Data Jenis</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>

                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>

            <?php endif; ?>

            <?= form_open(base_url('Jenis/addJenis')) ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control <?= ($validation->hasError('jenis_bunga')) ? 'is-invalid' : ''; ?> " aria-label="Recipient's username" aria-describedby="button-addon2" name="jenis_bunga" value="<?= old('jenis_bunga') ?>">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Tambah</button>
                </div>
                <div class="invalid-feedback">
                    <?= $validation->getError('jenis_bunga'); ?>
                </div>
            </div>
            <?= form_close() ?>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis Bunga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($jenis as $j) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $j['jenis_bunga']; ?></td>
                            <td>
                                <form action="<?= base_url('Jenis/delJenis/' . $j['id_jenis']) ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Pastikan tipe tidak ada di index');"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>

                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('jenis', 'florist_pagination') ?>
            <a href="<?= base_url('Florist') ?>">
                <button type="button" class="btn btn-danger">back </button>
            </a>
        </div>

    </div>
</div>
</div>
<?= $this->endSection(); ?>