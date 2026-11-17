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

// Array dikosongkan (diisi via query database hasil input Admin/Guru)
$daftar_nilai = [];

/*
Contoh Query database:
$id_murid = $_SESSION["id_murid"] ?? 0;
$query = mysqli_query($conn, "SELECT n.*, m.nama_mapel FROM nilai n JOIN mapel m ON n.id_mapel = m.id WHERE n.id_murid = '$id_murid'");
while ($row = mysqli_fetch_assoc($query)) {
    $daftar_nilai[] = $row;
}
*/
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Siswa - Dashboard Orang Tua</title>
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
            <span class="text-sm text-gray-500">Nilai Keseharian, UTS, & UAS</span>
        </div>

        <!-- Header Card -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-purple-100 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-purple-900">Rekapitulasi Nilai Siswa</h1>
                <p class="text-sm text-gray-500 mt-1">Daftar evaluasi nilai harian/keseharian, UTS, dan UAS siswa.</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 text-purple-700 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
        </div>

        <!-- Konten Dinamis -->
        <?php if (empty($daftar_nilai)): ?>
            <div class="bg-white p-12 rounded-2xl shadow-sm border border-purple-100 text-center space-y-3">
                <div class="w-16 h-16 bg-purple-50 text-purple-400 rounded-full flex items-center justify-center mx-auto">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="text-lg font-bold text-gray-700">Belum Ada Rekap Nilai</h2>
                <p class="text-sm text-gray-500 max-w-md mx-auto">
                    Nilai keseharian, UTS, maupun UAS untuk siswa ini belum dimasukkan oleh guru/admin.
                </p>
            </div>
        <?php else: ?>
            <div class="bg-white rounded-2xl shadow-sm border border-purple-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-purple-100/60 text-purple-900 text-sm font-semibold uppercase tracking-wider">
                            <tr>
                                <th class="p-4">No</th>
                                <th class="p-4">Mata Pelajaran</th>
                                <th class="p-4 text-center">Nilai Keseharian (Tugas/PR)</th>
                                <th class="p-4 text-center">Nilai UTS</th>
                                <th class="p-4 text-center">Nilai UAS</th>
                                <th class="p-4 text-center">Nilai Akhir</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-purple-50 text-sm">
                            <?php foreach ($daftar_nilai as $index => $row): 
                                $keseharian = (float)($row["nilai_keseharian"] ?? 0);
                                $uts = (float)($row["nilai_uts"] ?? 0);
                                $uas = (float)($row["nilai_uas"] ?? 0);
                                $nilai_akhir = round(($keseharian + $uts + $uas) / 3, 1);
                            ?>
                            <tr class="hover:bg-purple-50/50 transition">
                                <td class="p-4 text-gray-500 font-medium"><?= $index + 1 ?></td>
                                <td class="p-4 font-semibold text-gray-800"><?= htmlspecialchars($row["nama_mapel"]) ?></td>
                                <td class="p-4 text-center text-gray-700"><?= $keseharian ?></td>
                                <td class="p-4 text-center text-gray-700"><?= $uts ?></td>
                                <td class="p-4 text-center text-gray-700"><?= $uas ?></td>
                                <td class="p-4 text-center font-bold text-purple-700"><?= $nilai_akhir ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>

    </div>

</body>
</html>
