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
<li><a href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
<li><a href="{{ route('admin.manajemen.index') }}"><i class="bi bi-door-open-fill"></i> Manajemen Kamar</a></li>
<li><a class="active" href="{{ route('admin.reservasi.index') }}"><i class="bi bi-journal-bookmark-fill"></i> Reservasi Tamu</a></li>
<li><a href="{{ route('admin.pengguna.index') }}"><i class="bi bi-people-fill"></i> Pengguna</a></li>
<li>
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
<div class="row mb-3">
<div class="col-md-4">
<input type="text" name="search" class="form-control" placeholder="Cari nama tamu atau email..." value="{{ request('search') }}">
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

<div class="col-md-2">
<button type="submit" class="btn btn-primary w-100">Cari</button>
</div>
</div>
</form>

<div class="table-responsive">
<!-- Tabel booking tetap gunakan kode tabel yang sudah kamu punya -->
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
