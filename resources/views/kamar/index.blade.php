<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kamar - Sistem Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f6f9; }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .btn-custom { border-radius: 10px; padding: 10px 20px; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card p-4">
                <h5 class="card-title mb-4 fw-bold text-primary"><i class="bi bi-plus-circle-fill"></i> Tambah Kamar</h5>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('kamar.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label font-semibold">Nomor Kamar</label>
                        <input type="text" name="nomor_kamar" class="form-control @error('nomor_kamar') is-invalid @enderror" placeholder="Contoh: 101" required>
                        @error('nomor_kamar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipe Kamar</label>
                        <select name="tipe_kamar" class="form-select" required>
                            <option value="Standard">Standard Room</option>
                            <option value="Deluxe">Deluxe Room</option>
                            <option value="Suite">Suite Room</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga Per Malam (Rp)</label>
                        <input type="number" name="harga_per_malam" class="form-control" placeholder="Contoh: 500000" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-custom w-full font-bold shadow-sm"><i class="bi bi-save"></i> Simpan Kamar</button>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card p-4">
                <h5 class="card-title mb-4 fw-bold text-gray-800"><i class="bi bi-door-open-fill text-warning"></i> Daftar Kamar Hotel</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No. Kamar</th>
                                <th>Tipe</th>
                                <th>Harga / Malam</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kamars as $kamar)
                                <tr>
                                    <td class="fw-bold">{{ $kamar->nomor_kamar }}</td>
                                    <td>{{ $kamar->tipe_kamar }}</td>
                                    <td>Rp {{ number_format($kamar->harga_per_malam, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge bg-success">Tersedia</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Belum ada data kamar. Silakan tambah data di form sebelah kiri.</td>
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