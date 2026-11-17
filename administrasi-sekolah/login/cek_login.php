
<?php
// ======================================
// PEMERIKSAAN LOGIN PENGGUNA
// ======================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Memastikan pengguna sudah login
if (!isset($_SESSION["id_user"])) {
    header("Location: /final%20project/administrasi-sekolah/login/index.php");
    exit;
}

// Memastikan peran pengguna sesuai
// Variabel $roleDiizinkan dapat diisi sebelum file ini dipanggil

if (isset($roleDiizinkan)) {

    if (!in_array($_SESSION["role"] ?? "", $roleDiizinkan, true)) {
        http_response_code(403);
        exit("Anda tidak memiliki hak akses ke halaman ini.");
    }

}
