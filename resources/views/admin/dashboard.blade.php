<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - E-Hotel Mgt</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family:'Plus Jakarta Sans',sans-serif;
            background:#f1f5f9;
            color:#334155;
            overflow-x:hidden;
        }

        .sidebar{
            background:linear-gradient(180deg,#1e293b,#0f172a);
            min-height:100vh;
            color:#94a3b8;
            display:flex;
            flex-direction:column;
            justify-content:space-between;
        }

        .brand-title{
            font-size:1.25rem;
            font-weight:700;
            color:#fff;
        }

        .sidebar .nav-link{
            color:#94a3b8;
            padding:12px 20px;
            border-radius:10px;
            margin:5px 15px;
            font-weight:500;
        }

        .sidebar .nav-link:hover{
            background:rgba(255,255,255,.08);
            color:#fff;
        }

        .logout-btn{
            color:#ef4444!important;
            border:1px solid #ef4444;
            margin:20px 15px;
            text-align:center;
        }

        .logout-btn:hover{
            background:#ef4444;
            color:white!important;
        }

        .stat-card{
            border:none;
            border-radius:16px;
            padding:20px;
            color:white;
            box-shadow:0 4px 15px rgba(0,0,0,.08);
        }

        .grad-blue{background:linear-gradient(135deg,#4facfe,#00f2fe);}
        .grad-purple{background:linear-gradient(135deg,#667eea,#764ba2);}
        .grad-green{background:linear-gradient(135deg,#43e97b,#38f9d7);}
        .grad-orange{background:linear-gradient(135deg,#fa709a,#fee140);}

        .icon-box{
            width:48px;
            height:48px;
            border-radius:12px;
            display:flex;
            justify-content:center;
            align-items:center;
            background:rgba(255,255,255,.2);
            font-size:22px;
        }

        .table-container{
            background:#fff;
            border-radius:16px;
            padding:20px;
            box-shadow:0 4px 6px rgba(0,0,0,.05);
        }

        .badge-room{
            background:#e2e8f0;
            padding:6px 12px;
            border-radius:8px;
            font-weight:700;
        }

        .nav-tabs .nav-link{
            border:none;
            color:#64748b;
            font-weight:600;
        }

        .nav-tabs .nav-link.active{
            color:#3b82f6;
            border-bottom:3px solid #3b82f6;
            background:transparent;
        }
    </style>
</head>

<body>

<div class="container-fluid p-0">
<div class="row g-0">

<div class="col-md-3 col-lg-2 sidebar position-fixed start-0 top-0 bottom-0">

<div>

<div class="d-flex align-items-center gap-2 mb-4 px-3 pt-4">
<i class="bi bi-buildings-fill fs-3 text-white"></i>
<span class="brand-title">E-Hotel Mgt</span>
</div>

<ul class="nav flex-column">

<li class="nav-item">
<a href="{{ route('admin.dashboard') }}" class="nav-link active">
<i class="bi bi-speedometer2"></i>
Dashboard
</a>
</li>

<li class="nav-item">
<a href="{{ route('admin.manajemen.index') }}" class="nav-link">
<i class="bi bi-door-open"></i>
Manajemen Kamar
</a>
</li>

<li class="nav-item">
<a href="{{ route('admin.reservasi.index') }}" class="nav-link">
<i class="bi bi-journal-text"></i>
Reservasi Tamu
</a>
</li>

<li class="nav-item">
<a href="{{ route('admin.pengguna.index') }}" class="nav-link">
<i class="bi bi-people"></i>
Pengguna
</a>
</li>

<li class="nav-item">
<a href="{{ route('admin.laporan.index') }}" class="nav-link">
<i class="bi bi-bar-chart-fill"></i>
Laporan
</a>
</li>

</ul>

</div>

<a href="/logout" class="nav-link logout-btn">
<i class="bi bi-box-arrow-right"></i>
Logout
</a>

</div>

<div class="col-md-9 col-lg-10 offset-md-3 offset-lg-2 p-4 p-md-5">

<div class="mb-4">
<h2 class="fw-bold" style="font-family:'Playfair Display',serif;">
Hotel Occupancy Overview
</h2>

<p class="text-muted small">
Status real-time ketersediaan operasional hotel.
</p>
</div>

<div class="row g-4 mb-5">

<div class="col-lg-3">
<div class="stat-card grad-blue d-flex justify-content-between align-items-center">
<div>
<div class="small fw-bold">TOTAL INVENTORY</div>
<h3>{{ $totalInventory }} Kamar</h3>
</div>
<div class="icon-box">
<i class="bi bi-building"></i>
</div>
</div>
</div>

<div class="col-lg-3">
<div class="stat-card grad-purple d-flex justify-content-between align-items-center">
<div>
<div class="small fw-bold">KAMAR TERISI</div>
<h3>{{ $kamarTerisi }} Kamar</h3>
</div>
<div class="icon-box">
<i class="bi bi-door-closed-fill"></i>
</div>
</div>
</div>

<div class="col-lg-3">
<div class="stat-card grad-green d-flex justify-content-between align-items-center">
<div>
<div class="small fw-bold">KAMAR TERSEDIA</div>
<h3>{{ $kamarTersedia }} Kamar</h3>
</div>
<div class="icon-box">
<i class="bi bi-door-open-fill"></i>
</div>
</div>
</div>

<div class="col-lg-3">
<div class="stat-card grad-orange d-flex justify-content-between align-items-center">
<div>
<div class="small fw-bold">PENDAPATAN</div>
<h3>{{ $pendapatanFormatted }}</h3>
</div>
<div class="icon-box">
<i class="bi bi-wallet2"></i>
</div>
</div>
</div>

</div>

<h4 class="fw-bold mb-3">
<i class="bi bi-list-stars text-primary me-2"></i>
Manajer Log Transaksi Tamu
</h4>

<ul class="nav nav-tabs mb-4">

<li class="nav-item">
<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#standard">
Standard Room
</button>
</li>

<li class="nav-item">
<button class="nav-link" data-bs-toggle="tab" data-bs-target="#deluxe">
Deluxe Room
</button>
</li>

<li class="nav-item">
<button class="nav-link" data-bs-toggle="tab" data-bs-target="#suite">
Executive Suite
</button>
</li>

</ul>

<div class="tab-content table-container">

<div class="tab-pane fade show active" id="standard">

<table class="table table-hover align-middle">

<thead class="table-light">
<tr>
<th>Nama Tamu</th>
<th>No Kamar</th>
<th>Check In / Out</th>
<th>Status</th>
<th class="text-center">Aksi</th>
</tr>
</thead>

<tbody>

@forelse($standardBookings as $row)
<tr>

<td>
<div class="fw-bold">{{ $row->nama_tamu }}</div>
<div class="small text-muted">{{ $row->email_tamu }}</div>
</td>

<td>
<span class="badge-room">
{{ $row->nomor_kamar }}
</span>
</td>

<td>
{{ \Carbon\Carbon::parse($row->check_in)->format('d M') }}
-
{{ \Carbon\Carbon::parse($row->check_out)->format('d M Y') }}
</td>

<td>

<span class="badge rounded-pill {{ $row->status_bayar=='Lunas' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }}">
{{ $row->status_bayar }}
</span>

</td>

<td class="text-center">

<a href="{{ route('booking.edit',$row->id) }}" class="btn btn-outline-warning btn-sm">
<i class="bi bi-pencil-square"></i>
</a>

<form action="{{ route('booking.destroy',$row->id) }}" method="POST" class="d-inline">
@csrf
@method('DELETE')

<button class="btn btn-outline-danger btn-sm">
<i class="bi bi-trash"></i>
</button>

</form>

</td>

</tr>

@empty

<tr>
<td colspan="5" class="text-center">
Belum ada data Standard Room.
</td>
</tr>

@endforelse

</tbody>

</table>

</div>
<div class="tab-pane fade" id="deluxe">

<table class="table table-hover align-middle">

<thead class="table-light">
<tr>
<th>Nama Tamu</th>
<th>No Kamar</th>
<th>Check In / Out</th>
<th>Status</th>
<th class="text-center">Aksi</th>
</tr>
</thead>

<tbody>

@forelse($deluxeBookings as $row)

<tr>

<td>
<div class="fw-bold">{{ $row->nama_tamu }}</div>
<div class="small text-muted">{{ $row->email_tamu }}</div>
</td>

<td>
<span class="badge-room">
{{ $row->nomor_kamar }}
</span>
</td>

<td>
{{ \Carbon\Carbon::parse($row->check_in)->format('d M') }}
-
{{ \Carbon\Carbon::parse($row->check_out)->format('d M Y') }}
</td>

<td>
<span class="badge rounded-pill {{ $row->status_bayar=='Lunas' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }}">
{{ $row->status_bayar }}
</span>
</td>

<td class="text-center">

<a href="{{ route('booking.edit',$row->id) }}" class="btn btn-outline-warning btn-sm">
<i class="bi bi-pencil-square"></i>
</a>

<form action="{{ route('booking.destroy',$row->id) }}" method="POST" class="d-inline">
@csrf
@method('DELETE')

<button class="btn btn-outline-danger btn-sm">
<i class="bi bi-trash"></i>
</button>

</form>

</td>

</tr>

@empty

<tr>
<td colspan="5" class="text-center">
Belum ada data Deluxe Room.
</td>
</tr>

@endforelse

</tbody>

</table>

</div>


<div class="tab-pane fade" id="suite">

<table class="table table-hover align-middle">

<thead class="table-light">
<tr>
<th>Nama Tamu</th>
<th>No Kamar</th>
<th>Check In / Out</th>
<th>Status</th>
<th class="text-center">Aksi</th>
</tr>
</thead>

<tbody>

@forelse($executiveBookings as $row)

<tr>

<td>
<div class="fw-bold">{{ $row->nama_tamu }}</div>
<div class="small text-muted">{{ $row->email_tamu }}</div>
</td>

<td>
<span class="badge-room">
{{ $row->nomor_kamar }}
</span>
</td>

<td>
{{ \Carbon\Carbon::parse($row->check_in)->format('d M') }}
-
{{ \Carbon\Carbon::parse($row->check_out)->format('d M Y') }}
</td>

<td>
<span class="badge rounded-pill {{ $row->status_bayar=='Lunas' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }}">
{{ $row->status_bayar }}
</span>
</td>

<td class="text-center">

<a href="{{ route('booking.edit',$row->id) }}" class="btn btn-outline-warning btn-sm">
<i class="bi bi-pencil-square"></i>
</a>

<form action="{{ route('booking.destroy',$row->id) }}" method="POST" class="d-inline">
@csrf
@method('DELETE')

<button class="btn btn-outline-danger btn-sm">
<i class="bi bi-trash"></i>
</button>

</form>

</td>

</tr>

@empty

<tr>
<td colspan="5" class="text-center">
Belum ada data Executive Suite.
</td>
</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>