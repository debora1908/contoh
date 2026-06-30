<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Tamu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body { background: #f5f7fb; font-family: 'Segoe UI', sans-serif; }
        
        /* Sidebar */
        .sidebar { position: fixed; top: 0; left: 0; width: 250px; height: 100vh; background: #1f2937; padding: 25px 20px; color: white; }
        .logo { font-size: 26px; font-weight: bold; margin-bottom: 20px; }
        .sidebar hr { border-color: #374151; }
        .menu { list-style: none; padding: 0; }
        .menu li { margin-bottom: 15px; }
        .menu a { display: flex; align-items: center; gap: 12px; color: #cbd5e1; text-decoration: none; padding: 12px 16px; border-radius: 10px; }
        .menu a:hover, .menu a.active { background: #2563eb; color: white; }
        
        .main { margin-left: 250px; padding: 30px; }
        .card-stat { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,.08); }
        .table { background: white; }
        .badge { font-size: 13px; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="logo">🏨 E-Hotel Mgt</div>
        <hr>
        <ul class="menu">
            <li><a href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li><a href="{{ route('admin.manajemen.index') }}"><i class="bi bi-door-open-fill"></i> Manajemen Kamar</a></li>
            <li><a class="active" href="{{ route('admin.reservasi.index') }}"><i class="bi bi-journal-bookmark-fill"></i> Reservasi Tamu</a></li>
            <li><a href="/logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
        </ul>
    </div>

    <div class="main">
        <h2 class="fw-bold mb-4">Reservasi Tamu</h2>

        <div class="row mb-4">
            <div class="col-md-3"><div class="card card-stat"><div class="card-body"><h6>Total Reservasi</h6><h2>{{ $totalReservasi }}</h2></div></div></div>
            <div class="col-md-3"><div class="card card-stat"><div class="card-body"><h6>Pending</h6><h2 class="text-warning">{{ $pending }}</h2></div></div></div>
            <div class="col-md-3"><div class="card card-stat"><div class="card-body"><h6>Lunas</h6><h2 class="text-success">{{ $lunas }}</h2></div></div></div>
            <div class="col-md-3"><div class="card card-stat"><div class="card-body"><h6>Check In Hari Ini</h6><h2 class="text-primary">{{ $checkInHariIni }}</h2></div></div></div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4"><input type="text" class="form-control" placeholder="Cari nama tamu..." name="search"></div>
                    <form action="{{ route('admin.reservasi.index') }}" method="GET">

    <div class="row mb-3">

        <div class="col-md-4">
            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Cari nama tamu atau email..."
                   value="{{ request('search') }}">
        </div>

        <div class="col-md-3">
            <select name="status" class="form-select">

                <option value="">Semua Status</option>

                <option value="Pending"
                    {{ request('status')=='Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="Lunas"
                    {{ request('status')=='Lunas' ? 'selected' : '' }}>
                    Lunas
                </option>

            </select>
        </div>

        <div class="col-md-3">
            <select name="tipe" class="form-select">

                <option value="">Semua Kamar</option>

                <option value="standard"
                    {{ request('tipe')=='standard' ? 'selected' : '' }}>
                    Standard
                </option>

                <option value="deluxe"
                    {{ request('tipe')=='deluxe' ? 'selected' : '' }}>
                    Deluxe
                </option>

                <option value="suite"
                    {{ request('tipe')=='suite' ? 'selected' : '' }}>
                    Suite
                </option>

            </select>
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">
                Cari
            </button>
        </div>

    </div>

</form>
                    <div class="col-md-3">
                        <select class="form-select" name="tipe">
                            <option value="">Semua Kamar</option>
                            <option value="standard">Standard</option>
                            <option value="deluxe">Deluxe</option>
                            <option value="suite">Suite</option>
                        </select>
                    </div>
                    <div class="col-md-2"><button class="btn btn-primary w-100">Cari</button></div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Tamu</th>
                                <th>Email</th>
                                <th>Tipe Kamar</th>
                                <th>No Kamar</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Pembayaran</th>
                                <th>Status Menginap</th>
                                <th width="280">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>{{ $booking->nama_tamu }}</strong></td>
                                <td>{{ $booking->email_tamu }}</td>
                                <td><span class="badge bg-info">{{ ucfirst($booking->pilihan_kamar) }}</span></td>
                                <td>{{ $booking->nomor_kamar }}</td>
                                <td>{{ $booking->check_in }}</td>
                                <td>{{ $booking->check_out }}</td>
                                <td>
                                    <span class="badge {{ $booking->status_bayar == 'Pending' ? 'bg-warning' : 'bg-success' }}">
                                        {{ $booking->status_bayar }}
                                    </span>
                                </td>
                                <td>
                                    @if($booking->status_menginap == "Check In") <span class="badge bg-primary">Check In</span>
                                    @elseif($booking->status_menginap == "Check Out") <span class="badge bg-secondary">Check Out</span>
                                    @else <span class="badge bg-danger">Belum Check In</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.reservasi.detail', $booking->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $booking->id }}"><i class="bi bi-pencil-square"></i></button>
                                    <form action="{{ route('admin.reservasi.destroy', $booking->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash"></i></button>
                                    </form>
                                    @if($booking->status_menginap != "Check In")
                                        <form action="{{ route('admin.reservasi.checkin', $booking->id) }}" method="POST" class="d-inline">
                                            @csrf @method('PUT')
                                            <button class="btn btn-success btn-sm"><i class="bi bi-box-arrow-in-right"></i> Check In</button>
                                        </form>
                                    @endif
                                    @if($booking->status_menginap == "Check In")
                                        <form action="{{ route('admin.reservasi.checkout', $booking->id) }}" method="POST" class="d-inline">
                                            @csrf @method('PUT')
                                            <button class="btn btn-dark btn-sm"><i class="bi bi-box-arrow-right"></i> Check Out</button>
                                        </form>
                                    @endif
                                    <a href="{{ route('admin.reservasi.cetak', $booking->id) }}" target="_blank" class="btn btn-secondary btn-sm"><i class="bi bi-printer"></i> Cetak</a>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="10" class="text-center">Belum ada data reservasi.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">{{ $bookings->links() }}</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>