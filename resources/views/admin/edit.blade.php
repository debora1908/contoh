<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi Tamu - Horizon HMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: #1e293b;
        }
        .navbar-admin {
            background-color: #0f172a;
            padding: 15px 0;
            border-bottom: 3px solid #0e7490;
        }
        .navbar-admin .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: #38bdf8;
            font-size: 1.4rem;
        }
        .form-card {
            background: #ffffff;
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
        }
    </style>
</head>
<body>

    <!-- NAVBAR UTAMA -->
    <nav class="navbar-admin shadow-sm mb-5">
        <div class="container">
            <a class="navbar-brand text-decoration-none" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-building-gear me-2"></i> Horizon Property Management System
            </a>
        </div>
    </nav>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <!-- TOMBOL KEMBALI -->
                <div class="mb-3">
                    <a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-muted small fw-bold">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Dashboard
                    </a>
                </div>

                <!-- KARTU FORM EDIT -->
                <div class="card form-card p-4 p-md-5">
                    <div class="mb-4">
                        <h3 class="fw-bold" style="font-family: 'Playfair Display', serif;">Edit Transaksi Tamu</h3>
                        <p class="text-muted small">Perbarui data operasional dan status pembayaran log reservasi hotel.</p>
                        <hr>
                    </div>

                    <!-- ERROR HANDLING (JIKA VALIDASI GAGAL) -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- FORM UTAMA -->
                    <!-- KATEGORI HURUF BESAR: MENGGUNAKAN METHOD PUT UNTUK PROSES UPDATE -->
                    <form action="{{ route('booking.update', $booking->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <!-- NAMA TAMU -->
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary">Nama Lengkap Tamu</label>
                                <input type="text" name="nama_tamu" class="form-control" value="{{ old('nama_tamu', $booking->nama_tamu) }}" required>
                            </div>

                            <!-- EMAIL TAMU -->
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary">Alamat Email</label>
                                <input type="email" name="email_tamu" class="form-control" value="{{ old('email_tamu', $booking->email_tamu) }}" required>
                            </div>

                            <!-- PILIHAN TIPE KAMAR -->
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary">Tipe Kamar</label>
                                <select name="pilihan_kamar" class="form-select" required>
                                    <option value="standard" {{ old('pilihan_kamar', $booking->pilihan_kamar) == 'standard' ? 'selected' : '' }}>Standard Room</option>
                                    <option value="deluxe" {{ old('pilihan_kamar', $booking->pilihan_kamar) == 'deluxe' ? 'selected' : '' }}>Deluxe Room</option>
                                    <option value="suite" {{ old('pilihan_kamar', $booking->pilihan_kamar) == 'suite' ? 'selected' : '' }}>Executive Suite</option>
                                </select>
                            </div>

                            <!-- NOMOR KAMAR -->
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary">Nomor Kamar (Format HMS)</label>
                                <input type="text" name="nomor_kamar" class="form-control" value="{{ old('nomor_kamar', $booking->nomor_kamar) }}" placeholder="Contoh: Room #105" required>
                            </div>

                            <!-- TANGGAL CHECK IN -->
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary">Tanggal Check-In</label>
                                <input type="date" name="check_in" class="form-control" value="{{ old('check_in', $booking->check_in) }}" required>
                            </div>

                            <!-- TANGGAL CHECK OUT -->
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-secondary">Tanggal Check-Out</label>
                                <input type="date" name="check_out" class="form-control" value="{{ old('check_out', $booking->check_out) }}" required>
                            </div>

                            <!-- STATUS PEMBAYARAN -->
                            <div class="col-12">
                                <label class="form-label small fw-bold text-secondary">Status Pembayaran</label>
                                <div class="d-flex gap-3 mt-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_bayar" id="statusPending" value="Pending" {{ old('status_bayar', $booking->status_bayar) == 'Pending' ? 'checked' : '' }}>
                                        <label class="form-check-label text-warning fw-bold small" for="statusPending">
                                            <i class="bi bi-clock-history"></i> Pending
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_bayar" id="statusLunas" value="Lunas" {{ old('status_bayar', $booking->status_bayar) == 'Lunas' ? 'checked' : '' }}>
                                        <label class="form-check-label text-success fw-bold small" for="statusLunas">
                                            <i class="bi bi-check-circle-fill"></i> Lunas
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TOMBOL AKSI SIMPAN / BATAL -->
                        <div class="d-flex justify-content-end gap-2 mt-5">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-light rounded-pill px-4">Batal</a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                <i class="bi bi-save me-2"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>