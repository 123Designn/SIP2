<?php

require_once '../config/database.php';

# CREATE

if (isset($_POST['create'])) {

    $nim       = $_POST['nim'];
    $nama      = $_POST['nama'];
    $angkatan  = $_POST['angkatan'];
    $no_hp     = $_POST['no_hp'];
    $email     = $_POST['email'];

    // password default
    $password = password_hash('123456', PASSWORD_DEFAULT);

    $query = $pdo->prepare(

        "INSERT INTO mahasiswa
        (nim, nama, angkatan, no_hp, email, password)

        VALUES (?, ?, ?, ?, ?, ?)"
    );

    $query->execute([
        $nim,
        $nama,
        $angkatan,
        $no_hp,
        $email,
        $password
    ]);

    header("Location: ../views/admin/mahasiswa/index.php");
}

# DELETE

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $query = $pdo->prepare(
        "DELETE FROM mahasiswa WHERE id=?"
    );

    $query->execute([$id]);

    header("Location: ../views/admin/mahasiswa/index.php");
}

# UPDATE

if (isset($_POST['update'])) {

    $id        = $_POST['id'];
    $nim       = $_POST['nim'];
    $nama      = $_POST['nama'];
    $angkatan  = $_POST['angkatan'];
    $no_hp     = $_POST['no_hp'];
    $email     = $_POST['email'];

    $query = $pdo->prepare(

        "UPDATE mahasiswa SET

        nim=?,
        nama=?,
        angkatan=?,
        no_hp=?,
        email=?

        WHERE id=?"

    );

    $query->execute([

        $nim,
        $nama,
        $angkatan,
        $no_hp,
        $email,
        $id

    ]);

    # AMBIL USER_ID

    $getMahasiswa = $pdo->prepare(
        "SELECT user_id FROM mahasiswa WHERE id=?"
    );

    $getMahasiswa->execute([$id]);

    $mhs = $getMahasiswa->fetch();

    # UPDATE USERNAME DI USERS

    if ($mhs && $mhs['user_id']) {

        $updateUser = $pdo->prepare(

            "UPDATE users
             SET username=?
             WHERE id=?"

        );

        $updateUser->execute([

            $nim,
            $mhs['user_id']

        ]);
    }

    header("Location: ../views/admin/mahasiswa/index.php");
}
