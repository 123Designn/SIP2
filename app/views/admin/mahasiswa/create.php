<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Tambah Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-5">

        <div class="card">

            <div class="card-header">
                Tambah Mahasiswa
            </div>

            <div class="card-body">

                <form action="../../../controllers/MahasiswaController.php"
                    method="POST">

                    <div class="mb-3">

                        <label>NIM</label>

                        <input type="text"
                            name="nim"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Nama</label>

                        <input type="text"
                            name="nama"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label>Angkatan</label>

                        <input type="text"
                            name="angkatan"
                            class="form-control">

                    </div>

                    <div class="mb-3">

                        <label>No HP</label>

                        <input type="text"
                            name="no_hp"
                            class="form-control">

                    </div>

                    <div class="mb-3">

                        <label>Email</label>

                        <input type="email"
                            name="email"
                            class="form-control">

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

</body>

</html>