<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Upload Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-5">

        <div class="card">

            <div class="card-header">
                Upload Excel Mahasiswa
            </div>

            <div class="card-body">

                <form action="../../../controllers/UploadMahasiswaController.php"
                    method="POST"
                    enctype="multipart/form-data">

                    <div class="mb-3">

                        <label>File Excel</label>

                        <input type="file"
                            name="file_excel"
                            class="form-control"
                            accept=".xlsx,.xls"
                            required>

                    </div>

                    <button type="submit"
                        name="upload"
                        class="btn btn-primary">

                        Upload

                    </button>

                </form>

            </div>

        </div>

    </div>

</body>

</html>