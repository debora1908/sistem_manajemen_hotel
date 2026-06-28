<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Kamar - Five Star Horizon Hotel</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2=family=Playfair+Display:wght@400;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #f4f7f9;
            color: #2D3748;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin: 0;
        }
        .font-serif { font-family: 'Playfair Display', serif; }
        .main-navbar {
            width: 100%; background-color: #ffffff; border-bottom: 1px solid #e2e8f0;
            padding: 1.25rem 1.5rem; display: flex; flex-direction: column; align-items: center; gap: 1rem;
        }
        @media (min-width: 640px) { .main-navbar { flex-direction: row; justify-content: space-between; } }
        .brand-logo { font-size: 1.25rem; font-weight: 700; color: #0E7490; display: flex; align-items: center; gap: 0.5rem; }
        .nav-menu { display: flex; align-items: center; gap: 1rem; }
        .nav-link { font-size: 0.75rem; font-weight: 500; color: #64748b; text-decoration: none; }
        .content-container { flex-grow: 1; display: flex; flex-direction: column; align-items: center; padding: 2rem 1rem; gap: 2rem; }
        .reservation-card {
            background-color: #ffffff; border-radius: 1.5rem; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
            overflow: hidden; max-width: 1050px; width: 100%; display: flex; flex-direction: column;
        }
        @media (min-width: 768px) { .reservation-card { flex-direction: row; } }
        .sidebar-banner { padding: 2.5rem; display: flex; flex-direction: column; justify-content: space-between; position: relative; background-color: #0f172a; color: #ffffff; }
        @media (min-width: 768px) { .sidebar-banner { width: 40%; } }
        .banner-bg { position: absolute; inset: 0; background-size: cover; background-position: center; opacity: 0.4; background-image: url('https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=800&q=80'); }
        .form-content { padding: 2.5rem; flex-grow: 1; }
        @media (min-width: 768px) { .form-content { width: 60%; } }
        .form-title { font-size: 1.75rem; font-weight: 700; color: #0F766E; margin: 0; }
        .form-group { display: flex; flex-direction: column; gap: 1.25rem; margin-top: 1.5rem; }
        .form-label { font-size: 11px; font-weight: 700; text-transform: uppercase; color: #334155; }
        .input-field { width: 100%; background-color: #f8fafc; padding: 0.75rem 1rem; border-radius: 0.5rem; border: 1px solid #cbd5e1; font-size: 0.875rem; box-sizing: border-box; }
        .input-field:focus { outline: none; border-color: #0E7490; box-shadow: 0 0 0 3px rgba(14, 116, 144, 0.15); background-color: #fff; }
        .grid-split { display: grid; grid-template-columns: 1fr; gap: 1rem; }
        @media (min-width: 640px) { .grid-split { grid-template-columns: 1fr 1fr; } }
        .btn-submit { width: 100%; background-color: #1E293B; color: #ffffff; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; padding: 0.875rem; border-radius: 0.5rem; border: none; cursor: pointer; transition: background 0.2s; }
        .btn-submit:hover { background-color: #0F172A; }
        
        /* Table Styles */
        .table-container { width: 100%; max-width: 1050px; background: white; padding: 2rem; border-radius: 1.5rem; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05); overflow-x: auto; box-sizing: border-box; }
        .history-table { width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem; }
        .history-table th { padding: 1rem; background-color: #f8fafc; color: #475569; font-weight: 600; border-bottom: 2px solid #e2e8f0; }
        .history-table td { padding: 1rem; border-bottom: 1px solid #e2e8f0; color: #334155; }
        .badge { padding: 0.25rem 0.5rem; border-radius: 0.375rem; font-size: 0.75rem; font-weight: 500; background-color: #e2e8f0; color: #334155; }
        .alert-success { background-color: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; font-size: 0.875rem; width: 100%; max-width: 1050px; box-sizing: border-box; }
    </style>
</head>
<body>

    <nav class="main-navbar">
        <div class="brand-logo font-serif"><i class="bi bi-water"></i> Five Star Horizon Hotel</div>
        <div class="nav-menu">
            <a href="{{ url('/') }}" class="nav-link"><i class="bi bi-house"></i> Beranda</a>
        </div>
    </nav>

    <main class="content-container">
        
        @if(session('success'))
            <div class="alert-success">✓ {{ session('success') }}</div>
        @endif

        <div class="reservation-card">
            <div class="sidebar-banner">
                <div class="banner-bg"></div>
                <div style="position: relative; z-index: 10;">
                    <span style="font-size: 10px; font-weight:700; color:#fbbf24; text-transform:uppercase; tracking: 0.2em;">Exclusive Stay</span>
                    <h2 class="banner-title font-serif" style="font-size: 2rem; margin: 0.5rem 0;">Tropical Paradise</h2>
                    <p style="font-size: 0.75rem; opacity: 0.8; line-height: 1.5;">Nikmati kemewahan menginap terbaik dengan pemandangan langsung ke pantai tropis Bali.</p>
                </div>
                <div style="position: relative; z-index: 10; font-size: 11px; opacity: 0.7;">
                    <p>📍 Badung, Bali, Indonesia</p>
                </div>
            </div>

            <div class="form-content">
                <h3 class="form-title font-serif">Form Reservasi Hotel</h3>
                <p style="color: #94a3b8; font-size: 0.75rem; margin: 0.25rem 0 0 0;">Silakan isi detail masa inap Anda dengan benar.</p>

                <form action="{{ route('reservasi.store') }}" method="POST" class="form-group">
                    @csrf
                    <div>
                        <label class="form-label">Nama Tamu</label>
                        <input type="text" name="nama_tamu" placeholder="Masukkan nama lengkap Anda" required class="input-field">
                    </div>
                    <div>
                        <label class="form-label">Email Tamu</label>
                        <input type="email" name="email" placeholder="Masukkan email aktif Anda" required class="input-field">
                    </div>
                    <div>
                        <label class="form-label">Pilih Kamar (Tersedia)</label>
                        <select name="kamar_id" required class="input-field">
                            <option value="" disabled selected>-- Pilih Kamar --</option>
                            @foreach($kamars as $kamar)
                                <option value="{{ $kamar->id }}">
                                    Kamar {{ $kamar->nomor_kamar }} ({{ $kamar->tipe_kamar }}) - Rp {{ number_format($kamar->harga_per_malam, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid-split">
                        <div>
                            <label class="form-label">Tanggal Check-In</label>
                            <input type="date" name="tanggal_checkin" required class="input-field">
                        </div>
                        <div>
                            <label class="form-label">Tanggal Check-Out</label>
                            <input type="date" name="tanggal_checkout" required class="input-field">
                        </div>
                    </div>
                    <div style="padding-top: 0.5rem;">
                        <button type="submit" class="btn-submit">Pesan Sekarang</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="table-container">
            <h4 class="font-serif" style="margin: 0 0 1rem 0; color: #1e293b; font-size: 1.25rem;">Riwayat Reservasi Terkini</h4>
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Tamu</th>
                        <th>Kamar Pilihan</th>
                        <th>Masa Inap</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservasis as $res)
                        <tr>
                            <td>
                                <strong>{{ $res->nama_tamu }}</strong><br>
                                <span style="font-size: 11px; color:#64748b;">{{ $res->email_tamu }}</span>
                            </td>
                            <td>
                                <span class="badge">No. {{ $res->kamar->nomor_kamar ?? '-' }}</span>
                                <span style="font-size: 12px; display:block; margin-top:4px;">{{ $res->kamar->tipe_kamar ?? 'Kamar dihapus' }}</span>
                            </td>
                            <td style="font-size: 12px; line-height: 1.4;">
                                📅 <strong>In:</strong> {{ \Carbon\Carbon::parse($res->tanggal_checkin)->format('d M Y') }}<br>
                                🚪 <strong>Out:</strong> {{ \Carbon\Carbon::parse($res->tanggal_checkout)->format('d M Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center; color: #94a3b8; padding: 2rem;">Belum ada data reservasi terkini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </main>

    <footer style="width: 100%; text-align: center; padding: 1.25rem 0; font-size: 11px; color: #94a3b8; background-color: #ffffff; border-top: 1px solid #e2e8f0;">
        &copy; 2026 Five Star Horizon Hotel. All rights reserved.
    </footer>

</body>
</html>