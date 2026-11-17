
<?php
// ======================================
// PENGARAHAN HALAMAN PENGGUNA
// ======================================

// Pastikan pengguna sudah login
if (!isset($_SESSION["id_user"])) {
    header("Location: index.php");
    exit;
}

// Mengambil peran pengguna
$role = $_SESSION["role"] ?? "";

// Mengarahkan Admin
if ($role === "admin") {
    header("Location: ../index.php");
    exit;
}

// Mengarahkan Guru
if ($role === "guru") {
    header("Location: ../guru/index.php");
    exit;
}

// Jika peran tidak dikenali
$_SESSION = [];

session_destroy();

header("Location: index.php");
exit;
