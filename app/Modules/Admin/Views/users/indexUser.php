<?= $this->extend('layout/templateAdmin'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">

            <a href="<?= base_url('User/create') ?>" class="btn btn-primary mt-3 ">Tambah pengguna</a>
            <div class="container2">
                <h1 class="mt-2"> Data Pengguna</h1>
                <?php if (session()->getFlashdata('pesan')) : ?>

                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>

                <?php endif; ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col">email</th>
                            <th scope="col">role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (3 * ($currentPage - 1)) ?>
                        <?php foreach ($user as $u) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $u['username']; ?></td>
                                <td><?= $u['nama']; ?></td>
                                <td><?= $u['email']; ?></td>
                                <td><?= $u['role']; ?></td>
                                <td> <a href="<?= base_url('User/edit/' . $u['id_user']) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <form action="<?= base_url('User/' . $u['id_user']) ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin');"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>

                            </tr>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <?= $pager->links('user', 'florist_pagination') ?>
            <a href="<?= base_url('Florist') ?>">
                <button type="button" class="btn btn-danger">back </button>
            </a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>