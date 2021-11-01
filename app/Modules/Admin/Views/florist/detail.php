<?= $this->extend('layout/templateAdmin'); ?>
<?= $this->section('content'); ?>


<div class="container">
    <h2 class="mt-3">Detail Produk</h2>
    <?php if (session()->getFlashdata('pesan')) : ?>

        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>

    <?php endif; ?>
    <div class="row">
        <div class="row">

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url('img/upload/' . $bunga['gambar'])  ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $bunga['nama_produk']; ?></h5>
                            <p class="card-text"> <b>Jenis : </b><?= $jenis['jenis_bunga']; ?></p>
                            <p class="card-text"> <b>Tipe Buket : </b><?= $buket['tipe_buket']; ?></small></p>
                            <p class="card-title"><b>Harga :</b> <?= $bunga['harga']; ?></p>
                            <p class="card-title"><b>Detail Lebih Lanjut :</b> <a href="<?= base_url('Florist/downloading/' . $bunga['detail_lengkap'] . '/' . $bunga['slug'])  ?>">Unduh Detail</a></p>
                            <a href="<?= base_url('Florist/edit/' . $bunga['id']) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="<?= base_url('Florist/' . $bunga['id']) ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin');"><i class="fas fa-trash-alt"></i></button>
                            </form>

                            <a href="<?= base_url('Florist') ?>">
                                <button type="button" class="btn btn-primary">back </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>