<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Ringkasan Hotel - E-Hotel Mgt</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { display: flex; background-color: #f8f9fa; height: 100vh; overflow: hidden; }
        .sidebar { width: 240px; background-color: #212529; color: #adb5bd; display: flex; flex-direction: column; }
        .sidebar-brand { padding: 25px 20px; font-size: 18px; font-weight: bold; color: white; border-bottom: 1px solid #343a40; }
        .sidebar-menu { list-style: none; padding: 20px 0; }
        .sidebar-menu li a { display: block; padding: 12px 20px; color: #adb5bd; text-decoration: none; font-size: 14px; }
        .sidebar-menu li.active a { background-color: #0d6efd; color: white; border-radius: 4px; margin: 0 10px; }
        .main-content { flex: 1; padding: 30px; overflow-y: auto; }
        .header-content { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .header-content h2 { font-size: 22px; color: #212529; font-weight: 600; }
        .btn-new-checkin { background-color: #0d6efd; color: white; border: none; padding: 10px 20px; border-radius: 6px; font-size: 14px; cursor: pointer; text-decoration: none; }
        .cards-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px; }
        .card { background-color: white; border-radius: 8px; padding: 20px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.02); border-left: 4px solid #fff; }
        .card.total { border-left-color: #0d6efd; }
        .card.available { border-left-color: #198754; }
        .card.active-res { border-left-color: #ffc107; }
        .card-info p { font-size: 13px; color: #6c757d; margin-bottom: 5px; }
        .card-info h3 { font-size: 28px; color: #212529; }
        .table-section { background-color: white; border-radius: 8px; padding: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.02); }
        .table-title { font-size: 15px; font-weight: 600; color: #212529; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; text-align: left; font-size: 14px; }
        th { background-color: #f8f9fa; color: #495057; padding: 12px; font-weight: 600; border-bottom: 1px solid #dee2e6; }
        td { padding: 15px 12px; border-bottom: 1px solid #dee2e6; color: #495057; }
        .status-badge { background-color: #198754; color: white; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">🏢 E-Hotel Mgt</div>
        <ul class="sidebar-menu">
            <li class="active"><a href="#">📊 Dashboard</a></li>
            <li><a href="/kamar" class="block p-3 rounded-lg hover:bg-slate-800 transition">🛏️ Manajemen Kamar</a></li>
            <li><a href="#">📖 Reservasi Tamu</a></li>
            <li><a href="#">👥 Pengguna</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="header-content">
            <h2>Dashboard Ringkasan Hotel</h2>
            <a href="{{ route('reservasi.index') }}" class="btn-new-checkin">+ Check-In Baru</a>
        </div>
        <div class="cards-grid">
            <div class="card total">
                <div class="card-info">
                    <p>Total Kamar</p>
                    <h3>50</h3>
                </div>
            </div>
            <div class="card available">
                <div class="card-info">
                    <p>Kamar Tersedia</p>
                    <h3>{{ $kamarTersedia }}</h3>
                </div>
            </div>
            <div class="card active-res">
                <div class="card-info">
                    <p>Reservasi Aktif</p>
                    <h3>{{ $reservasiAktif }}</h3>
                </div>
            </div>
        </div>
        
        
        <div class="table-section">
            <div class="table-title">🕒 Log Reservasi Terbaru</div>
            <table>
                <thead>
                    <tr>
                        <th>Tamu</th>
                        <th>Kamar</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservasis as $res)
                    <tr>
                        <!-- 1. DIUBAH: nama_tamu menjadi tamu -->
                        <td>{{ $res->tamu }}</td>

                        <td>{{ $res->kamar }}</td>

                        <!-- 2. DIUBAH: tanggal_checkin menjadi check_in -->
                        <td>{{ $res->check_in }}</td>

                        <!-- 3. DIUBAH: tanggal_checkout menjadi check_out -->
                        <td>{{ $res->check_out }}</td>

                        <td>Rp {{ number_format($res->total_bayar, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ $res->status == 'Lunas' ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ $res->status }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data reservasi terbaru.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>