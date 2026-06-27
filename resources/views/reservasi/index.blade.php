<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Sanctuary - Five Star Horizon Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f7f9;
            color: #2D3748;
        }
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 15px 0;
        }
        .navbar-brand, .section-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }
        .navbar-brand { color: #0E7490; }
        .section-title { color: #0F766E; }
        .card-custom {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(14, 116, 144, 0.03);
        }
        .form-control, .form-select {
            background-color: #f8fafc;
            border: 1px solid #cbd5e1;
            color: #334155;
            border-radius: 8px;
            padding: 11px;
        }
        .form-control:focus, .form-select:focus {
            background-color: #ffffff;
            border-color: #0E7490;
            box-shadow: 0 0 0 0.25rem rgba(14, 116, 144, 0.15);
        }
        .btn-bali {
            background-color: #0E7490;
            color: white;
            font-weight: 600;
            border: none;
            padding: 13px;
            border-radius: 8px;
            transition: 0.3s;
        }
        .btn-bali:hover { background-color: #0F766E; color: white; }
        .table-custom th {
            background-color: #f1f5f9;
            color: #475569;
            border-bottom: 2px solid #e2e8f0;
            padding: 14px;
        }
        .table-custom td { padding: 16px; border-bottom: 1px solid #f1f5f9; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg mb-5 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="bi bi-water"></i> Five Star Horizon Hotel</a>
            <div>
                <a href="/kamar" class="btn btn-outline-secondary btn-sm me-2">Manajemen Kamar</a>
                <a href="/" class="text-secondary text-decoration-none small"><i class="bi bi-house"></i> Beranda</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card-custom">
                    <h5 class="section-title mb-4"><i class="bi bi-passport-fill"></i> Guest Check-In Form</h5>
                    
                    @if(session('success'))
                        <div class="alert alert-success border-0 bg-light text-success shadow-sm" role="alert">
                            <i class="bi bi-check-all"></i> {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger border-0 bg-light text-danger shadow-sm" role="alert">
                            <i class="bi bi-exclamation-triangle-fill"></i> {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('reservasi.store') }}" method="POST">
                        @csrf  {{-- WAJIB: token keamanan Laravel --}}

                        <div class="form-group mb-3">
                            <label class="fw-bold small mb-1">NAMA TAMU</label>
                            <input type="text" name="nama_tamu" class="form-control" placeholder="Masukkan nama lengkap Anda" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold small mb-1">EMAIL TAMU</label>
                            <input type="email" name="email_tamu" class="form-control" placeholder="Masukkan email aktif Anda" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold small mb-1">PILIHAN VILLA / KAMAR</label>
                            <select name="kamar_id" class="form-control" required>
                                <option value="">Pilih jenis kamar...</option>
                                <option value="1">Standard Room</option>
                                <option value="2">Deluxe Room</option>
                                <option value="3">Executive Suite</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold small mb-1">TANGGAL CHECK IN</label>
                            <input type="date" name="tanggal_checkin" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold small mb-1">TANGGAL CHECK OUT</label>
                            <input type="date" name="tanggal_checkout" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-dark w-100 mt-3">PESAN SEKARANG</button>
                    </form>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card-custom">
                    <h5 class="section-title mb-4"><i class="bi bi-bookmarks-fill"></i> Current Guest Ledger</h5>
                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>Data Tamu</th>
                                    <th>Alokasi Kamar</th>
                                    <th>Durasi Menginap</th>
                                    <th>Total Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reservasis as $res)
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-dark">{{ $res->nama_tamu }}</div>
                                            <small class="text-muted">{{ $res->email_tamu }}</small>
                                        </td>
                                        <td><span class="badge bg-light text-dark border">Room {{ $res->kamar->nomor_kamar ?? '-' }}</span></td>
                                        <td><small class="text-secondary">{{ $res->tanggal_checkin }} - {{ $res->tanggal_checkout }}</small></td>
                                        <td class="fw-bold text-info">Rp {{ number_format($res->total_bayar, 0, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="text-center text-muted py-5">Belum ada tamu yang check-in hari ini.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>