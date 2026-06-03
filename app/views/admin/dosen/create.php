<?php

require_once '../../../middleware/admin.php';

require_once '../../layouts/header.php';
require_once '../../layouts/sidebar.php';

?>

<div class="container mt-5">

    <div class="card">

        <div class="card-body">

            <h3>
                Tambah Dosen
            </h3>

            <hr>

            <form action="../../../controllers/DosenController.php"
                method="POST">

                <div class="mb-3">

                    <label>
                        Nama Dosen
                    </label>

                    <input type="text"
                        name="nama_dosen"
                        class="form-control"
                        required>

                </div>

                <button type="submit"
                    name="create"
                    class="btn btn-primary">

                    Simpan

                </button>

            </form>

        </div>

    </div>

</div>

<?php require_once '../../layouts/footer.php'; ?>