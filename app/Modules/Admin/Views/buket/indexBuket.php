<?= $this->extend('layout/templateAdmin'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">

            <h1 class="mt-2"> Data Buket</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>

                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>

            <?php endif; ?>

            <?= form_open(base_url('Buket/addBuket')) ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control <?= ($validation->hasError('tipe_buket')) ? 'is-invalid' : ''; ?> " aria-describedby="button-addon2" name="tipe_buket" value="<?= old('tipe_buket') ?>">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Tambah</button>
                </div>
                <div class="invalid-feedback">
                    <?= $validation->getError('tipe_buket'); ?>
                </div>
            </div>
            <?= form_close() ?>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">tipe buket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($buket as $b) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $b['tipe_buket']; ?></td>
                            <td>
                                <form action="<?= base_url('Buket/delBuket/' . $b['id_buket']) ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Pastikan jenis tidak ada di index');"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>

                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('buket', 'florist_pagination') ?>
            <a href="<?= base_url('Florist') ?>">
                <button type="button" class="btn btn-danger">back </button>
            </a>
        </div>

    </div>
</div>
</div>
<?= $this->endSection(); ?>