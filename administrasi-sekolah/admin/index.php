
<?php
$namaGuru = "Bapak/Ibu Guru";
$totalSiswa = 32;
$totalPresensi = 20;
$totalPrestasi = 8;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Guru - SchoolCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-purple-50">

<div class="flex min-h-screen">

    <!-- Menu Samping -->
    <aside class="w-64 bg-purple-800 text-white p-6">
        <h1 class="text-2xl font-bold mb-8">SchoolCare</h1>

        <nav class="space-y-3">
            <a href="index.php"
               class="block bg-purple-600 p-3 rounded-lg">
                Beranda
            </a>

            <a href="presensi/index.php"
               class="block p-3 hover:bg-purple-700 rounded-lg">
                Presensi
            </a>

            <a href="nilai/index.php"
               class="block p-3 hover:bg-purple-700 rounded-lg">
                Nilai Siswa
            </a>

            <a href="prestasi/index.php"
               class="block p-3 hover:bg-purple-700 rounded-lg">
                Prestasi Siswa
            </a>
        </nav>
    </aside>

    <!-- Isi Halaman -->
    <main class="flex-1 p-8">

        <h2 class="text-3xl font-bold text-purple-900">
            Beranda Guru
        </h2>

        <p class="text-gray-600 mt-2">
            Selamat datang, <?php echo $namaGuru; ?>.
        </p>

        <!-- Ringkasan -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500">Jumlah Siswa</p>
                <h3 class="text-3xl font-bold text-purple-700">
                    <?php echo $totalSiswa; ?>
                </h3>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500">Presensi Hari Ini</p>
                <h3 class="text-3xl font-bold text-purple-700">
                    <?php echo $totalPresensi; ?>
                </h3>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-gray-500">Jumlah Prestasi</p>
                <h3 class="text-3xl font-bold text-purple-700">
                    <?php echo $totalPrestasi; ?>
                </h3>
            </div>

        </div>

        <!-- Menu Utama -->
        <h3 class="text-xl font-bold text-purple-900 mt-10 mb-4">
            Menu Guru
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <a href="presensi/index.php"
               class="bg-white p-6 rounded-xl shadow hover:shadow-lg">
                <h4 class="text-lg font-bold text-purple-800">
                    Presensi Siswa
                </h4>
                <p class="text-gray-500 mt-2">
                    Mengelola kehadiran siswa.
                </p>
            </a>

            <a href="nilai/index.php"
               class="bg-white p-6 rounded-xl shadow hover:shadow-lg">
                <h4 class="text-lg font-bold text-purple-800">
                    Nilai Siswa
                </h4>
                <p class="text-gray-500 mt-2">
                    Mengelola nilai Penilaian Harian, UTS, dan UAS.
                </p>
            </a>

            <a href="prestasi/index.php"
               class="bg-white p-6 rounded-xl shadow hover:shadow-lg">
                <h4 class="text-lg font-bold text-purple-800">
                    Prestasi Siswa
                </h4>
                <p class="text-gray-500 mt-2">
                    Mencatat prestasi akademik dan non-akademik.
                </p>
            </a>

        </div>

    </main>
</div>

</body>
</html>
