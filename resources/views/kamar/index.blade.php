<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kamar - E-Hotel Mgt</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { display: flex; background-color: #f8f9fa; height: 100vh; overflow: hidden; }
        
        /* Sidebar - Sama Persis dengan Dashboard Utama Kamu */
        .sidebar { width: 240px; background-color: #212529; color: #adb5bd; display: flex; flex-direction: column; }
        .sidebar-brand { padding: 25px 20px; font-size: 18px; font-weight: bold; color: white; border-bottom: 1px solid #343a40; }
        .sidebar-menu { list-style: none; padding: 20px 0; }
        .sidebar-menu li a { display: block; padding: 12px 20px; color: #adb5bd; text-decoration: none; font-size: 14px; }
        .sidebar-menu li.active a { background-color: #0d6efd; color: white; border-radius: 4px; margin: 0 10px; }
        
        /* Bagian Konten Tengah */
        .main-content { flex: 1; padding: 30px; overflow-y: auto; }
        .header-content { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .header-content h2 { font-size: 22px; color: #212529; font-weight: 600; }
        
        /* Tombol Tambah Kamar Baru */
        .btn-add-kamar { background-color: #0d6efd; color: white; border: none; padding: 10px 20px; border-radius: 6px; font-size: 14px; cursor: pointer; text-decoration: none; font-weight: 500; }
        .btn-add-kamar:hover { background-color: #0b5ed7; }
        
        /* Desain Tabel Data Kamar */
        .table-section { background-color: white; border-radius: 8px; padding: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.02); }
        table { width: 100%; border-collapse: collapse; text-align: left; font-size: 14px; }
        th { background-color: #f8f9fa; color: #495057; padding: 12px; font-weight: 600; border-bottom: 1px solid #dee2e6; }
        td { padding: 15px 12px; border-bottom: 1px solid #dee2e6; color: #495057; }
        
        /* Status Kamar */
        .status-badge { padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: bold; color: white; }
        .status-badge.kosong { background-color: #198754; }
        .status-badge.terisi { background-color: #dc3545; }

        /* Tombol Aksi CRUD */
        .btn-aksi { text-decoration: none; font-weight: 600; font-size: 13px; margin-right: 10px; }
        .btn-edit { color: #ffc107; }
        .btn-hapus { color: #dc3545; background: none; border: none; cursor: pointer; font-weight: 600; font-size: 13px; padding: 0; }
    </style>
</head>
<body>

    <!-- SIDEBAR (Menu Tetap Stay Menemani) -->
    <div class="sidebar">
        <div class="sidebar-brand">🏢 E-Hotel Mgt</div>
        <ul class="sidebar-menu">
            <li><a href="/dashboard">📊 Dashboard</a></li>
            <!-- Menu Manajemen Kamar Aktif (Berwarna Biru) -->
            <li class="active"><a href="/kamar">🛏️ Manajemen Kamar</a></li>
            <li><a href="/admin/reservasi">📖 Reservasi Tamu</a></li>
            <li><a href="#">👥 Pengguna</a></li>
        </ul>
    </div>

    <!-- KONTEN UTAMA MANAJEMEN KAMAR (Muncul di Sebelah Kanan Sidebar) -->
    <div class="main-content">
        <div class="header-content">
            <h2>Manajemen Data Kamar</h2>
            <!-- Klik tombol ini akan membuka form buat tambah kamar baru -->
            <a href="{{ route('kamar.create') }}" class="btn-add-kamar">+ Tambah Kamar Baru</a>
        </div>

        <div class="table-section">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Kamar</th>
                        <th>Tipe Kamar</th>
                        <th>Harga Per Malam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kamars as $index => $kamar)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><strong>{{ $kamar->nomor_kamar }}</strong></td>
                        <td>{{ $kamar->tipe_kamar }}</td>
                        <td>Rp {{ number_format($kamar->harga_per_malam, 0, ',', '.') }}</td>
                        <td>
                            @if($kamar->status == 'Terisi')
                                <span class="status-badge terisi">🔴 Terisi</span>
                            @else
                                <span class="status-badge kosong">🟢 Kosong</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('kamar.edit', $kamar->id) }}" class="btn-aksi btn-edit">Edit</a>
                            <form action="{{ route('kamar.destroy', $kamar->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus kamar ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: #6c757d; font-style: italic; padding: 30px;">
                            🛏 Rose! Belum ada data kamar ditemukan. Silakan klik "+ Tambah Kamar Baru" untuk mengisi.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>