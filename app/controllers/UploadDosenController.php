<?php

require_once '../config/database.php';
require_once '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['upload'])) {

    $file = $_FILES['file_excel']['tmp_name'];

    $spreadsheet = IOFactory::load($file);

    $sheet = $spreadsheet
        ->getActiveSheet()
        ->toArray();

    foreach ($sheet as $key => $row) {

        # SKIP HEADER

        if ($key == 0) {
            continue;
        }

        $nama_dosen = trim($row[0]);

        # LEWATI JIKA KOSONG

        if (empty($nama_dosen)) {
            continue;
        }

        # CEK DUPLIKAT

        $cek = $pdo->prepare(

            "SELECT id FROM dosen
             WHERE nama_dosen=?"

        );

        $cek->execute([$nama_dosen]);

        if ($cek->rowCount() > 0) {
            continue;
        }

        # INSERT DOSEN

        $insert = $pdo->prepare(

            "INSERT INTO dosen
             (nama_dosen)

             VALUES (?)"

        );

        $insert->execute([

            $nama_dosen

        ]);
    }

    header(
        "Location: ../views/admin/dosen/index.php"
    );
}
