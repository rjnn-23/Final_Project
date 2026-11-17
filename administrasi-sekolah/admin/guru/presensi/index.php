
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi Siswa - SchoolCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-purple-50">

<div class="flex min-h-screen">

    <aside class="w-64 bg-purple-800 text-white p-6">
        <h1 class="text-2xl font-bold mb-8">SchoolCare</h1>

        <nav class="space-y-3">
            <a href="../index.php" class="block p-3 hover:bg-purple-700 rounded-lg">
                Beranda
            </a>

            <a href="index.php" class="block bg-purple-600 p-3 rounded-lg">
                Presensi
            </a>

            <a href="../nilai/index.php" class="block p-3 hover:bg-purple-700 rounded-lg">
                Nilai Siswa
            </a>

            <a href="../prestasi/index.php" class="block p-3 hover:bg-purple-700 rounded-lg">
                Prestasi Siswa
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-8">

        <h2 class="text-3xl font-bold text-purple-900">
            Presensi Siswa
        </h2>

        <p class="text-gray-600 mt-2">
            Halaman pencatatan kehadiran siswa.
        </p>

        <div class="bg-white p-6 rounded-xl shadow mt-8">

            <h3 class="text-xl font-bold text-purple-800 mb-5">
                Keterangan Kehadiran
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                <div class="bg-green-50 p-5 rounded-lg">
                    <h4 class="font-bold text-green-700">Hadir</h4>
                    <p class="text-gray-600 text-sm mt-2">
                        Siswa mengikuti kegiatan pembelajaran di sekolah.
                    </p>
                </div>

                <div class="bg-yellow-50 p-5 rounded-lg">
                    <h4 class="font-bold text-yellow-700">Sakit</h4>
                    <p class="text-gray-600 text-sm mt-2">
                        Siswa tidak hadir karena sakit.
                    </p>
                </div>

                <div class="bg-blue-50 p-5 rounded-lg">
                    <h4 class="font-bold text-blue-700">Izin</h4>
                    <p class="text-gray-600 text-sm mt-2">
                        Siswa tidak hadir karena memiliki izin.
                    </p>
                </div>

            </div>

            <p class="text-gray-500 mt-6">
                Tabel pencatatan kehadiran siswa akan ditampilkan di bagian ini.
            </p>

        </div>

    </main>
</div>

</body>
</html>
