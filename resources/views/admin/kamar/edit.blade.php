<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kamar - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5" style="max-width: 500px;">
    <div class="card border-0 shadow p-4 rounded-3">
        <h4 class="fw-bold mb-4">Ubah Data Kamar</h4>
        <form action="{{ route('admin.kamar.update', $kamar->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Nomor Kamar</label>
                <input type="text" name="nomor_kamar" class="form-control" value="{{ $kamar->nomor_kamar }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tipe Kamar</label>
                <select name="tipe_kamar" class="form-select" required>
                    <option value="standard" {{ $kamar->tipe_kamar == 'standard' ? 'selected' : '' }}>Standard</option>
                    <option value="deluxe" {{ $kamar->tipe_kamar == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                    <option value="suite" {{ $kamar->tipe_kamar == 'suite' ? 'selected' : '' }}>Suite</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Harga per Malam (IDR)</label>
                <input type="number" name="harga_per_malam" class="form-control" value="{{ $kamar->harga_per_malam }}" required>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success w-100 py-2 fw-bold">Simpan Perubahan</button>
                <a href="{{ route('admin.kamar.index') }}" class="btn btn-light w-100 py-2 border">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>