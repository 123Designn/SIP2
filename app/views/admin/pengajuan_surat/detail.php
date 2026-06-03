<?php

require_once '../../../config/database.php';
require_once '../../../middleware/admin.php';

$id = $_GET['id'];

# DATA PENGAJUAN

$query = $pdo->prepare(

    "SELECT

        pengajuan_surat.*,
        mahasiswa.nama,
        mahasiswa.nim

     FROM pengajuan_surat

     JOIN mahasiswa
     ON pengajuan_surat.mahasiswa_id = mahasiswa.id

     WHERE pengajuan_surat.id=?"

);

$query->execute([$id]);

$pengajuan = $query->fetch();

# DETAIL PENGAJUAN

$queryDetail = $pdo->prepare(

    "SELECT * FROM detail_pengajuan
     WHERE pengajuan_id=?"

);

$queryDetail->execute([$id]);

$details = $queryDetail->fetchAll();

require_once '../../layouts/header.php';
require_once '../../layouts/sidebar.php';


?>
<?php if (isset($_SESSION['success'])): ?>

    <div class="alert alert-success alert-dismissible fade show">

        <?= $_SESSION['success']; ?>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

    <?php unset($_SESSION['success']); ?>

<?php endif; ?>

<div class="container mt-5">

    <div class="card">

        <div class="card-body">

            <h3>
                Detail Pengajuan Surat
            </h3>

            <hr>

            <table class="table">

                <tr>

                    <th width="250">
                        Nama Mahasiswa
                    </th>

                    <td>
                        <?= $pengajuan['nama']; ?>
                    </td>

                </tr>

                <tr>

                    <th>
                        NIM
                    </th>

                    <td>
                        <?= $pengajuan['nim']; ?>
                    </td>

                </tr>

                <tr>

                    <th>
                        Status
                    </th>

                    <td>
                        <?= $pengajuan['status']; ?>
                    </td>

                </tr>

            </table>
            <hr>
            <h5>
                Detail Pengajuan
            </h5>
            <hr>
            <h5>
                Approval Pengajuan
            </h5>
            <form action="../../../controllers/PengajuanSuratController.php"
                method="POST">

                <input type="hidden"
                    name="pengajuan_id"
                    value="<?= $pengajuan['id']; ?>">

                <div class="mb-3">

                    <label>
                        Ruangan
                    </label>

                    <input type="text"
                        name="ruangan"
                        class="form-control"
                        value="<?= $pengajuan['ruangan'] ?? ''; ?>">
                </div>
                <div class="mb-3">
                    <label>
                        Catatan Admin
                    </label>

                    <textarea
                        name="catatan_admin"
                        class="form-control"><?= $pengajuan['catatan_admin'] ?? ''; ?></textarea>
                </div>

                <div class="mb-3">

                    <label>
                        Nomor Surat
                    </label>

                    <div class="input-group">

                        <input type="text"
                            name="nomor_surat"
                            class="form-control"
                            value="<?= $pengajuan['nomor_surat'] ?? ''; ?>"

                            <button type="button"
                            class="btn btn-secondary"
                            onclick="generateNomor()">

                        Auto

                        </button>

                    </div>

                </div>

                <div class="mb-3">

                    <label>
                        Status
                    </label>

                    <select name="status"
                        class="form-control"
                        required>

                        <option value="pending"
                            <?= $pengajuan['status'] == 'pending' ? 'selected' : ''; ?>>
                            Pending
                        </option>
                        <option value="diproses"
                            <?= $pengajuan['status'] == 'diproses' ? 'selected' : ''; ?>>
                            Diproses
                        </option>
                        <option value="selesai"
                            <?= $pengajuan['status'] == 'selesai' ? 'selected' : ''; ?>>
                            Selesai
                        </option>
                        <option value="ditolak"
                            <?= $pengajuan['status'] == 'ditolak' ? 'selected' : ''; ?>>
                            Ditolak
                        </option>

                    </select>

                </div>

                <button type="submit"
                    name="update_status"
                    class="btn btn-primary">
                    Simpan Approval
                </button>

            </form>

            <table class="table table-bordered">

                <?php foreach ($details as $d): ?>

                    <tr>
                        <th width="300">
                            <?= ucwords(
                                str_replace('_', ' ', $d['field_name'])
                            ); ?>
                        </th>

                        <td>
                            <?= $d['field_value']; ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </table>

        </div>

    </div>

</div>

<script>
    function generateNomor() {
        let nomor = '081/DIM-STIEM/IV/2026';
        document.querySelector(
            'input[name="nomor_surat"]'
        ).value = nomor;
    }
</script>

<?php require_once '../../layouts/footer.php'; ?>