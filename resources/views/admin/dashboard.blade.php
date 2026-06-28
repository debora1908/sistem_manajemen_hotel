<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Ringkasan Hotel - E-Hotel Mgt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }
        /* Sidebar Styling */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #1e293b; /* Warna gelap sidebar */
            color: #cbd5e1;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #94a3b8;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
        }
        .sidebar .nav-link:hover {
            background-color: #334155;
            color: white;
        }
        .sidebar .nav-link.active {
            background-color: #2563eb; /* Warna biru menu aktif */
            color: white;
            border-radius: 4px;
            margin: 0 10px;
        }
        /* Main Content Styling */
        .main-content {
            margin-left: 260px;
            padding: 40px;
        }
        .card-custom {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02), 0 2px 4px -1px rgba(0,0,0,0.02);
            background: white;
        }
        .stat-card {
            border-left: 4px solid;
        }
        .stat-blue { border-left-color: #2563eb; }
        .stat-green { border-left-color: #16a34a; }
        .stat-yellow { border-left-color: #eab308; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="px-4 mb-4 d-flex align-items-center gap-2">
            <h4 class="text-white fw-bold m-0"><i class="bi bi-building"></i> E-Hotel Mgt</h4>
        </div>
        
        <div class="d-flex flex-column gap-1">
            <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
            <a href="{{ route('admin.kamar.index') }}" class="nav-link">
                <i class="bi bi-door-open"></i> Manajemen Kamar
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-journal-text"></i> Reservasi Tamu
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-people"></i> Pengguna
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h3 class="fw-bold text-dark m-0">Dashboard Ringkasan Hotel</h3>
            <button class="btn btn-primary fw-bold px-3 py-2" style="border-radius: 6px;">
                + Check-In Baru
            </button>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card card-custom stat-card stat-blue p-4">
                    <p class="text-muted small fw-bold mb-1">Total Kamar</p>
                    <h1 class="fw-bold m-0 text-dark">50</h1>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom stat-card stat-green p-4">
                    <p class="text-muted small fw-bold mb-1">Kamar Tersedia</p>
                    <h1 class="fw-bold m-0 text-dark">35</h1>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom stat-card stat-yellow p-4">
                    <p class="text-muted small fw-bold mb-1">Reservasi Aktif</p>
                    <h1 class="fw-bold m-0 text-dark">15</h1>
                </div>
            </div>
        </div>

   <div class="card card-custom p-4">
    <div class="d-flex align-items-center gap-2 mb-4">
        <h5 class="fw-bold text-dark m-0"><i class="bi bi-clock-history"></i> Log Reservasi Terbaru</h5>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light text-muted small">
                <tr>
                    <th class="py-3">Tamu</th>
                    <th class="py-3">Kamar</th>
                    <th class="py-3">Check In</th>
                    <th class="py-3">Check Out</th>
                    <th class="py-3">Total Bayar</th>
                    <th class="py-3">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6" class="text-center text-muted py-5">
                        <i class="bi bi-inbox fs-2 d-block mb-2 text-secondary"></i>
                        Belum ada log data reservasi tamu saat ini.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>