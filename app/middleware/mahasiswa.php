<?php

require_once __DIR__ . '/../config/session.php';

if (!isset($_SESSION['login'])) {

    header(
        "Location: /SIP2/app/views/auth/login.php"
    );

    exit;
}

if ($_SESSION['role'] != 'mahasiswa') {

    exit('Akses ditolak');
}
