<?php

require_once '../../config/database.php';
require_once '../../middleware/admin.php';

# TOTAL MAHASISWA

$queryMahasiswa = $pdo->query(
    "SELECT COUNT(*) as total FROM mahasiswa"
);

$totalMahasiswa = $queryMahasiswa->fetch();

# TOTAL PENGAJUAN SURAT

$querySurat = $pdo->query(
    "SELECT COUNT(*) as total FROM pengajuan_surat"
);

$totalSurat = $querySurat->fetch();

# TOTAL TOEFL

// $queryToefl = $pdo->query(
//     "SELECT COUNT(*) as total FROM upload_dokumen
//      WHERE jenis_dokumen='toefl'"
// );

// $totalToefl = $queryToefl->fetch();

require_once '../layouts/header.php';
require_once '../layouts/sidebar.php';

?>

<div class="mb-4">

    <h2>
        Dashboard Admin
    </h2>

    <p>
        Selamat datang,
        <strong><?= $_SESSION['username']; ?></strong>
    </p>

</div>

<div class="row">

    <div class="col-md-4 mb-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h5>Total Mahasiswa</h5>

                <h2>
                    <?= $totalMahasiswa['total']; ?>
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h5>Total Surat</h5>

                <h2>
                    <?= $totalSurat['total']; ?>
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-3">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h5>Dokumen TOEFL</h5>

                <h2>

                </h2>

            </div>

        </div>

    </div>

</div>

<div class="card mt-3 border-0 shadow-sm">

    <div class="card-body">

        <h5>Quick Menu</h5>

        <hr>

        <a href="/SIP2/app/views/admin/mahasiswa/index.php"
            class="btn btn-primary">

            Data Mahasiswa

        </a>

        <a href="#"
            class="btn btn-success">

            Pengajuan Surat

        </a>

        <a href="#"
            class="btn btn-warning">

            Dokumen Mahasiswa

        </a>

    </div>

</div>

<?php require_once '../layouts/footer.php'; ?>