<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Reservasi - Marius Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; color: #333; }
        .navbar-custom { background-color: #2a3135; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .btn-gold { background-color: #dcb373; color: #fff; font-weight: 600; }
        .btn-gold:hover { background-color: #c9a162; color: #fff; }
    </style>
</head>
<body>

    <!-- Navbar Minimalis -->
    <nav class="navbar navbar-dark navbar-custom py-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/"><i class="bi bi-arrow-left-circle-fill"></i> MARIUS HOTEL</a>
            <span class="navbar-text text-white-50">Sistem Informasi Manajemen Reservasi</span>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row">
            <!-- Form Input Reservasi Baru -->
            <div class="col-lg-4 mb-4">
                <div class="card p-4">
                    <h5 class="fw-bold mb-4 text-dark"><i class="bi bi-calendar-check text-warning"></i> Check-In Tamu</h5>
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('reservasi.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap Tamu</label>
                            <input type="text" name="nama_tamu" class="form-control" placeholder="Nama Tamu" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Tamu</label>
                            <input type="email" name="email_tamu" class="form-control" placeholder="tamu@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pilih Kamar (Tersedia)</label>
                            <select name="kamar_id" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Kamar --</option>
                                @foreach($kamars as $kamar)
                                    <option value="{{ $kamar->id }}">Kamar {{ $kamar->nomor_kamar }} ({{ $kamar->tipe_kamar }} - Rp {{ number_format($kamar->harga_per_malam, 0, ',', '.') }}/malam)</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Check-In</label>
                            <input type="date" name="tanggal_checkin" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Check-Out</label>
                            <input type="date" name="tanggal_checkout" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-gold w-100 py-2"><i class="bi bi-bookmark-plus"></i> Konfirmasi Booking</button>
                    </form>
                </div>
            </div>

            <!-- Tabel Data Reservasi Aktif -->
            <div class="col-lg-8">
                <div class="card p-4">
                    <h5 class="fw-bold mb-4 text-dark"><i class="bi bi-journal-text text-primary"></i> Daftar Reservasi Kamar</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Tamu</th>
                                    <th>Kamar</th>
                                    <th>Check In / Out</th>
                                    <th>Total Tagihan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reservasis as $res)
                                    <tr>
                                        <td>
                                            <div class="fw-bold">{{ $res->nama_tamu }}</div>
                                            <small class="text-muted">{{ $res->email_tamu }}</small>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">No. {{ $res->kamar->nomor_kamar }}</span>
                                            <div class="small">{{ $res->kamar->tipe_kamar }}</div>
                                        </td>
                                        <td>
                                            <small class="d-block"><b>In:</b> {{ $res->tanggal_checkin }}</small>
                                            <small class="d-block"><b>Out:</b> {{ $res->tanggal_checkout }}</small>
                                        </td>
                                        <td class="fw-bold text-success">Rp {{ number_format($res->total_bayar, 0, ',', '.') }}</td>
                                        <td>
                                            <span class="badge bg-warning text-dark">{{ $res->status_pembayaran }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">Belum ada reservasi kamar saat ini.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>