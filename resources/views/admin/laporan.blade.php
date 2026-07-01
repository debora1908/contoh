<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laporan Hotel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
body{
    background:#f5f7fb;
    font-family:'Segoe UI',sans-serif;
}

.sidebar{
    position:fixed;
    width:250px;
    height:100vh;
    background:#1f2937;
    color:white;
    padding:25px;
}

.sidebar a{
    display:block;
    color:#cbd5e1;
    text-decoration:none;
    padding:12px;
    border-radius:10px;
    margin-bottom:8px;
}

.sidebar a:hover,
.sidebar a.active{
    background:#2563eb;
    color:white;
}

.main{
    margin-left:250px;
    padding:30px;
}

.card-box{
    border:none;
    border-radius:15px;
    color:white;
}

.bg-blue{
    background:#2563eb;
}

.bg-green{
    background:#16a34a;
}

.bg-purple{
    background:#7c3aed;
}

.bg-orange{
    background:#ea580c;
}

.table{
    background:white;
}
</style>

</head>
<body>

<div class="sidebar">

<h3 class="mb-4">🏨 E-Hotel</h3>
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



<form action="{{ route('logout') }}" method="POST" class="mt-4">
@csrf
<button class="btn btn-danger w-100">
Logout
</button>
</form>

</div>

<div class="main">

<h2 class="fw-bold mb-4">
📊 Laporan Hotel
</h2>

<div class="row mb-4">

<div class="col-md-3">
<div class="card card-box bg-blue">
<div class="card-body">
<h6>Total Reservasi</h6>
<h2>{{ $totalReservasi }}</h2>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card card-box bg-green">
<div class="card-body">
<h6>Pendapatan</h6>
<h2>Rp {{ number_format($pendapatan,0,',','.') }}</h2>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card card-box bg-purple">
<div class="card-body">
<h6>Kamar Terisi</h6>
<h2>{{ $kamarTerisi }}</h2>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card card-box bg-orange">
<div class="card-body">
<h6>Kamar Tersedia</h6>
<h2>{{ $kamarTersedia }}</h2>
</div>
</div>
</div>

</div>

<div class="card shadow">

<div class="card-header bg-primary text-white">
Daftar Laporan Reservasi
</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>No</th>
<th>Nama</th>
<th>Email</th>
<th>Kamar</th>
<th>No Kamar</th>
<th>Check In</th>
<th>Check Out</th>
<th>Status</th>

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

@if($booking->status_bayar=="Lunas")

<span class="badge bg-success">
Lunas
</span>

@else

<span class="badge bg-warning text-dark">
Pending
</span>

@endif

</td>

</tr>

@empty

<tr>

<td colspan="8" class="text-center">

Belum ada data laporan.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>