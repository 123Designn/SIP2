<?php

require_once '../../../middleware/admin.php';

require_once '../../layouts/header.php';
require_once '../../layouts/sidebar.php';

?>

<h3>Tambah Jenis Surat</h3>

<div class="card">

    <div class="card-body">

        <form action="../../../controllers/JenisSuratController.php"
            method="POST">

            <div class="mb-3">

                <label>Nama Surat</label>

                <input type="text"
                    name="nama_surat"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label>Kode Surat</label>

                <input type="text"
                    name="kode_surat"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label>Tipe Nomor Surat</label>

                <select name="tipe_nomor"
                    class="form-control">

                    <option value="auto">
                        Otomatis
                    </option>

                    <option value="manual">
                        Manual
                    </option>

                </select>

            </div>

            <button type="submit"
                name="simpan"
                class="btn btn-primary">

                Simpan

            </button>

        </form>

    </div>

</div>

<?php require_once '../../layouts/footer.php'; ?>