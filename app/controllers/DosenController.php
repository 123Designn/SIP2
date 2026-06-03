<?php

require_once '../config/database.php';

# TAMBAH DOSEN

if (isset($_POST['create'])) {

    $nama_dosen = trim($_POST['nama_dosen']);

    $query = $pdo->prepare(

        "INSERT INTO dosen
         (nama_dosen)

         VALUES (?)"

    );

    $query->execute([

        $nama_dosen

    ]);

    header(
        "Location: ../views/admin/dosen/index.php"
    );
}

# UPDATE DOSEN

if (isset($_POST['update'])) {

    $id = $_POST['id'];

    $nama_dosen = trim($_POST['nama_dosen']);

    $query = $pdo->prepare(

        "UPDATE dosen

         SET nama_dosen=?

         WHERE id=?"

    );

    $query->execute([

        $nama_dosen,
        $id

    ]);

    header(
        "Location: ../views/admin/dosen/index.php"
    );
}

# HAPUS DOSEN

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $query = $pdo->prepare(

        "DELETE FROM dosen
         WHERE id=?"

    );

    $query->execute([$id]);

    header(
        "Location: ../views/admin/dosen/index.php"
    );
}
