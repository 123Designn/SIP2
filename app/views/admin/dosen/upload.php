<?php

require_once '../../../middleware/admin.php';

require_once '../../layouts/header.php';
require_once '../../layouts/sidebar.php';

?>

<div class="container mt-5">

    <div class="card">

        <div class="card-body">

            <h3>
                Upload Excel Dosen
            </h3>

            <hr>

            <form action="../../../controllers/UploadDosenController.php"
                method="POST"
                enctype="multipart/form-data">

                <div class="mb-3">

                    <label>
                        File Excel
                    </label>

                    <input type="file"
                        name="file_excel"
                        class="form-control"
                        accept=".xls,.xlsx"
                        required>

                </div>

                <button type="submit"
                    name="upload"
                    class="btn btn-success">

                    Upload

                </button>

            </form>

        </div>

    </div>

</div>

<?php require_once '../../layouts/footer.php'; ?>