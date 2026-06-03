<?php

require_once '../../../config/database.php';
require_once '../../../middleware/admin.php';

$query = $pdo->query(

    "SELECT pengajuan_surat.*,
    mahasiswa.nama,
    jenis_surat.nama_surat

    FROM pengajuan_surat

    JOIN mahasiswa
    ON pengajuan_surat.mahasiswa_id = mahasiswa.id

    JOIN jenis_surat
    ON pengajuan_surat.jenis_surat_id = jenis_surat.id

    ORDER BY pengajuan_surat.id DESC"

);

$pengajuan = $query->fetchAll();

require_once '../../layouts/header.php';
require_once '../../layouts/sidebar.php';

?>

<h3>Pengajuan Surat</h3>

<table class="table table-bordered table-hover">

    <thead>

        <tr>

            <th>No</th>
            <th>Mahasiswa</th>
            <th>Jenis Surat</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th width="200">
                Aksi
            </th>

        </tr>

    </thead>

    <tbody>

        <?php $no = 1; ?>

        <?php foreach ($pengajuan as $p): ?>

            <tr>

                <td><?= $no++; ?></td>

                <td><?= $p['nama']; ?></td>

                <td><?= $p['nama_surat']; ?></td>

                <td><?= $p['tanggal_pengajuan']; ?></td>

                <td>

                    <?php if ($p['status'] == 'pending'): ?>

                        <span class="badge bg-warning">
                            Pending
                        </span>

                    <?php elseif ($p['status'] == 'diproses'): ?>

                        <span class="badge bg-primary">
                            Diproses
                        </span>

                    <?php elseif ($p['status'] == 'selesai'): ?>

                        <span class="badge bg-success">
                            Selesai
                        </span>

                    <?php else: ?>

                        <span class="badge bg-danger">
                            Ditolak
                        </span>

                    <?php endif; ?>

                </td>
                <td>

                    <a href="detail.php?id=<?= $p['id']; ?>"
                        class="btn btn-info btn-sm">

                        Detail

                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<?php require_once '../../layouts/footer.php'; ?>