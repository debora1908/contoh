<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservasi Tamu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
body{background:#f5f7fb;font-family:'Segoe UI',sans-serif;}
.sidebar{position:fixed;top:0;left:0;width:250px;height:100vh;background:#1f2937;padding:25px 20px;color:#fff;}
.logo{font-size:26px;font-weight:bold;margin-bottom:20px;}
.sidebar hr{border-color:#374151;}
.menu{list-style:none;padding:0;}
.menu li{margin-bottom:15px;}
.menu a{display:flex;align-items:center;gap:12px;color:#cbd5e1;text-decoration:none;padding:12px 16px;border-radius:10px;}
.menu a:hover,.menu a.active{background:#2563eb;color:#fff;}
.main{margin-left:250px;padding:30px;}
.card-stat{border:none;border-radius:15px;box-shadow:0 5px 15px rgba(0,0,0,.08);}
.badge{font-size:13px;}
</style>
</head>
<body>

<div class="sidebar">
<div class="logo">🏨 E-Hotel Mgt</div>
<hr>

<ul class="menu">
<li class="nav-item">
    <a href="{{ route('admin.dashboard') }}" class="nav-link">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.manajemen.index') }}" class="nav-link">
        <i class="bi bi-door-open"></i> Manajemen Kamar
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.reservasi.index') }}" class="nav-link">
        <i class="bi bi-journal-text"></i> Reservasi Tamu
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.pengguna.index') }}" class="nav-link">
        <i class="bi bi-people"></i> Pengguna
    </a>
</li> <li class="nav-item">
    <a href="{{ route('admin.laporan.index') }}" class="nav-link">
        <i class="bi bi-bar-chart-fill"></i> Laporan
    </a>
</li> 
<form action="{{ route('logout') }}" method="POST">
@csrf
<button type="submit" class="btn text-white w-100 text-start">
<i class="bi bi-box-arrow-right"></i> Logout
</button>
</form>
</li>
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

<form action="{{ route('admin.reservasi.index') }}" method="GET">
<div class="row g-3 align-items-end mb-4">

    <div class="col-md-3">
        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Cari nama tamu atau email..."
            value="{{ request('search') }}">
    </div>

    <div class="col-md-3">
        <select name="status" class="form-select">
            <option value="">Semua Status</option>
            <option value="Pending" {{ request('status')=='Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Lunas" {{ request('status')=='Lunas' ? 'selected' : '' }}>Lunas</option>
        </select>
    </div>

    <div class="col-md-3">
        <select name="tipe" class="form-select">
            <option value="">Semua Kamar</option>
            <option value="standard" {{ request('tipe')=='standard' ? 'selected' : '' }}>Standard</option>
            <option value="deluxe" {{ request('tipe')=='deluxe' ? 'selected' : '' }}>Deluxe</option>
            <option value="suite" {{ request('tipe')=='suite' ? 'selected' : '' }}>Suite</option>
        </select>
    </div>

    <div class="col-md-1 d-grid">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i>
        </button>
    </div>

    <div class="col-md-2 d-grid">
        <a href="{{ route('reservasi.index') }}"
           class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah
        </a>
    </div>

</div>
</form>

<div class="table-responsive">
<table class="table table-bordered table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Tamu</th>
            <th>Email</th>
            <th>Kamar</th>
            <th>No. Kamar</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

    @forelse($bookings as $booking)

    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>{{ $booking->nama_tamu }}</td>

        <td>{{ $booking->email_tamu }}</td>

        <td>{{ ucfirst($booking->pilihan_kamar) }}</td>

        <td>{{ $booking->nomor_kamar }}</td>

        <td>{{ $booking->check_in }}</td>

        <td>{{ $booking->check_out }}</td>

        <td>
            @if($booking->status_bayar=='Lunas')
                <span class="badge bg-success">Lunas</span>
            @else
                <span class="badge bg-warning text-dark">Pending</span>
            @endif
        </td>

        <td>

            <a href="{{ route('booking.edit',$booking->id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i>
            </a>

            <a href="{{ route('admin.reservasi.cetak',$booking->id) }}" class="btn btn-info btn-sm">
                <i class="bi bi-printer"></i>
            </a>

            <form action="{{ route('booking.destroy',$booking->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">
                    <i class="bi bi-trash"></i>
                </button>
            </form>

        </td>

    </tr>

    @empty

    <tr>
        <td colspan="9" class="text-center">
            Belum ada data reservasi.
        </td>
    </tr>

    @endforelse

    </tbody>

</table>
</div>

<div class="mt-3">
{{ $bookings->links() }}
</div>

</div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
