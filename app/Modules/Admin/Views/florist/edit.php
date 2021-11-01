<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <div class="row">
        <div class="container2 mt-4">
            <div class="col-8">
                <h2 class="my-3">From Ubah Data</h2>
                <form action="<?= base_url('Florist/update/' . $dataEdit['id']) ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $dataEdit['id']; ?>">
                    <input type="hidden" name="gambarLama" value="<?= $dataEdit['gambar']; ?>">
                    <input type="hidden" name="detailLama" value="<?= $dataEdit['detail_lengkap']; ?>">
                    <div class="row mb-3">
                        <label for="Nama Produk" class="col-sm-4 col-form-label">Nama Produk</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : ''; ?>" id="nama_produk" name="nama_produk" autofocus value="<?= $dataEdit['nama_produk'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_produk'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Jenis BUnga" class="col-sm-2 col-form-label">jenis</label>
                        <select class="custom-select" id="inputGroupSelect02" name="jenis" required>
                            <option selected disabled value="">Choose...</option>
                            <?php
                            foreach ($jenis as $row) {
                            ?>
                                <option value="<?= $row['id_jenis'] ?> " <?php echo ($dataEdit['id_jenis'] == $row['id_jenis']) ? "selected" : " " ?>>
                                    <?= $row['jenis_bunga'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label for="Tipe Buket" class="col-sm-2 col-form-label">Tipe Buket</label>
                        <select class="custom-select" id="inputGroupSelect02" name="buket" required>
                            <option selected disabled value="">Choose...</option>
                            <?php
                            foreach ($buket as $row) {
                            ?>
                                <option value="<?= $row['id_buket'] ?> " <?php echo ($dataEdit['id_buket'] == $row['id_buket']) ? "selected" : " " ?>>
                                    <?= $row['tipe_buket'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="row mb-3">
                        <label for="Nama Produk" class="col-sm-4 col-form-label">harga</label>
                        <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" autofocus value="<?= $dataEdit['harga'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('harga'); ?>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="detail_lengkap" class="col-sm-4 col-form-label">Detail_Lengkap</label>


                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('detail_lengkap')) ? 'is-invalid' : ''; ?>" id="detail_lengkap" name="detail_lengkap" onchange="previewImg()">
                            <label class="custom-file-label" for="detail_lengkap"><?= $dataEdit['detail_lengkap'] ?></label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('detail_lengkap'); ?>
                            </div>
                        </div>




                    </div>

                    <div class="row mb-2">
                        <label for="gambar" class="col-sm-2 col-form-label">gambar</label>

                        <div class="col-sm-2 mb-2">
                            <img src="<?= base_url('img/upload/' . $dataEdit['gambar'])  ?>" class="img-thumbnail img-preview">
                        </div>

                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImg()">
                                <label class="custom-file-label" for="gambar"><?= $dataEdit['gambar'] ?></label>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar'); ?>
                                </div>
                            </div>

                        </div>


                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                    <a href="<?= base_url('Florist') ?>">
                        <button type="button" class="btn btn-danger">back </button>
                    </a>

                </form>


            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>