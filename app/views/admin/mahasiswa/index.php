<?php

require_once '../../../config/database.php';
require_once '../../../middleware/admin.php';




$query = $pdo->query("SELECT * FROM mahasiswa ORDER BY id DESC");

$mahasiswa = $query->fetchAll();

require_once '../../layouts/header.php';
require_once '../../layouts/sidebar.php';

?>






<div class="d-flex justify-content-between mb-3">

    <h3>Data Mahasiswa</h3>
    <div>

        <a href="upload.php"
            class="btn btn-success">

            Upload Excel

        </a>


        <a href="create.php" class="btn btn-primary">
            Tambah Mahasiswa
        </a>


    </div>



</div>

<table class="table table-bordered table-striped">

    <thead>

        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Angkatan</th>
            <th>Aksi</th>
        </tr>

    </thead>

    <tbody>

        <?php $no = 1; ?>

        <?php foreach ($mahasiswa as $mhs): ?>

            <tr>

                <td><?= $no++; ?></td>
                <td><?= $mhs['nim']; ?></td>
                <td><?= $mhs['nama']; ?></td>
                <td><?= $mhs['angkatan']; ?></td>

                <td>

                    <a href="edit.php?id=<?= $mhs['id']; ?>"
                        class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <a href="../../../controllers/MahasiswaController.php?delete=<?= $mhs['id']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus data?')">

                        Hapus

                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>



<?php require_once '../../layouts/footer.php'; ?>