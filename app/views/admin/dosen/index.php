<?php

require_once '../../../config/database.php';
require_once '../../../middleware/admin.php';

$query = $pdo->query(

    "SELECT * FROM dosen
     ORDER BY nama_dosen ASC"

);

$dosen = $query->fetchAll();

require_once '../../layouts/header.php';
require_once '../../layouts/sidebar.php';

?>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-3">

        <h3>
            Data Dosen
        </h3>

        <div>

            <a href="upload.php"
                class="btn btn-success">

                Upload Excel

            </a>

            <a href="create.php"
                class="btn btn-primary">

                Tambah Dosen

            </a>

        </div>

    </div>

    <table class="table table-bordered">

        <thead>

            <tr>

                <th width="80">
                    No
                </th>

                <th>
                    Nama Dosen
                </th>

                <th width="150">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            <?php $no = 1; ?>

            <?php foreach ($dosen as $dsn): ?>

                <tr>

                    <td>
                        <?= $no++; ?>
                    </td>

                    <td>
                        <?= $dsn['nama_dosen']; ?>
                    </td>

                    <td>

                        <a href="edit.php?id=<?= $dsn['id']; ?>"
                            class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <a href="../../../controllers/DosenController.php?delete=<?= $dsn['id']; ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus dosen?')">

                            Hapus

                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

<?php require_once '../../layouts/footer.php'; ?>