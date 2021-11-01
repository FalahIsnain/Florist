<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>

<div class="container mb-5">
    <div class="row">
        <div class="container2 mt-4">
            <div class="col-8">

                <h2 class="my-3">From Tambah Data Penjualan</h2>
                <form action="<?= base_url('Florist/save') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="row mb-3">
                        <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : ''; ?>" id="nama_produk" name="nama_produk" autofocus value="<?= old('nama_produk') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_produk'); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="jenis" class="col-sm-2 col-form-label">Jenis Bunga</label>
                        <select class="custom-select" id="inputGroupSelect02" name="jenis" required>
                            <option selected disabled value="">Choose...</option>
                            <?php
                            foreach ($jenis as $row) {
                            ?>
                                <option value="<?= $row['id_jenis'] ?>"> <?= $row['jenis_bunga'] ?></option>
                            <?php } ?>
                        </select>

                    </div>

                    <div class="row mb-3">
                        <label for="buket" class="col-sm-2 col-form-label">Tipe buket</label>
                        <select class="custom-select" id="inputGroupSelect02" name="buket" required>
                            <option selected disabled value="">Choose...</option>
                            <?php
                            foreach ($buket as $row) {
                            ?>
                                <option value="<?= $row['id_buket'] ?>"> <?= $row['tipe_buket'] ?></option>
                            <?php } ?>
                        </select>

                    </div>


                    <div class="row mb-3">
                        <label for="nama_produk" class="col-sm-4 col-form-label">Harga</label>
                        <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" autofocus value="<?= old('harga') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('harga'); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="detail_lengkap" class="col-sm-4 col-form-label">Input Detail lebih lanjut</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= ($validation->hasError('detail_lengkap')) ? 'is-invalid' : ''; ?> " id="detail_lengkap" name="detail_lengkap" onchange="previewImg()">
                            <label class="input-group-text " for="inputGroupFile02">Upload</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('detail_lengkap'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>

                        <div class="col-sm-2 mb-2">
                            <img src="<?= base_url('img/asset/default.png') ?>" class="img-thumbnail img-preview">
                        </div>

                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?> " id="gambar" name="gambar" onchange="previewImg()">
                                <label class="input-group-text " for="inputGroupFile02">Upload</label>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar'); ?>
                                </div>
                            </div>

                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                    <a href="<?= base_url('florist') ?>">
                        <button type="button" class="btn btn-danger">back </button>
                    </a>
                </form>


            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>