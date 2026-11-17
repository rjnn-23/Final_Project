
<?php
// ======================================
// KONFIGURASI AWAL
// ======================================

session_start();

require_once "../koneksi.php";

// Hanya menerima data dari formulir login
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

// Mengambil data formulir
$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";

// Fungsi untuk mengembalikan pengguna ke halaman login
function gagalLogin($pesan, $email = "") {
    $_SESSION["login_error"] = $pesan;
    $_SESSION["login_email"] = $email;

    header("Location: index.php");
    exit;
}

// ======================================
// VALIDASI INPUT
// ======================================

if ($email === "" || $password === "") {
    gagalLogin("Email dan kata sandi wajib diisi.", $email);
}

// ======================================
// MENCARI AKUN DI DATABASE
// ======================================

$stmt = $pdo->prepare(
    "SELECT id_user, nama, email, password, role
     FROM users
     WHERE email = ?
     LIMIT 1"
);

$stmt->execute([$email]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

// ======================================
// MEMERIKSA EMAIL DAN PASSWORD
// ======================================

if (!$user || !password_verify($password, $user["password"])) {
    gagalLogin("Email atau kata sandi salah.", $email);
}

// ======================================
// MEMERIKSA ROLE PENGGUNA
// ======================================

if (!in_array($user["role"], ["admin", "guru"], true)) {
    gagalLogin("Peran akun tidak dikenali.", $email);
}

// ======================================
// MEMBUAT SESSION PENGGUNA
// ======================================

session_regenerate_id(true);

$_SESSION["id_user"] = $user["id_user"];
$_SESSION["nama"] = $user["nama"];
$_SESSION["email"] = $user["email"];
$_SESSION["role"] = $user["role"];

// ======================================
// MENGARAHKAN PENGGUNA
// ======================================

require "arahkan_pengguna.php";
