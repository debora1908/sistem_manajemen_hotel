<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Kamar - Five Star Horizon Hotel</title>
    <!-- Tailwind CSS v4 -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Bootstrap Icons untuk ikon navbar & tombol -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex flex-col justify-between">

    <!-- NAVBAR (Sudah diredesain dengan Tailwind agar serasi) -->
    <nav class="w-full bg-white shadow-xs border-b border-slate-100 px-6 py-4 md:px-12 flex flex-col sm:flex-row justify-between items-center gap-4">
        <div class="text-base font-semibold text-slate-800 tracking-wide flex items-center gap-2">
            <i class="bi bi-water text-cyan-600"></i> Five Star Horizon Hotel
        </div>
        
        <div class="flex items-center gap-4 flex-wrap justify-center">
            <a href="{{ url('/') }}" class="text-xs font-medium text-slate-500 hover:text-slate-800 transition flex items-center gap-1">
                <i class="bi bi-house"></i> Beranda
            </a>
            <a href="{{ url('/kamar') }}" class="text-xs font-medium text-slate-600 hover:text-slate-900 border border-slate-200 px-3 py-1.5 rounded-lg hover:bg-slate-50 transition">
                Manajemen Kamar
            </a>
            
            <!-- Deteksi Status Login Admin -->
            @auth
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-xs bg-red-600 hover:bg-red-700 text-white font-medium px-3 py-1.5 rounded-lg transition inline-flex items-center gap-1 cursor-pointer">
                        <i class="bi bi-box-arrow-right"></i> Keluar
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-xs bg-slate-900 hover:bg-slate-800 text-white font-medium px-3 py-1.5 rounded-lg transition inline-flex items-center gap-1">
                    <i class="bi bi-person-lock"></i> Login Admin
                </a>
            @endauth
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="flex-grow flex items-center justify-center p-4 md:p-10">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden max-w-4xl w-full flex flex-col md:flex-row min-h-[550px]">
            
            <!-- Sidebar Informasi (Kiri) -->
            <div class="md:w-2/5 bg-slate-900 text-white p-8 flex flex-col justify-between relative min-h-[200px] md:min-h-full">
                <div class="absolute inset-0 bg-cover bg-center opacity-40" 
                     style="background-image: url('https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=600&q=80');"></div>
                
                <div class="relative z-10">
                    <span class="text-[10px] font-bold tracking-[0.2em] uppercase text-amber-400 block mb-2">Exclusive Stay</span>
                    <h2 class="font-serif text-3xl font-medium tracking-wide mb-3">Tropical Paradise</h2>
                    <p class="text-slate-300 text-xs leading-relaxed">Satu langkah lagi untuk menikmati kemewahan menginap terbaik dengan pemandangan langsung ke pantai tropis Bali.</p>
                </div>
                
                <div class="relative z-10 pt-4 border-t border-slate-700/50 text-[11px] text-slate-400 space-y-1">
                    <p>📍 Badung, Bali, Indonesia</p>
                    <p>📞 +62 361 123456</p>
                </div>
            </div>

            <!-- Form Konten (Kanan) -->
            <div class="md:w-3/5 p-8 sm:p-10 flex flex-col justify-center">
                <div class="mb-6">
                    <h3 class="font-serif text-2xl font-semibold text-slate-800">Form Reservasi Hotel</h3>
                    <p class="text-slate-400 text-xs mt-1">Silakan isi detail data masa inap Anda dengan benar.</p>
                </div>

                <form action="#" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Nama Tamu</label>
                        <input type="text" name="nama_tamu" placeholder="Masukkan nama lengkap Anda" required
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-slate-900 transition">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Pilihan Villa / Kamar</label>
                        <select name="tipe_kamar" required
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-slate-900 transition bg-white">
                            <option value="" disabled selected>Pilih jenis kamar...</option>
                            <option value="deluxe">Deluxe Ocean View</option>
                            <option value="villa">Private Pool Villa</option>
                            <option value="suite">Horizon Presidential Suite</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Tanggal Check In</label>
                            <input type="date" name="check_in" required
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-700 text-sm focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-slate-900 transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1.5">Tanggal Check Out</label>
                            <input type="date" name="check_out" required
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-slate-700 text-sm focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-slate-900 transition">
                        </div>
                    </div>

                    <div class="pt-3">
                        <button type="submit" 
                            class="w-full bg-slate-950 hover:bg-slate-800 text-white text-xs font-semibold uppercase tracking-widest py-3 px-4 rounded-xl shadow-md transition duration-150 cursor-pointer">
                            Pesan Sekarang
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="w-full text-center py-4 text-[11px] text-slate-400 bg-white border-t border-slate-100">
        &copy; 2026 Five Star Horizon Hotel. All rights reserved.
    </footer>

</body>
</html>