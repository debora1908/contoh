    <!DOCTYPE html>
    <html lang="id">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengguna</title>

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

    .logo{
        font-size:28px;
        font-weight:bold;
        margin-bottom:20px;
    }

    .menu{
        list-style:none;
        padding:0;
    }

    .menu li{
        margin-bottom:15px;
    }

    .menu a{
        color:#cbd5e1;
        text-decoration:none;
        display:flex;
        gap:12px;
        align-items:center;
        padding:14px;
        border-radius:12px;
    }

    .menu a:hover,
    .menu a.active{
        background:#2563eb;
        color:white;
    }

    .main{
        margin-left:250px;
        padding:35px;
    }

    .card-stat{
        border:none;
        border-radius:18px;
        box-shadow:0 5px 18px rgba(0,0,0,.08);
    }

    .table{
        background:white;
    }

    .badge{
        font-size:13px;
    }
    </style>

    </head>
    <body>

    <div class="sidebar">

    <div class="logo">
    🏨 E-Hotel Mgt
    </div>

    <hr>

    <ul class="menu">

    <li>
    <a href="{{ route('admin.dashboard') }}">
    <i class="bi bi-speedometer2"></i>
    Dashboard
    </a>
    </li>

    <li>
    <a href="{{ route('admin.manajemen.index') }}">
    <i class="bi bi-door-open-fill"></i>
    Manajemen Kamar
    </a>
    </li>

    <li>
    <a href="{{ route('admin.reservasi.index') }}">
    <i class="bi bi-journal-bookmark-fill"></i>
    Reservasi Tamu
    </a>
    </li>

    <li>
    <a class="active" href="{{ route('admin.pengguna.index') }}">
    <i class="bi bi-people-fill"></i>
    Pengguna
    </a>
    </li>

    <li>
    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button class="btn text-white w-100 text-start">
    <i class="bi bi-box-arrow-right"></i>
    Logout
    </button>
    </form>
    </li>

    </ul>

    </div>

    <div class="main">

    <h2 class="fw-bold mb-4">
    Pengguna
    </h2>

    <div class="row mb-4">

    <div class="col-md-3">

    <div class="card card-stat">

    <div class="card-body">

    <h6>Total Pengguna</h6>

    <h2>{{ $totalPengguna }}</h2>

    </div>

    </div>

    </div>

    <div class="col-md-3">

    <div class="card card-stat">

    <div class="card-body">

    <h6>Admin</h6>

    <h2 class="text-primary">
    {{ $admin }}
    </h2>

    </div>

    </div>

    </div>

    <div class="col-md-3">

    <div class="card card-stat">

    <div class="card-body">

    <h6>Resepsionis</h6>

    <h2 class="text-success">
    {{ $resepsionis }}
    </h2>

    </div>

    </div>

    </div>

    <div class="col-md-3">

    <div class="card card-stat">

    <div class="card-body">

    <h6>Housekeeping</h6>

    <h2 class="text-warning">
    {{ $housekeeping }}
    </h2>

    </div>

    </div>

    </div>

    </div>

    <div class="card shadow-sm">

    <div class="card-body">

    <div class="d-flex justify-content-between mb-3">

    <input type="text"
    class="form-control w-50"
    placeholder="Cari pengguna...">

    <button class="btn btn-primary">
    <i class="bi bi-plus-circle"></i>
    Tambah Pengguna
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
    <th width="180">Aksi</th>

    </tr>

    </thead>

    <tbody>

    @forelse($penggunas as $pengguna)

    <tr>

    <td>{{ $loop->iteration }}</td>

    <td>{{ $pengguna->nama }}</td>

    <td>{{ $pengguna->email }}</td>

    <td>{{ $pengguna->username }}</td>

    <td>

    <span class="badge bg-info">
    {{ $pengguna->role }}
    </span>

    </td>

    <td>

    @if($pengguna->status=="Aktif")

    <span class="badge bg-success">
    Aktif
    </span>

    @else

    <span class="badge bg-danger">
    Nonaktif
    </span>

    @endif

    </td>

    <td>

    <button class="btn btn-info btn-sm">
    <i class="bi bi-eye"></i>
    </button>

    <button class="btn btn-warning btn-sm">
    <i class="bi bi-pencil"></i>
    </button>

    <button class="btn btn-danger btn-sm">
    <i class="bi bi-trash"></i>
    </button>

    <button class="btn btn-secondary btn-sm">
    <i class="bi bi-key"></i>
    </button>

    </td>

    </tr>

    @empty

    <tr>

    <td colspan="7" class="text-center">

    Belum ada data pengguna

    </td>

    </tr>

    @endforelse

    </tbody>

    </table>

    </div>

    {{ $penggunas->links() }}

    </div>

    </div>

    </div>

    </body>
    </html>