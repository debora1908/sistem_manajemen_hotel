<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Five Star Horizon Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-800">

    <div class="min-h-screen flex flex-col">
        <nav class="bg-white border-b border-slate-200 px-8 py-4 flex justify-between items-center shadow-sm">
            <span class="text-xl font-bold tracking-tight text-[#247c94]">Five Star Horizon <span class="text-slate-400 font-light">Admin</span></span>
            <a href="{{ route('reservasi.index') }}" class="text-xs bg-slate-100 hover:bg-slate-200 text-slate-600 font-medium py-2 px-4 rounded-lg transition">
                + Tambah Reservasi Baru
            </a>
        </nav>

        <main class="flex-1 p-8 max-w-7xl w-full mx-auto">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-slate-900">Daftar Reservasi Kamar</h1>
                <p class="text-sm text-slate-500">Kelola dan pantau seluruh data tamu hotel yang aktif.</p>
            </div>

            @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-sm flex items-center">
                ✨ {{ session('success') }}
            </div>
            @endif

            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                                <th class="px-6 py-4">Nama Tamu</th>
                                <th class="px-6 py-4">Kamar</th>
                                <th class="px-6 py-4">Tipe</th>
                                <th class="px-6 py-4">Check In</th>
                                <th class="px-6 py-4">Check Out</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 text-sm">
                            @forelse($reservasis as $res)
                            <tr class="hover:bg-slate-50/70 transition">
                                <td class="px-6 py-4 font-medium text-slate-900">
                                    {{ $res->nama_tamu }}
                                    <span class="block text-xs font-normal text-slate-400">{{ $res->email_tamu }}</span>
                                </td>
                                <td class="px-6 py-4 text-slate-600 font-semibold">No. {{ $res->nomor_kamar }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-blue-50 text-blue-700 border border-blue-100">
                                        {{ $res->tipe_kamar }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-600">{{ date('d M Y', strtotime($res->tanggal_checkin)) }}</td>
                                <td class="px-6 py-4 text-slate-600">{{ date('d M Y', strtotime($res->tanggal_checkout)) }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-lg bg-emerald-100 text-emerald-800">
                                        Confirmed
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                                    📭 Belum ada data reservasi yang masuk.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>
</html>