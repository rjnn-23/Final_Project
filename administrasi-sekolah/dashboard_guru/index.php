<?php
session_start();

if (
    !isset($_SESSION["id_user"]) ||
    $_SESSION["role"] !== "guru"
) {
    header("Location: ../login/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-purple-50 min-h-screen p-6 md:p-10 font-sans text-gray-800">

    <div class="max-w-5xl mx-auto space-y-6">

        <!-- Header Card -->
        <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-purple-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-purple-900">
                    Dashboard Guru
                </h1>
                <p class="mt-2 text-gray-700">
                    Selamat datang kembali, 
                    <strong class="text-purple-700"><?= htmlspecialchars($_SESSION["nama"] ?? "Guru") ?></strong>
                </p>
                <p class="text-sm text-gray-500 mt-1">
                    Kelola data akademik, presensi, jadwal, dan nilai siswa Anda melalui menu di bawah.
                </p>
            </div>

            <a href="../logout.php"
               class="inline-flex items-center gap-2 bg-purple-50 text-purple-700 hover:bg-purple-700 hover:text-white px-5 py-2.5 rounded-xl font-medium transition duration-200 border border-purple-200 shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
            </a>
        </div>

        <!-- Grid Menu Navigasi -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Presensi -->
            <a href="presensi.php" 
               class="group bg-white p-6 rounded-2xl shadow-sm border border-purple-100 hover:border-purple-400 hover:shadow-md transition duration-200 flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 bg-purple-100 text-purple-700 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-700 group-hover:text-white transition duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-purple-800">Presensi</h2>
                    <p class="text-sm text-gray-500 mt-1">Input dan pantau rekap kehadiran siswa pada tiap sesi kelas.</p>
                </div>
                <span class="mt-5 text-xs font-semibold text-purple-700 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                    Buka Presensi &rarr;
                </span>
            </a>

            <!-- Data Siswa -->
            <a href="siswa.php" 
               class="group bg-white p-6 rounded-2xl shadow-sm border border-purple-100 hover:border-purple-400 hover:shadow-md transition duration-200 flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 bg-purple-100 text-purple-700 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-700 group-hover:text-white transition duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-purple-800">Data Siswa</h2>
                    <p class="text-sm text-gray-500 mt-1">Lihat profil murid, NISN, status keaktifan, dan rombel.</p>
                </div>
                <span class="mt-5 text-xs font-semibold text-purple-700 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                    Lihat Siswa &rarr;
                </span>
            </a>

            <!-- Nilai Siswa -->
            <a href="nilai.php" 
               class="group bg-white p-6 rounded-2xl shadow-sm border border-purple-100 hover:border-purple-400 hover:shadow-md transition duration-200 flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 bg-purple-100 text-purple-700 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-700 group-hover:text-white transition duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-purple-800">Nilai Siswa</h2>
                    <p class="text-sm text-gray-500 mt-1">Input nilai tugas harian, kuis, UTS, dan evaluasi akhir (UAS).</p>
                </div>
                <span class="mt-5 text-xs font-semibold text-purple-700 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                    Kelola Nilai &rarr;
                </span>
            </a>

            <!-- Jadwal Mengajar -->
            <a href="jadwal.php" 
               class="group bg-white p-6 rounded-2xl shadow-sm border border-purple-100 hover:border-purple-400 hover:shadow-md transition duration-200 flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 bg-purple-100 text-purple-700 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-700 group-hover:text-white transition duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-purple-800">Jadwal Mengajar</h2>
                    <p class="text-sm text-gray-500 mt-1">Cek alokasi ruangan kelas dan jam mengajar mingguan Anda.</p>
                </div>
                <span class="mt-5 text-xs font-semibold text-purple-700 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                    Lihat Jadwal &rarr;
                </span>
            </a>

            <!-- Mata Pelajaran Diampu -->
            <a href="mapel.php" 
               class="group bg-white p-6 rounded-2xl shadow-sm border border-purple-100 hover:border-purple-400 hover:shadow-md transition duration-200 flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 bg-purple-100 text-purple-700 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-700 group-hover:text-white transition duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-purple-800">Mata Pelajaran</h2>
                    <p class="text-sm text-gray-500 mt-1">Daftar silabus, materi ajar, dan mata pelajaran yang diampu.</p>
                </div>
                <span class="mt-5 text-xs font-semibold text-purple-700 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                    Kelola Mapel &rarr;
                </span>
            </a>

        </div>

    </div>

</body>
</html>
