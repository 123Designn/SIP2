<?php



require_once '../config/database.php';
require_once '../config/session.php';

# ==================================================
# SUBMIT PENGAJUAN MAHASISWA
# ==================================================

if (isset($_POST['submit_pengajuan'])) {

    $jenis_surat_id = $_POST['jenis_surat_id'];
    $judul = $_POST['judul'];
    $tanggal_ujian = $_POST['tanggal_ujian'];
    $hari_ujian = $_POST['hari_ujian'];
    $promotor = $_POST['promotor'];
    $co_promotor_1 = $_POST['co_promotor_1'];
    $co_promotor_2 = $_POST['co_promotor_2'];
    $penguji_1 = $_POST['penguji_1'];
    $penguji_2 = $_POST['penguji_2'];
    $penguji_3 = $_POST['penguji_3'];

    # AMBIL DATA MAHASISWA

    $queryMahasiswa = $pdo->prepare(

        "SELECT * FROM mahasiswa
         WHERE user_id=?"

    );

    $queryMahasiswa->execute([

        $_SESSION['user_id']

    ]);

    $mahasiswa = $queryMahasiswa->fetch();

    # INSERT PENGAJUAN

    $insert = $pdo->prepare(

        "INSERT INTO pengajuan_surat

        (mahasiswa_id,
         jenis_surat_id,
         tanggal_pengajuan,
         status)

        VALUES (?, ?, ?, ?)"

    );

    $insert->execute([

        $mahasiswa['id'],
        $jenis_surat_id,
        date('Y-m-d'),
        'pending'

    ]);

    $pengajuan_id = $pdo->lastInsertId();

    # DETAIL PENGAJUAN

    $detail = [

        'judul' => $judul,

        'tanggal_ujian' => $tanggal_ujian,

        'hari_ujian' => $hari_ujian,

        'promotor' => $promotor,

        'co_promotor_1' => $co_promotor_1,

        'co_promotor_2' => $co_promotor_2,

        'penguji_1' => $penguji_1,

        'penguji_2' => $penguji_2,

        'penguji_3' => $penguji_3

    ];

    foreach ($detail as $field => $value) {

        $insertDetail = $pdo->prepare(

            "INSERT INTO detail_pengajuan

            (pengajuan_id,
             field_name,
             field_value)

            VALUES (?, ?, ?)"

        );

        $insertDetail->execute([

            $pengajuan_id,
            $field,
            $value

        ]);
    }

    header(
        "Location: ../views/mahasiswa/dashboard.php"
    );

    exit;
}

# ==================================================
# APPROVAL ADMIN
# ==================================================

if (isset($_POST['update_status'])) {

    $pengajuan_id = $_POST['pengajuan_id'];
    $nomor_surat = $_POST['nomor_surat'];
    $ruangan = $_POST['ruangan'];
    $catatan_admin = $_POST['catatan_admin'];
    $status = $_POST['status'];
    $query = $pdo->prepare(

        "UPDATE pengajuan_surat

         SET

         nomor_surat=?,
         ruangan=?,
         catatan_admin=?,
         status=?

         WHERE id=?"

    );

    $query->execute([

        $nomor_surat,
        $ruangan,
        $catatan_admin,
        $status,
        $pengajuan_id

    ]);

    $_SESSION['success'] =
        "Approval berhasil disimpan";

    header(
        "Location: ../views/admin/pengajuan_surat/detail.php?id="
            . $pengajuan_id
    );

    exit;
}
