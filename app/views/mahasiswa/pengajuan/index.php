<?php

require_once '../../config/database.php';
require_once '../../middleware/mahasiswa.php';

$queryMahasiswa = $pdo->prepare(

    "SELECT * FROM mahasiswa
     WHERE user_id=?"

);

$queryMahasiswa->execute([

    $_SESSION['user_id']

]);

$mahasiswa = $queryMahasiswa->fetch();
$query = $pdo->prepare(

    "SELECT
        ps.*,
        js.nama_surat
     FROM pengajuan_surat ps
     LEFT JOIN jenis_surat js
     ON ps.jenis_surat_id = js.id
     WHERE ps.mahasiswa_id=?
     ORDER BY ps.id DESC"
);

$query->execute([
    $mahasiswa['id']
]);

$pengajuan = $query->fetchAll();

require_once '../layouts/header.php';

?>

<div class="container mt-4">
    <h3>Riwayat Pengajuan Surat</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis Surat</th>
                <th>Nomor Surat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($pengajuan as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>
                        <?= $row['tanggal_pengajuan']; ?>
                    </td>
                    <td>
                        <?= $row['nama_surat']; ?>
                    </td>
                    <td>
                        <?= $row['nomor_surat'] ?: '-'; ?>
                    </td>
                    <td>
                        <?= ucfirst($row['status']); ?>
                    </td>
                    <td>
                        <a href="detail.php?id=<?= $row['id']; ?>"
                            class="btn btn-info btn-sm">
                            Detail
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once '../layouts/footer.php'; ?>