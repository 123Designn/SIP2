<?php

require_once '../../config/database.php';
require_once '../../middleware/mahasiswa.php';

$query = $pdo->prepare(

    "SELECT mahasiswa.*

     FROM mahasiswa

     JOIN users
     ON mahasiswa.user_id = users.id

     WHERE users.id=?"

);

$query->execute([

    $_SESSION['user_id']

]);

$mahasiswa = $query->fetch();

require_once '../layouts/header.php';

?>

<div class="container mt-5">

    <div class="card shadow-sm">

        <div class="card-body">

            <h3>
                Dashboard Mahasiswa
            </h3>

            <a href="pengajuan/create.php"
                class="btn btn-primary">

                Ajukan Surat

            </a>

            <hr>

            <table class="table">

                <tr>

                    <th width="200">
                        NIM
                    </th>

                    <td>
                        <?= $mahasiswa['nim']; ?>
                    </td>

                </tr>

                <tr>

                    <th>
                        Nama
                    </th>

                    <td>
                        <?= $mahasiswa['nama']; ?>
                    </td>

                </tr>

                <tr>

                    <th>
                        Angkatan
                    </th>

                    <td>
                        <?= $mahasiswa['angkatan']; ?>
                    </td>

                </tr>

                <tr>

                    <th>
                        Email
                    </th>

                    <td>
                        <?= $mahasiswa['email']; ?>
                    </td>

                </tr>

            </table>


        </div>

    </div>

</div>

<?php require_once '../layouts/footer.php'; ?>