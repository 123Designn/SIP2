<?php

require_once '../../../config/database.php';
require_once '../../../middleware/mahasiswa.php';


$query = $pdo->query(
    "SELECT * FROM jenis_surat ORDER BY nama_surat ASC"
);

$jenisSurat = $query->fetchAll();

$queryDosen = $pdo->query(

    "SELECT * FROM dosen
     ORDER BY nama_dosen ASC"

);

$dosen = $queryDosen->fetchAll();

require_once '../../layouts/header.php';

?>

<div class="container mt-5">

    <div class="card shadow-sm">

        <div class="card-body">

            <h3>
                Ajukan Surat
            </h3>

            <hr>

            <form action="../../../controllers/PengajuanSuratController.php"
                method="POST">

                <div class="mb-3">

                    <label>
                        Jenis Surat
                    </label>

                    <select name="jenis_surat_id"
                        class="form-control"
                        required>

                        <option value="">
                            -- Pilih Surat --
                        </option>

                        <?php foreach ($jenisSurat as $js): ?>

                            <option value="<?= $js['id']; ?>">

                                <?= $js['nama_surat']; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label>
                        Judul Disertasi
                    </label>

                    <textarea name="judul"
                        class="form-control"
                        required></textarea>

                </div>

                <div class="mb-3">

                    <label>
                        Tanggal Ujian
                    </label>

                    <input type="date"
                        name="tanggal_ujian"
                        class="form-control"
                        required>

                </div>
                <div class="mb-3">

                    <label>
                        Hari Ujian
                    </label>

                    <input type="text"
                        name="hari_ujian"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label>
                        Promotor
                    </label>

                    <select name="promotor"
                        class="form-control select-dosen"
                        required>

                        <option value="">
                            -- Pilih Promotor --
                        </option>

                        <?php foreach ($dosen as $dsn): ?>

                            <option value="<?= $dsn['nama_dosen']; ?>">

                                <?= $dsn['nama_dosen']; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label>
                        Co-Promotor 1
                    </label>

                    <select name="co_promotor_1"
                        class="form-control select-dosen">

                        <option value="">
                            -- Pilih Co-Promotor 1 --
                        </option>

                        <?php foreach ($dosen as $dsn): ?>

                            <option value="<?= $dsn['nama_dosen']; ?>">

                                <?= $dsn['nama_dosen']; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label>
                        Co-Promotor 2
                    </label>

                    <select name="co_promotor_2"
                        class="form-control select-dosen">

                        <option value="">
                            -- Pilih Co-Promotor 2 --
                        </option>

                        <?php foreach ($dosen as $dsn): ?>

                            <option value="<?= $dsn['nama_dosen']; ?>">

                                <?= $dsn['nama_dosen']; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label>
                        Penguji 1
                    </label>

                    <select name="penguji_1"
                        class="form-control select-dosen"
                        required>

                        <option value="">
                            -- Pilih Penguji 1 --
                        </option>

                        <?php foreach ($dosen as $dsn): ?>

                            <option value="<?= $dsn['nama_dosen']; ?>">

                                <?= $dsn['nama_dosen']; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label>
                        Penguji 2
                    </label>

                    <select name="penguji_2"
                        class="form-control select-dosen"
                        required>

                        <option value="">
                            -- Pilih Penguji 2 --
                        </option>

                        <?php foreach ($dosen as $dsn): ?>

                            <option value="<?= $dsn['nama_dosen']; ?>">

                                <?= $dsn['nama_dosen']; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label>
                        Penguji 3
                    </label>

                    <select name="penguji_3"
                        class="form-control select-dosen"
                        required>

                        <option value="">
                            -- Pilih Penguji 3 --
                        </option>

                        <?php foreach ($dosen as $dsn): ?>

                            <option value="<?= $dsn['nama_dosen']; ?>">

                                <?= $dsn['nama_dosen']; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <button type="submit"
                    class="form-control">

        </div>

        <button type="submit"
            name="submit_pengajuan"
            class="btn btn-primary">

            Submit Pengajuan

        </button>

        </form>

    </div>

</div>

</div>

<?php require_once '../../layouts/footer.php'; ?>