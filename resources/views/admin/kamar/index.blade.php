<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suites Management - Five Star Horizon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        .brand-title { color: #0f766e; font-weight: 700; }
        .card-custom { border: none; border-radius: 1rem; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }
        .btn-teal { background-color: #0f766e; color: white; font-weight: 600; }
        .btn-teal:hover { background-color: #115e59; color: white; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-3 mb-5">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="#">
            <span class="brand-title">🌊 Five Star Horizon</span>
        </a>
        <div class="ms-auto d-flex gap-3">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-link text-decoration-none text-muted"><i class="bi bi-journal-text text-primary"></i> Menu Reservasi</a>
            <a href="/" class="btn btn-link text-decoration-none text-muted">← Kembali</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row g-4">
        
        <div class="col-md-4">
            <div class="card card-custom p-4 bg-white">
                <h5 class="fw-bold mb-4" style="color: #0f766e;"><i class="bi bi-plus-circle-fill"></i> Add Luxury Suite</h5>
                
                @if(session('success'))
                    <div class="alert alert-success border-0 small py-2">{{ session('success') }}</div>
                @endif

                <form action="{{ route('admin.kamar.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">NOMOR KAMAR / VILLA</label>
                        <input type="text" name="nomor_kamar" class="form-control bg-light py-2" placeholder="Contoh: 301" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-bold">TIPE SUITE</label>
                        <select name="tipe_kamar" class="form-select bg-light py-2" required>
                            <option value="standard">Ocean Standard</option>
                            <option value="deluxe">Luxury Deluxe</option>
                            <option value="suite">Executive Suite</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-muted small fw-bold">HARGA PER MALAM (IDR)</label>
                        <input type="number" name="harga_per_malam" class="form-control bg-light py-2" placeholder="Rp" required>
                    </div>
                    <button type="submit" class="btn btn-teal w-100 py-2">Publish Room</button>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card card-custom p-4 bg-white">
                <h5 class="fw-bold mb-4" style="color: #0f766e;"><i class="bi bi-grid-3x3-gap-fill"></i> Resort Directory Logs</h5>
                
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light text-muted small">
                            <tr>
                                <th>No. Kamar</th>
                                <th>Tipe Kamar</th>
                                <th>Harga / Malam</th>
                                <th>Status Kamar</th>
                                <th class="text-center">Aksi</th> </tr>
                        </thead>
                        <tbody>
                            @forelse($kamars as $kamar)
                            <tr>
                                <td class="fw-bold fs-5 text-dark">{{ $kamar->nomor_kamar }}</td>
                                <td class="text-muted text-capitalize">{{ $kamar->tipe_kamar }}</td>
                                <td class="text-info fw-bold">Rp {{ number_format($kamar->harga_per_malam, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2 py-1">
                                        {{ $kamar->status ?? 'Tersedia' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('admin.kamar.edit', $kamar->id) }}" class="btn btn-sm btn-warning text-white btn-action">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.kamar.destroy', $kamar->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus Kamar {{ $kamar->nomor_kamar }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-action">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Belum ada data kamar tersedia.</td>
                            </tr>
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