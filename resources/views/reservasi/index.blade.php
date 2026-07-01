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

               <form action="{{ route('booking.store') }}" method="POST">
    @csrf
   <input type="text" name="nama_tamu" class="form-control" placeholder="Masukkan nama lengkap Anda" required>
                    <!-- NAMA TAMU -->
                    <div class="mb-3">
                          </div>
                    <div class="mb-3">
        <label for="email_tamu" class="form-label">Email Tamu</label>
        <input type="email" class="form-control" id="email_tamu" name="email_tamu" placeholder="Masukkan email aktif Anda" required>
    </div>

    <!-- PILIHAN TIPE KAMAR -->
<div class="mb-3">
    <label for="pilihan_kamar" class="form-label">
        Pilihan Tipe Kamar
    </label>

    <select name="pilihan_kamar" class="form-select" required>
    <option value=""> Pilih Tipe Kamar </option>
    <option value="standard">Standard Room</option>
    <option value="deluxe">Deluxe Room</option>
    <option value="executive">Executive Suite</option>
</select>
</div>

<!-- NOMOR KAMAR -->

<!-- TANGGAL CHECK IN & CHECK OUT -->
<div class="row g-3 mb-4">

    <div class="col-md-6">

        <label for="check_in" class="form-label">
            Tanggal Check In
        </label>

        <input
            type="date"
            class="form-control"
            id="check_in"
            name="check_in"
            required>

    </div>

    <div class="col-md-6">

        <label for="check_out" class="form-label">
            Tanggal Check Out
        </label>

        <input
            type="date"
            class="form-control"
            id="check_out"
            name="check_out"
            required>

    </div>

</div>

<style>
.btn-custom{
    width:100%;
    padding:15px;
    border-radius:50px;
    font-weight:700;
    text-transform:uppercase;
    letter-spacing:1px;
    transition:.3s;
    display:block;
    text-align:center;
    font-size:15px;
}

/* Tombol Pesan */
.btn-pesan{
    background:linear-gradient(135deg,#0f766e,#0e7490);
    color:#fff;
    border:none;
    box-shadow:0 4px 15px rgba(14,116,144,.25);
}

.btn-pesan:hover{
    background:linear-gradient(135deg,#0c6a64,#0b647d);
    color:#fff;
    transform:translateY(-2px);
}

/* Tombol Batal */
.btn-batal{
    background:#ffffff;
    color:#475569;
    border:1.5px solid #d1d5db;
    box-shadow:0 4px 12px rgba(0,0,0,.05);
}

.btn-batal:hover{
    background:#f8fafc;
    color:#1e293b;
    border-color:#94a3b8;
    transform:translateY(-2px);
}
</style>
<div class="mt-4">

    <button type="submit" class="btn-custom btn-pesan">
        Pesan Sekarang
    </button>

    <a href="/" class="btn-custom btn-batal text-decoration-none">
        Batal
    </a>

</div>

</form>

</div>

</div>

</div>


</body>
</html>