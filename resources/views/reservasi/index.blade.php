<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Kamar - Five Star Horizon Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f7f9;
            color: #2D3748;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* NAVBAR FIX: Membatasi lebar kontainer navbar agar tidak terlalu rata kanan-kiri */
        .navbar-custom {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 15px 0;
        }
        .navbar-brand-custom {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: #0E7490;
            text-decoration: none;
            font-size: 1.25rem;
        }
        .nav-link-custom {
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            transition: 0.2s;
        }
        .nav-link-custom:hover {
            color: #0E7490;
        }

        /* LAYOUT FIX: Membatasi lebar card utama agar tidak melar/lebar ke samping */
        .main-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }
        .booking-card {
            background-color: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(14, 116, 144, 0.08);
            width: 100%;
            max-width: 950px; /* Batasi lebar maksimal di sini */
            border: 1px solid #e2e8f0;
        }
        
        .img-sidebar {
            background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=800&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            min-height: 100%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: white;
        }
        .card-title-hotel {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }
        .form-section {
            padding: 45px;
        }
        .form-title {
            font-family: 'Playfair Display', serif;
            color: #0E7490;
            font-weight: 700;
        }
        .form-control, .form-select {
            background-color: #f8fafc;
            border: 1px solid #cbd5e1;
            padding: 12px;
            border-radius: 10px;
            color: #334155;
        }
        .form-control:focus, .form-select:focus {
            background-color: #ffffff;
            border-color: #0E7490;
            box-shadow: 0 0 0 0.25rem rgba(14, 116, 144, 0.15);
        }
        .btn-hotel {
            background-color: #0E7490;
            color: white;
            font-weight: 600;
            border: none;
            padding: 14px;
            border-radius: 10px;
            transition: 0.3s;
        }
        .btn-hotel:hover {
            background-color: #0F766E;
            color: white;
        }
    </style>
</head>
<body>

    <!-- NAVBAR: Menggunakan container biasa agar rata tengah dan tidak terlalu jauh ke tepi -->
    <nav class="navbar-custom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center w-100">
                <a href="{{ route('home') }}" class="navbar-brand-custom">
                    <i class="bi bi-water"></i> Five Star Horizon Hotel
                </a>
                <div>
                    <a href="{{ route('home') }}" class="nav-link-custom me-4"><i class="bi bi-house-door"></i> Beranda</a>
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">Login Admin</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA FORM RESERVASI -->
    <div class="main-container">
        <div class="booking-card">
            <div class="row g-0">
                <!-- Bagian Kiri: Gambar Banner -->
                <div class="col-md-5 d-none d-md-block">
                    <div class="img-sidebar">
                        <div>
                            <span class="badge bg-warning text-dark fw-bold mb-2 text-uppercase tracking-wider" style="font-size: 0.75rem;">Exclusive Stay</span>
                            <h2 class="card-title-hotel fs-1 mt-1">Tropical Paradise</h2>
                            <p class="small text-white-50 mt-3">Satu langkah lagi untuk menikmati kemewahan menginap terbaik dengan pemandangan langsung ke pantai tropis Bali.</p>
                        </div>
                        <div class="small"><i class="bi bi-geo-alt-fill text-warning"></i> Badung, Bali, Indonesia</div>
                    </div>
                </div>
                
                <!-- Bagian Kanan: Form Input -->
                <div class="col-md-7">
                    <div class="form-section">
                        <div class="mb-4">
                            <h2 class="form-title mb-1">Form Reservasi Hotel</h2>
                            <p class="text-muted small">Silakan isi detail data masa inap Anda dengan benar.</p>
                        </div>

                        <form action="{{ route('reservasi.store') }}" method="POST">
                            @csrf

                            <!-- Input Nama -->
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary">NAMA TAMU</label>
                                <input type="text" name="nama_tamu" class="form-control" placeholder="Masukkan nama lengkap Anda" required>
                            </div>

                            <!-- Input Email -->
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary">EMAIL TAMU</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email aktif Anda" required>
                            </div>

                            <!-- Pilihan Tipe Kamar -->
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary">PILIHAN TIPE KAMAR</label>
                                <select name="kamar_id" class="form-select" required>
                                    <option value="">Pilih tipe kamar hotel...</option>
                                    <option value="standard">Standard Room - Rp 500.000</option>
                                    <option value="deluxe">Deluxe Room - Rp 1.000.000</option>
                                    <option value="deluxe">Excecutif Room - Rp 1.500.000</option>
                                </select>
                            </div>

                            <!-- Input Tanggal (Sejajar Grid) -->
                            <div class="row g-3 mb-4">
                                <div class="col-6">
                                    <label class="form-label fw-bold small text-secondary">TANGGAL CHECK IN</label>
                                    <input type="date" name="tanggal_checkin" class="form-control" required>
                                </div>
                                <div class="col-6">
                                    <label class="form-label fw-bold small text-secondary">TANGGAL CHECK OUT</label>
                                    <input type="date" name="tanggal_checkout" class="form-control" required>
                                </div>
                            </div>

                            <!-- Tombol Pesan -->
                            <button type="submit" class="btn btn-hotel w-100 shadow-sm text-uppercase">Pesan Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>