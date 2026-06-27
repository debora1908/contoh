<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suites Management - Five Star Horizon Hotel</title>
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
        .form-label { font-size: 12px; letter-spacing: 0.5px; color: #718096; }
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
            font-size: 13px;
        }
        .table-custom td { padding: 16px; border-bottom: 1px solid #f1f5f9; }
        .badge-available { background-color: #ccfbf1; color: #0f766e; border: 1px solid #99f6e4; }
        .badge-occupied { background-color: #fee2e2; color: #b91c1c; border: 1px solid #fca5a5; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg mb-5 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="bi bi-water"></i> Five Star Horizon </a>
            <div>
                <a href="/reservasi" class="btn btn-outline-cyan btn-sm me-3 text-info"><i class="bi bi-calendar2-check"></i> Menu Reservasi</a>
                <a href="/" class="text-secondary text-decoration-none small"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card-custom">
                    <h5 class="section-title mb-4"><i class="bi bi-plus-circle-fill"></i> Add Luxury Suite</h5>
                    <form action="{{ route('kamar.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold uppercase">NOMOR KAMAR / VILLA</label>
                            <input type="text" name="nomor_kamar" class="form-control" placeholder="Contoh: 301" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">TIPE SUITE</label>
                            <select name="tipe_kamar" class="form-select" required>
                                <option value="Standard">Ocean Standard</option>
                                <option value="Deluxe">Beachfront Deluxe</option>
                                <option value="Suite">Private Pool Suite</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">HARGA PER MALAM (IDR)</label>
                            <input type="number" name="harga_per_malam" class="form-control" placeholder="Rp" required>
                        </div>
                        <button type="submit" class="btn btn-bali w-100 shadow-sm mt-2">Publish Room</button>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card-custom">
                    <h5 class="section-title mb-4"><i class="bi bi-grid-3x3-gap-fill"></i> Resort Directory Logs</h5>
                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>No. Kamar</th>
                                    <th>Tipe Kamar</th>
                                    <th>Harga / Malam</th>
                                    <th>Status Kamar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($kamars as $kamar)
                                    <tr>
                                        <td class="fw-bold text-dark fs-5">{{ $kamar->nomor_kamar }}</td>
                                        <td class="text-secondary fw-medium">{{ $kamar->tipe_kamar }}</td>
                                        <td class="fw-bold text-info">Rp {{ number_format($kamar->harga_per_malam, 0, ',', '.') }}</td>
                                        <td>
                                            <span class="badge {{ $kamar->status == 'Tersedia' ? 'badge-available' : 'badge-occupied' }}">
                                                {{ $kamar->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="text-center text-muted py-5">No rooms registered in the sanctuary database.</td></tr>
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