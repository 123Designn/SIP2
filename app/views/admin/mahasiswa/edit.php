<?php

require_once '../../../config/database.php';
require_once '../../../middleware/admin.php';

$id = $_GET['id'];

$query = $pdo->prepare(
    "SELECT * FROM mahasiswa WHERE id=?"
);

$query->execute([$id]);

$mahasiswa = $query->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Edit Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-5">

        <div class="card">

            <div class="card-header">
                Edit Mahasiswa
            </div>

            <div class="card-body">

                <form action="../../../controllers/MahasiswaController.php"
                    method="POST">

                    <input type="hidden"
                        name="id"
                        value="<?= $mahasiswa['id']; ?>">

                    <div class="mb-3">

                        <label>NIM</label>

                        <input type="text"
                            name="nim"
                            class="form-control"
                            value="<?= $mahasiswa['nim']; ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Nama</label>

                        <input type="text"
                            name="nama"
                            class="form-control"
                            value="<?= $mahasiswa['nama']; ?>"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Angkatan</label>

                        <input type="text"
                            name="angkatan"
                            class="form-control"
                            value="<?= $mahasiswa['angkatan']; ?>">

                    </div>

                    <div class="mb-3">

                        <label>No HP</label>

                        <input type="text"
                            name="no_hp"
                            class="form-control"
                            value="<?= $mahasiswa['no_hp']; ?>">

                    </div>

                    <div class="mb-3">

                        <label>Email</label>

                        <input type="email"
                            name="email"
                            class="form-control"
                            value="<?= $mahasiswa['email']; ?>">

                    </div>

                    <button type="submit"
                        name="update"
                        class="btn btn-primary">

                        Update

                    </button>

                </form>

            </div>

        </div>

    </div>

</body>

</html>