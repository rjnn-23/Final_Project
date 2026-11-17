
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Siswa - SchoolCare</title>
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

            <a href="../presensi/index.php" class="block p-3 hover:bg-purple-700 rounded-lg">
                Presensi
            </a>

            <a href="index.php" class="block bg-purple-600 p-3 rounded-lg">
                Nilai Siswa
            </a>

            <a href="../prestasi/index.php" class="block p-3 hover:bg-purple-700 rounded-lg">
                Prestasi Siswa
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-8">

        <h2 class="text-3xl font-bold text-purple-900">
            Nilai Siswa
        </h2>

        <p class="text-gray-600 mt-2">
            Halaman pengelolaan nilai siswa.
        </p>

        <div class="bg-white p-6 rounded-xl shadow mt-8">

            <h3 class="text-xl font-bold text-purple-800 mb-4">
                Jenis Penilaian
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                <div class="bg-purple-50 p-5 rounded-lg">
                    <h4 class="font-bold text-purple-800">
                        Penilaian Harian
                    </h4>
                    <p class="text-gray-600 text-sm mt-2">
                        Nilai dari hasil kegiatan pembelajaran harian.
                    </p>
                </div>

                <div class="bg-purple-50 p-5 rounded-lg">
                    <h4 class="font-bold text-purple-800">
                        UTS
                    </h4>
                    <p class="text-gray-600 text-sm mt-2">
                        Nilai Ulangan Tengah Semester.
                    </p>
                </div>

                <div class="bg-purple-50 p-5 rounded-lg">
                    <h4 class="font-bold text-purple-800">
                        UAS
                    </h4>
                    <p class="text-gray-600 text-sm mt-2">
                        Nilai Ulangan Akhir Semester.
                    </p>
                </div>

            </div>

            <p class="text-gray-500 mt-6">
                Data nilai siswa akan ditampilkan di bagian ini.
            </p>

        </div>

    </main>
</div>

</body>
</html>
