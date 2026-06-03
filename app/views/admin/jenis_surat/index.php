<?php

require_once '../../../config/database.php';
require_once '../../../middleware/admin.php';

$query = $pdo->query(
    "SELECT * FROM jenis_surat ORDER BY id DESC"
);

$jenisSurat = $query->fetchAll();

require_once '../../layouts/header.php';
require_once '../../layouts/sidebar.php';

?>

<div class="d-flex justify-content-between mb-3">

    <h3>Master Jenis Surat</h3>

    <a href="create.php"
        class="btn btn-primary">

        Tambah Jenis Surat

    </a>

</div>

<table class="table table-bordered table-hover">

    <thead>

        <tr>

            <th>No</th>
            <th>Nama Surat</th>
            <th>Kode Surat</th>
            <th>Tipe Nomor</th>
            <th>Aksi</th>

        </tr>

    </thead>

    <tbody>

        <?php $no = 1; ?>

        <?php foreach ($jenisSurat as $js): ?>

            <tr>

                <td><?= $no++; ?></td>

                <td><?= $js['nama_surat']; ?></td>

                <td><?= $js['kode_surat']; ?></td>

                <td><?= $js['tipe_nomor']; ?></td>

                <td>

                    <a href="edit.php?id=<?= $js['id']; ?>"
                        class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <a href="../../../controllers/JenisSuratController.php?delete=<?= $js['id']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus jenis surat?')">

                        Hapus

                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<?php require_once '../../layouts/footer.php'; ?>