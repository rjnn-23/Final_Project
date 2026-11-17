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

// Array dikosongkan (diisi via query pencapaian belajar siswa)
$pencapaian_belajar = [];

/*
Contoh Query database:
$id_murid = $_SESSION["id_murid"] ?? 0;
$query = mysqli_query($conn, "SELECT * FROM pencapaian_belajar WHERE id_murid = '$id_murid'");
while ($row = mysqli_fetch_assoc($query)) {
    $pencapaian_belajar[] = $row;
}
*/
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencapaian Belajar - Dashboard Orang Tua</title>
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
            <span class="text-sm text-gray-500">Capaian Kompetensi & Perkembangan Siswa</span>
        </div>

        <!-- Header Card -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-purple-100 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-purple-900">Pencapaian Belajar Siswa</h1>
                <p class="text-sm text-gray-500 mt-1">Laporan ketuntasan capaian materi kurikulum dan keaktifan kelas.</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 text-purple-700 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
            </div>
        </div>

        <!-- Konten Dinamis -->
        <?php if (empty($pencapaian_belajar)): ?>
            <div class="bg-white p-12 rounded-2xl shadow-sm border border-purple-100 text-center space-y-3">
                <div class="w-16 h-16 bg-purple-50 text-purple-400 rounded-full flex items-center justify-center mx-auto">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                </div>
                <h2 class="text-lg font-bold text-gray-700">Belum Ada Catatan Capaian Belajar</h2>
                <p class="text-sm text-gray-500 max-w-md mx-auto">
                    Admin atau guru belum memasukkan rekapitulasi capaian belajar untuk siswa ini.
                </p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 gap-4">
                <?php foreach ($pencapaian_belajar as $item): ?>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-purple-100 space-y-3">
                    <div class="flex justify-between items-start">
                        <div>
                            <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold bg-purple-100 text-purple-700">
                                <?= htmlspecialchars($item["mata_pelajaran"] ?? "Umum") ?>
                            </span>
                            <h2 class="text-lg font-bold text-gray-800 mt-2">
                                <?= htmlspecialchars($item["kompetensi_capaian"]) ?>
                            </h2>
                        </div>
                        <span class="text-xs font-semibold px-3 py-1 rounded-full bg-emerald-100 text-emerald-700">
                            <?= htmlspecialchars($item["status_ketuntasan"] ?? "Tercapai") ?>
                        </span>
                    </div>

                    <p class="text-sm text-gray-600 bg-purple-50/50 p-3 rounded-xl border border-purple-50">
                        <strong class="text-purple-900">Ulasan/Catatan Guru:</strong> 
                        <?= htmlspecialchars($item["catatan_evaluasi"]) ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>

</body>
</html>
