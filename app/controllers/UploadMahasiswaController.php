<?php

require_once '../config/database.php';
require_once '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['upload'])) {

    $file = $_FILES['file_excel']['tmp_name'];

    $spreadsheet = IOFactory::load($file);

    $sheet = $spreadsheet->getActiveSheet()->toArray();

    foreach ($sheet as $key => $row) {

        // skip header excel
        if ($key == 0) {
            continue;
        }

        $nim       = trim($row[0]);
        if (empty($nim)) {
            continue;
        }
        $nama      = trim($row[1]);
        $angkatan  = trim($row[2]);
        $no_hp     = trim($row[3]);
        $email     = trim($row[4]);

        # CEK DUPLIKAT USER

        $cekUser = $pdo->prepare(
            "SELECT id FROM users WHERE username=?"
        );

        $cekUser->execute([$nim]);

        if ($cekUser->rowCount() > 0) {
            continue;
        }

        # PASSWORD DEFAULT

        $password = password_hash(
            '123456',
            PASSWORD_DEFAULT
        );

        # INSERT USERS

        $insertUser = $pdo->prepare(

            "INSERT INTO users
            (username, password, role)

            VALUES (?, ?, ?)"

        );

        $insertUser->execute([

            $nim,
            $password,
            'mahasiswa'

        ]);

        $user_id = $pdo->lastInsertId();

        # INSERT MAHASISWA

        $insertMahasiswa = $pdo->prepare(

            "INSERT INTO mahasiswa

            (nim, nama, angkatan,
             no_hp, email, user_id)

            VALUES (?, ?, ?, ?, ?, ?)"

        );

        $insertMahasiswa->execute([

            $nim,
            $nama,
            $angkatan,
            $no_hp,
            $email,
            $user_id

        ]);
    }

    header(
        "Location: ../views/admin/mahasiswa/index.php"
    );
}
