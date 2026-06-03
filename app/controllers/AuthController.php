<?php

require_once '../config/database.php';
require_once '../config/session.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = $pdo->prepare(

    "SELECT * FROM users
     WHERE username=?"

);

$query->execute([$username]);

$user = $query->fetch();

if ($user) {

    if (password_verify($password, $user['password'])) {

        session_regenerate_id(true);

        $_SESSION['login'] = true;

        $_SESSION['user_id'] = $user['id'];

        $_SESSION['username'] = $user['username'];

        $_SESSION['role'] = $user['role'];

        # ADMIN

        if ($user['role'] == 'admin') {

            header(
                "Location: ../views/admin/dashboard.php"
            );

            exit;
        }

        # MAHASISWA

        if ($user['role'] == 'mahasiswa') {

            header(
                "Location: ../views/mahasiswa/dashboard.php"
            );

            exit;
        }
    }
}

echo "Username atau password salah";
