<?php

require_once '../../../config/database.php';
require_once '../../../middleware/admin.php';

$id = $_GET['id'];

$query = $pdo->prepare(

    "SELECT * FROM dosen
     WHERE id=?"

);

$query->execute([$id]);

$dosen = $query->fetch();

require_once '../../layouts/header.php';
require_once '../../layouts/sidebar.php';

?>

<div class="container mt-5">

    <div class="card">

        <div class="card-body">

            <h3>
                Edit Dosen
            </h3>

            <hr>

            <form action="../../../controllers/DosenController.php"
                method="POST">

                <input type="hidden"
                    name="id"
                    value="<?= $dosen['id']; ?>">

                <div class="mb-3">

                    <label>
                        Nama Dosen
                    </label>

                    <input type="text"
                        name="nama_dosen"
                        class="form-control"
                        value="<?= $dosen['nama_dosen']; ?>"
                        required>

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

<?php require_once '../../layouts/footer.php'; ?>