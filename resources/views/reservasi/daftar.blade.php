<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Reservasi - Nirwana Hotel</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex flex-col justify-between">

    <header class="w-full px-6 py-4 md:px-12 flex justify-between items-center bg-white shadow-xs border-b border-slate-100">
        <div class="text-base font-semibold text-slate-800 tracking-wide">
            Nirwana Hotel — Admin Dashboard
        </div>
        <div class="flex space-x-6 text-xs font-medium">
            <a href="{{ url('/') }}" class="text-slate-500 hover:text-slate-800 transition">Beranda</a>
            <a href="{{ route('reservasi.index') }}" class="text-slate-500 hover:text-slate-800 transition">+ Tambah Reservasi</a>
        </div>
    </header>

    <main class="max-w-6xl w-full mx-auto p-4 md:p-8 flex-grow">
        <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-xl font-bold text-slate-800">Data Reservasi Kamar</h2>
                <p class="text-slate-400 text-xs mt-0.5">Manajemen daftar seluruh tamu yang memesan kamar hotel.</p>
            </div>
            <a href="{{ route('reservasi.index') }}" class="bg-slate-900 hover:bg-slate-800 text-white text-xs font-semibold px-4 py-2.5 rounded-xl transition inline-block text-center shadow-xs">
                + Tambah Tamu Baru
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/70 border-b border-slate-100 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                            <th class="py-4 px-6">No</th>
                            <th class="py-4 px-6">Nama Tamu</th>
                            <th class="py-4 px-6">Pilihan Villa/Kamar</th>
                            <th class="py-4 px-6">Tanggal Check In</th>
                            <th class="py-4 px-6">Tanggal Check Out</th>
                            <th class="py-4 px-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs text-slate-700 divide-y divide-slate-100">
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="py-4 px-6 font-medium text-slate-400">1</td>
                            <td class="py-4 px-6 font-semibold text-slate-800">Budi Santoso</td>
                            <td class="py-4 px-6">
                                <span class="bg-emerald-50 text-emerald-700 font-medium px-2.5 py-1 rounded-md text-[11px]">Private Pool Villa</span>
                            </td>
                            <td class="py-4 px-6 text-slate-500">25/06/2026</td>
                            <td class="py-4 px-6 text-slate-500">28/06/2026</td>
                            <td class="py-4 px-6">
                                <div class="flex justify-center items-center space-x-3">
                                    <button class="text-blue-600 hover:text-blue-800 font-medium transition cursor-pointer">Edit</button>
                                    <span class="text-slate-200">|</span>
                                    <button class="text-red-500 hover:text-red-700 font-medium transition cursor-pointer">Batal</button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="py-4 px-6 font-medium text-slate-400">2</td>
                            <td class="py-4 px-6 font-semibold text-slate-800">Siti Rahma</td>
                            <td class="py-4 px-6">
                                <span class="bg-blue-50 text-blue-700 font-medium px-2.5 py-1 rounded-md text-[11px]">Deluxe Ocean View</span>
                            </td>
                            <td class="py-4 px-6 text-slate-500">01/07/2026</td>
                            <td class="py-4 px-6 text-slate-500">03/07/2026</td>
                            <td class="py-4 px-6">
                                <div class="flex justify-center items-center space-x-3">
                                    <button class="text-blue-600 hover:text-blue-800 font-medium transition cursor-pointer">Edit</button>
                                    <span class="text-slate-200">|</span>
                                    <button class="text-red-500 hover:text-red-700 font-medium transition cursor-pointer">Batal</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="w-full text-center py-4 text-[11px] text-slate-400 bg-white border-t border-slate-100">
        &copy; 2026 Five Star Horizon Hotel. All rights reserved.
    </footer>

</body>
</html>