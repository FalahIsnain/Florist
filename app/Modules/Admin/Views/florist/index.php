<?= $this->extend('layout/templateAdmin'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">

            <h3>Selamat Datang <?= session()->get('username') ?></h3>

            <a href="<?= base_url('Florist/create') ?>" class="btn btn-primary mt-3 ">Tambah daftar Produk</a>

            <div class="btn-group mt-3">
                <a href="#" class="btn btn-primary" aria-current="page" onclick="return confirm('pilih jenis dan buket');">Kelola data</a>
                <a href="<?= base_url('User/') ?>" class="btn btn-primary">Data Pengguna</a>
                <a href="<?= base_url('Jenis/') ?>" class="btn btn-primary">Jenis</a>
                <a href="<?= base_url('Buket/') ?>" class="btn btn-primary">Buket</a>

            </div>
            <div class="container2">
                <h1 class="mt-2"> Data Produk</h1>
                <?php if (session()->getFlashdata('pesan')) : ?>

                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>

                <?php endif; ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jenis Bunga</th>
                            <th scope="col">Tipe Buket</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (3 * ($currentPage - 1)) ?>
                        <?php foreach ($florist as $f) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><img src="<?= base_url('img/upload/' . $f['gambar'])  ?>" alt="" class="gambar" width="80px"></td>
                                <td><?= $f['nama_produk']; ?></td>
                                <td><?= $f['jenis_bunga']; ?></td>
                                <td><?= $f['tipe_buket']; ?></td>
                                <td><a href="<?= site_url('Detail/' . $f['slug']) ?>" class="btn btn-success"> Detail</a></td>

                            </tr>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <?= $pager->links('bunga', 'florist_pagination') ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>