Nama Aplikasi: SIP - Sistem Informasi Persuratan
tujuan aplikasi: untuk memudahkan administrasi surat menyurat di lingkungan akademik S3/PhD.

Dan karena Anda menggunakan:

- VS Code
- PHP Native
- Bootstrap 5.3.3
- PDO

maka itu sudah sangat cukup untuk membangun SIP dengan baik.

---

# Strategi Pengerjaan SIP

Kita jangan langsung membuat semua fitur sekaligus.

Kita buat bertahap seperti aplikasi profesional.

---

# TAHAP 1 (WAJIB SELESAI DULU)

Fokus pondasi sistem:

## Yang Akan Kita Buat Dulu

### 1. Struktur Folder

### 2. Koneksi PDO

### 3. Session Login

### 4. Login Multi Role

### 5. Dashboard Admin

### 6. Dashboard Mahasiswa

### 7. Logout

### 8. Middleware Login

### 9. CRUD Mahasiswa

Kalau pondasi ini sudah jadi → fitur surat akan jauh lebih mudah.

---

# Struktur Final Project SIP

Saya sarankan struktur BEGINI.

```text id="xv35j0"
SIP/
│
├── app/
│   ├── config/
│   │   ├── database.php
│   │   └── session.php
│   │
│   ├── controllers/
│   │   ├── AuthController.php
│   │   ├── AdminController.php
│   │   └── MahasiswaController.php
│   │
│   ├── helpers/
│   │   ├── fungsi.php
│   │   └── upload.php
│   │
│   ├── middleware/
│   │   ├── auth.php
│   │   └── admin.php
│   │
│   ├── models/
│   │   ├── User.php
│   │   └── Mahasiswa.php
│   │
│   └── views/
│       ├── auth/
│       ├── admin/
│       ├── mahasiswa/
│       └── layouts/
│
├── public/
│   ├── assets/
│   │   ├── css/
│   │   ├── js/
│   │   └── uploads/
│   │
│   └── index.php
│
├── .env
├── .gitignore
├── README.md
└── database.sql
```

---

# Kenapa Struktur Ini Bagus?

Karena:

| Folder      | Fungsi                       |
| ----------- | ---------------------------- |
| controllers | logika aplikasi              |
| models      | query database               |
| views       | tampilan                     |
| middleware  | proteksi login               |
| helpers     | fungsi tambahan              |
| public      | file yang boleh diakses user |

Ini mendekati Laravel tapi tetap PHP Native sederhana.

---

# Teknologi yang Kita Gunakan

## Backend

- PHP 8+
- PDO

---

## Frontend

- Bootstrap 5.3.3

[Bootstrap 5.3.3](https://getbootstrap.com/docs/5.3/getting-started/introduction/?utm_source=chatgpt.com)

---

## Database

- MySQL

MySQL

---

# Security Dasar yang Akan Kita Terapkan

## 1. PDO Prepared Statement

Aman dari SQL Injection.

---

## 2. Password Hash

Gunakan:

```php id="1j19f2"
password_hash()
```

dan:

```php id="t7u2jv"
password_verify()
```

---

## 3. Session Security

```php id="ahck9g"
session_regenerate_id(true);
```

---

## 4. Validasi Upload File

- PDF only
- rename file
- limit size

---

## 5. Middleware Role

```php id="6ydzc0"
if($_SESSION['role'] != 'admin'){
   exit('akses ditolak');
}
```

---

# Tahapan Belajar Sekaligus Membuat Project

Karena Anda masih belajar PHP, cara terbaik adalah:

## BELAJAR SAMBIL MEMBANGUN

Bukan belajar teori terlalu lama.

---

# Urutan Pengerjaan SIP

# STEP 1 — Database & Login

Kita buat:

- database
- tabel users
- login
- logout
- session

---

# STEP 2 — Dashboard

- dashboard admin
- dashboard mahasiswa

---

# STEP 3 — CRUD Mahasiswa

- tambah
- edit
- hapus
- upload excel nanti

---

# STEP 4 — Pengajuan Surat

- form pengajuan
- status pending

---

# STEP 5 — Approval Admin

- approve
- reject
- generate nomor surat

---

# STEP 6 — PDF Surat

- template HTML
- convert PDF

---

# STEP 7 — Upload TOEFL/Jurnal

---

# STEP 8 — Arsip Surat

---

# README.md untuk GitHub

Berikut isi README sederhana tapi profesional.

```md id="6q3b8d"
# SIP - Sistem Informasi Persuratan

SIP is a web-based correspondence management system designed for doctoral (S3/PhD) academic administration.

## Features

- Multi-role authentication (Admin & Student)
- Incoming and outgoing mail management
- Automatic letter numbering
- Student document upload
- TOEFL, Journal, and Conference verification
- PDF letter generation
- Letter approval workflow
- Digital archive management

## Technologies

- PHP Native
- MySQL
- PDO
- Bootstrap 5.3.3
- JavaScript

## Modules

### Admin

- Manage students
- Verify documents
- Generate letters
- Upload signed documents
- Archive management

### Student

- Submit letter requests
- Upload documents
- Track application status
- Download approved letters

## Security

- PDO Prepared Statement
- Password Hashing
- Session Authentication
- File Upload Validation

## Installation

1. Clone repository
2. Import database.sql
3. Configure `.env`
4. Run on XAMPP

## Developer

SIP Project for Doctoral Academic Administration
```

---

# Saran Penting untuk Anda

Karena Anda masih pemula:

JANGAN buru-buru:

- OOP kompleks
- framework besar
- clean architecture terlalu dalam

Fokus dulu:

- memahami alur PHP
- session
- CRUD
- PDO
- upload file
- routing sederhana
