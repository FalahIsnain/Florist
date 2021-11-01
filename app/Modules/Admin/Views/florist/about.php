<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>

<div class="bg-light">
    <div class="container py-5">
        <div class="row h-100 align-items-center py-5">
            <div class="col-lg-6">
                <h1 class="display-4">About us page</h1>
                <p class="lead text-muted mb-0">The Flower Shop dengan bangga melayani Kalimantan. Kami adalah keluarga yang dimiliki dan dioperasikan. Kami berkomitmen untuk hanya menawarkan rangkaian bunga dan hadiah terbaik, didukung oleh layanan yang ramah dan cepat. Karena semua pelanggan kami penting, staf profesional kami berdedikasi untuk membuat pengalaman Anda menyenangkan. Itulah sebabnya kami selalu berusaha keras untuk membuat hadiah bunga Anda sempurna..</p>

            </div>
            <div class="col-lg-6 d-none d-lg-block"><img src="<?= base_url('img/asset/about1.png') ?>" alt="" class="img-fluid"></div>
        </div>
    </div>
</div>

<div class="bg-white py-5">
    <div class="container py-5">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 order-2 order-lg-1">
                <h2 class="font-weight-light">Varian Bungan Yang banyak</h2>
                <p class="font-italic text-muted mb-4">Kami memiliki varian bunga yang bervariasi.</p><a href="<?= base_url('public/florist/indexJenis') ?>" class="btn btn-light px-5 rounded-pill shadow-sm">Lihat</a>
            </div>
            <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="<?= base_url('img/asset/about2.png') ?>" alt="" class="img-fluid mb-4 mb-lg-0"></div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-5 px-5 mx-auto"><img src="<?= base_url('img/asset/about3.png') ?>" alt="" class="img-fluid mb-4 mb-lg-0"></div>
            <div class="col-lg-6">
                <h2 class="font-weight-light">Varian buket yang beragam</h2>
                <p class="font-italic text-muted mb-4">Kami memiliki varian buket yang beragam.</p><a href="<?= base_url('public/florist/indexBuket') ?>" class="btn btn-light px-5 rounded-pill shadow-sm">Lihat</a>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection(); ?>