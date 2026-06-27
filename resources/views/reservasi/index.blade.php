<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Sanctuary - Five Star Horizon Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f7f9;
            color: #2D3748;
        }
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 20px 0;
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: #0E7490;
            font-size: 1.5rem;
        }
        /* Card Layout Split Terinspirasi dari image_996ca9.jpg */
        .reservation-container {
            max-width: 1050px;
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            margin-top: 40px;
            margin-bottom: 60px;
        }
        .banner-side {
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.4)), 
                        url('https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=800&q=80');
            background-size: cover;
            background-position: center;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            color: #ffffff;
            min-height: 550px;
        }
        .banner-side h2 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2.5rem;
            margin-top: 10px;
        }
        /* Style Form & Input Diadopsi dari image_996c29.png */
        .form-side {
            padding: 45px 50px;
        }
        .form-side h3 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: #0F766E;
            margin-bottom: 5px;
        }
        .form-label {
            font-size: 0.8rem;
            font-weight: 700;
            color: #334155;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            text-transform: uppercase; /* Membuat teks label kapital tegas */
        }
        .form-control, .form-select {
            background-color: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 0.95rem;
            color: #334155;
            transition: all 0.2s ease;
        }
        .form-control:focus, .form-select:focus {
            background-color: #ffffff;
            border-color: #0E7490;
            box-shadow: 0 0 0 3px rgba(14, 116, 144, 0.15);
        }
        /* Desain Tombol Hitam Tegas di image_996c29.png */
        .btn-submit {
            background-color: #1E293B;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 14px;
            border-radius: 8px;
            border: none;
            width: 100%;
            transition: background-color 0.2s;
            margin-top: 15px;
        }
        .btn-submit:hover {
            background-color: #0F172A;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <!-- NAVBAR ATAS -->
    <nav class="navbar shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">Five Star Horizon Hotel</a>
            <a href="/" class="text-secondary text-decoration-none small"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
        </div>
    </nav>

    <!-- CONTAINER RESERVASI UTAMA -->
    <div class="container d-flex justify-content-center">
        <div class="reservation-container row g-0 w-100">
            
            <!-- SISI KIRI: BANNER VISUAL (Sesuai image_996ca9.jpg) -->
            <div class="col-lg-5 banner-side">
                <span class="text-warning small fw-bold text-uppercase" style="letter-spacing: 2px;">Exclusive Stay</span>
                <h2>Tropical Paradise</h2>
                <p class="small text-white-50 mt-2" style="max-width: 320px; line-height: 1.6;">
                    Satu langkah lagi untuk menikmati kemewahan menginap terbaik dengan pemandangan langsung ke pantai tropis Bali.
                </p>
                <div class="mt-auto pt-4 border-top border-secondary small text-white-50">
                    <i class="bi bi-geo-alt-fill text-danger"></i> Badung, Bali, Indonesia
                </div>
            </div>

            <!-- SISI KANAN: FORM INPUT DATA (Struktur Terbuka & Tegas Sesuai image_996c29.png) -->
            <div class="col-lg-7 form-side d-flex flex-column justify-content-center">
                <div class="mb-4">
                    <h3>Form Reservasi Hotel</h3>
                    <p class="text-muted small">Silakan isi detail data masa inap Anda dengan benar.</p>
                </div>

                <form action="#" method="POST">
                    <!-- NAMA TAMU -->
                    <div class="mb-3">
                        <label for="nama_tamu" class="form-label">Nama Tamu</label>
                        <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" placeholder="Masukkan nama lengkap Anda" required>
                    </div>
                    <div class="mb-3">
        <label for="email_tamu" class="form-label">Email Tamu</label>
        <input type="email" class="form-control" id="email_tamu" name="email_tamu" placeholder="Masukkan email aktif Anda" required>
    </div>

                  <!-- NAVIGASI UTAMA KONSISTEN -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/" style="font-family: 'Playfair Display', serif; color: #0E7490;"><i class="bi bi-water"></i> Five Star Horizon Hotel</a>
            
            <!-- Menu Tengah yang Tetap Aktif -->
            <div class="mx-auto">
                <ul class="navbar-nav d-flex flex-row gap-4">
                    <li class="nav-item"><a class="nav-link text-secondary fw-medium" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('villas.index') }}" style="color: #0E7490; border-bottom: 2px solid #0E7490;">Villas</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary fw-medium" href="{{ route('beachclub.index') }}">Beach Club</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary fw-medium" href="{{ route('wellness.index') }}">Wellness</a></li>
                </ul>
            </div>

            <div>
                <a href="/reservasi" class="btn btn-sm btn-dark px-3 rounded-pill">Book A Stay</a>
            </div>
        </div>
    </nav>

                    <!-- BARIS CHECK IN & CHECK OUT (Sejajar horizontal) -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="check_in" class="form-label">Tanggal Check In</label>
                            <input type="date" class="form-control" id="check_in" name="check_in" required>
                        </div>
                        <div class="col-md-6">
                            <label for="check_out" class="form-label">Tanggal Check Out</label>
                            <input type="date" class="form-control" id="check_out" name="check_out" required>
                        </div>
                    </div>

                    <!-- TOMBOL SUBMIT HITAM TEGAS -->
                    <button type="submit" class="btn-submit shadow-sm">Pesan Sekarang</button>
                </form>
            </div>

        </div>
    </div>

</body>
</html>