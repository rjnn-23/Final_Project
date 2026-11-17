<?php
session_start();

if (
    !isset($_SESSION["id_user"]) ||
    $_SESSION["role"] !== "orang_tua"
) {
    header("Location: ../login/index.php");
    exit;
}

// Hubungkan file koneksi jika sudah ada:
// require_once "../koneksi.php";

// Array dikosongkan (diisi via query tabel prestasi siswa dari Admin)
$daftar_prestasi = [];

/*
Contoh Query database:
$id_murid = $_SESSION["id_murid"] ?? 0;
$query = mysqli_query($conn, "SELECT * FROM prestasi WHERE id_murid = '$id_murid'");
while ($row = mysqli_fetch_assoc($query)) {
    $daftar_prestasi[] = $row;
}
*/
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestasi Siswa - Dashboard Orang Tua</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-purple-50 min-h-screen p-6 md:p-10 font-sans text-gray-800">

    <div class="max-w-5xl mx-auto space-y-6">

        <!-- Top Bar Navigation -->
        <div class="flex items-center justify-between">
            <a href="index.php" class="inline-flex items-center gap-2 text-purple-700 hover:text-purple-900 font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Dashboard
            </a>
            <span class="text-sm text-gray-500">Prestasi Akademik & Non-Akademik</span>
        </div>

        <!-- Header Card -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-purple-100 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-purple-900">Prestasi Siswa/Siswi</h1>
                <p class="text-sm text-gray-500 mt-1">Daftar kejuaraan akademik dan non-akademik yang resmi dicatat sekolah.</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 text-purple-700 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                </svg>
            </div>
        </div>

        <!-- Konten Dinamis -->
        <?php if (empty($daftar_prestasi)): ?>
            <div class="bg-white p-12 rounded-2xl shadow-sm border border-purple-100 text-center space-y-3">
                <div class="w-16 h-16 bg-purple-50 text-purple-400 rounded-full flex items-center justify-center mx-auto">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-lg font-bold text-gray-700">Belum Ada Catatan Prestasi</h2>
                <p class="text-sm text-gray-500 max-w-md mx-auto">
                    Belum ada rekaman prestasi akademik maupun non-akademik yang diinputkan admin untuk siswa ini.
                </p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($daftar_prestasi as $prestasi): 
                    $tipe = strtolower($prestasi["kategori"] ?? "akademik");
                    $badgeColor = ($tipe === "akademik") ? "bg-purple-100 text-purple-800" : "bg-amber-100 text-amber-800";
                ?>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-purple-100 flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full <?= $badgeColor ?>">
                                <?= htmlspecialchars(ucfirst($tipe)) ?>
                            </span>
                            <span class="text-xs text-gray-400 font-medium">Tahun <?= htmlspecialchars($prestasi["tahun"]) ?></span>
                        </div>

                        <h2 class="text-base font-bold text-gray-800 leading-snug">
                            <?= htmlspecialchars($prestasi["nama_kegiatan"]) ?>
                        </h2>
                        <p class="text-xs text-gray-500 mt-1">
                            Tingkat: <span class="font-medium text-purple-700"><?= htmlspecialchars($prestasi["tingkat"]) ?></span>
                        </p>
                    </div>

                    <div class="mt-5 pt-4 border-t border-purple-50 flex items-center justify-between">
                        <div>
                            <span class="text-[11px] text-gray-400 block">Peringkat / Hasil</span>
                            <span class="text-sm font-bold text-purple-800"><?= htmlspecialchars($prestasi["juara"]) ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>

</body>
</html>
