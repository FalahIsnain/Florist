<?= $this->extend('layout/templateAdmin'); ?>
<?= $this->section('content'); ?>

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= base_url('img/asset/slide1.png') ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <div class="container" style="margin-left: -300px; margin-top: -200px; color: #434343;">
                    <h1 class="display-4"><b>Fresh Flower</b> </h1>
                    <p class="lead">Natural & Beautiful Flower Here</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('img/asset/slide2.jpeg') ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <div class="container" style="margin-left: -300px; margin-top: -200px; color: #434343;">
                    <h1 class="display-4"><b>Fresh Flower</b> </h1>
                    <p class="lead">Natural & Beautiful Flower Here</p>

                </div>
            </div>
        </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container-fluid ml-5 mb-5">
    <div class="row text-center ml-5 mt-3">
        <?php foreach ($florist as $f) : ?>
            <div class="card ml-5 mt-5" style="width: 16rem;">
                <img src="<?= base_url('img/upload/' . $f['gambar'])  ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $f['nama_produk']; ?></h5>
                    <p class="card-text">Jenis Buket : <?= $f['jenis_bunga']; ?></p>
                    <p class="card-text">Tipe Buket : <?= $f['tipe_buket']; ?></p>
                    <td><a href="<?= base_url('Detail/' . $f['slug']) ?>" class="btn btn-success"> Detail</a></td>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</div>
<?= $this->endSection(); ?>