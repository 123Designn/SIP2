<?php

require_once '../config/database.php';

# CREATE

if (isset($_POST['simpan'])) {

    $nama_surat = $_POST['nama_surat'];
    $kode_surat = $_POST['kode_surat'];
    $tipe_nomor = $_POST['tipe_nomor'];

    $query = $pdo->prepare(

        "INSERT INTO jenis_surat
        (nama_surat, kode_surat, tipe_nomor)

        VALUES (?, ?, ?)"

    );

    $query->execute([

        $nama_surat,
        $kode_surat,
        $tipe_nomor

    ]);

    header("Location: ../views/admin/jenis_surat/index.php");
}

# DELETE

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $query = $pdo->prepare(
        "DELETE FROM jenis_surat WHERE id=?"
    );

    $query->execute([$id]);

    header("Location: ../views/admin/jenis_surat/index.php");
}
