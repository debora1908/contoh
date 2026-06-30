<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background: #f5f7fb; font-family: 'Segoe UI', sans-serif; }
        .sidebar { position: fixed; width: 250px; height: 100vh; background: #1f2937; color: white; padding: 25px; }
        .main { margin-left: 250px; padding: 35px; }
        .card-stat { border: none; border-radius: 18px; box-shadow: 0 5px 18px rgba(0, 0, 0, .08); }
        .menu a { color: #cbd5e1; text-decoration: none; display: flex; gap: 12px; align-items: center; padding: 14px; border-radius: 12px; }
        .menu a:hover, .menu a.active { background: #2563eb; color: white; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="fs-4 fw-bold mb-4">🏨 E-Hotel Mgt</div>
        <ul class="nav flex-column menu">
            <li><a href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li><a href="{{ route('admin.manajemen.index') }}"><i class="bi bi-door-open-fill"></i> Manajemen Kamar</a></li>
            <li><a href="{{ route('admin.reservasi.index') }}"><i class="bi bi-journal-bookmark-fill"></i> Reservasi Tamu</a></li>
            <li><a class="active" href="{{ route('admin.pengguna.index') }}"><i class="bi bi-people-fill"></i> Pengguna</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn text-white w-100 text-start ps-4"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <div class="main">
        <h2 class="fw-bold mb-4">Data Pengguna</h2>

        <div class="row mb-4">
            @foreach(['Total' => $totalPengguna, 'Admin' => $admin, 'Resepsionis' => $resepsionis, 'Housekeeping' => $housekeeping] as $label => $val)
            <div class="col-md-3">
                <div class="card card-stat p-3">
                    <h6>{{ $label }}</h6>
                    <h2 class="fw-bold">{{ $val }}</h2>
                </div>
            </div>
            @endforeach
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <form action="{{ route('admin.pengguna.index') }}" method="GET" class="d-flex w-75">
                        <input type="text" name="search" class="form-control me-2" placeholder="Cari nama, email, atau username..." value="{{ request('search') }}">
                        <button class="btn btn-primary"><i class="bi bi-search"></i> Cari</button>
                    </form>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        <i class="bi bi-plus-circle"></i> Tambah
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($penggunas as $index => $pengguna)
                            <tr>
                                <td>{{ $penggunas->firstItem() + $index }}</td>
                                <td>{{ $pengguna->nama }}</td>
                                <td>{{ $pengguna->email }}</td>
                                <td>{{ $pengguna->username }}</td>
                                <td><span class="badge bg-info">{{ $pengguna->role }}</span></td>
                                <td>
                                    <span class="badge {{ $pengguna->status == 'Aktif' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $pengguna->status }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $pengguna->id }}"><i class="bi bi-pencil"></i></button>
                                    <form action="{{ route('admin.pengguna.destroy', $pengguna->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')"><i class="bi bi-trash"></i></button>
                                    </form>
                                    <form action="{{ route('admin.pengguna.reset', $pengguna->id) }}" method="POST" class="d-inline">
                                        @csrf @method('PUT')
                                        <button class="btn btn-secondary btn-sm" title="Reset Password" onclick="return confirm('Reset password?')"><i class="bi bi-key"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="7" class="text-center">Data tidak ditemukan</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $penggunas->links() }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>