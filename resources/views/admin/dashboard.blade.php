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
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f1f5f9; color: #334155; overflow-x: hidden; }
        
        /* SIDEBAR */
        .sidebar { background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%); min-height: 100vh; color: #94a3b8; box-shadow: 2px 0 15px rgba(0,0,0,0.1); display: flex; flex-direction: column; justify-content: space-between; }
        .sidebar .brand-title { font-size: 1.25rem; font-weight: 700; color: #ffffff; letter-spacing: 0.5px; }
        .sidebar .nav-link { color: #94a3b8; font-weight: 500; padding: 12px 20px; border-radius: 10px; margin: 5px 15px; transition: all 0.3s ease; display: flex; align-items: center; gap: 12px; }
        .sidebar .nav-link:hover { color: #ffffff; background-color: rgba(255,255,255,0.08); }
        .sidebar .nav-link.active { background-color: #3b82f6; color: #ffffff; box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3); }
        
        /* TOMBOL LOGOUT */
        .logout-btn { color: #f87171 !important; border: 1px solid #f87171; margin: 20px 15px; text-align: center; font-weight: 600; transition: 0.3s; }
        .logout-btn:hover { background-color: #f87171; color: white !important; transform: scale(1.02); }

        /* KARTU STATISTIK (GRADIENT ELEGAN) */
        .stat-card { border: none; border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); color: white; transition: 0.3s; padding: 20px; }
        .stat-card:hover { transform: translateY(-5px); }
        .grad-blue { background: linear-gradient(135deg, #4facfe, #00f2fe); }
        .grad-purple { background: linear-gradient(135deg, #667eea, #764ba2); }
        .grad-green { background: linear-gradient(135deg, #43e97b, #38f9d7); }
        .grad-orange { background: linear-gradient(135deg, #fa709a, #fee140); }
        .icon-box { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.35rem; background: rgba(255,255,255,0.2); }

        /* TABEL & TABLE */
        .table-container { background: #ffffff; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); padding: 20px; }
        .nav-tabs .nav-link { border: none; color: #64748b; font-weight: 600; }
        .nav-tabs .nav-link.active { color: #3b82f6; border-bottom: 3px solid #3b82f6; background: transparent; }
        .badge-room { background-color: #e2e8f0; color: #475569; font-weight: 700; padding: 6px 12px; border-radius: 8px; }
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
                    <ul class="nav flex-column mt-3">
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
</ul>
                </div>
                <a href="/logout" class="nav-link logout-btn"><i class="bi bi-box-arrow-right"></i> Log Out</a>
            </div>

            <div class="col-md-9 col-lg-10 offset-md-3 offset-lg-2 p-4 p-md-5">
                <div class="mb-4">
                    <h2 class="fw-bold" style="font-family: 'Playfair Display', serif;">Hotel Occupancy Overview</h2>
                    <p class="text-muted small">Status real-time ketersediaan operasional dari total kamar hotel.</p>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-6 col-lg-3"><div class="stat-card grad-blue d-flex align-items-center justify-content-between"><div><span class="small fw-bold">TOTAL INVENTORY</span><h3 class="fw-bold m-0">{{ $totalInventory }} Kamar</h3></div><div class="icon-box"><i class="bi bi-building"></i></div></div></div>
                    <div class="col-md-6 col-lg-3"><div class="stat-card grad-purple d-flex align-items-center justify-content-between"><div><span class="small fw-bold">KAMAR TERISI</span><h3 class="fw-bold m-0">{{ $kamarTerisi }} Kamar</h3></div><div class="icon-box"><i class="bi bi-door-closed-fill"></i></div></div></div>
                    <div class="col-md-6 col-lg-3"><div class="stat-card grad-green d-flex align-items-center justify-content-between"><div><span class="small fw-bold">KAMAR TERSEDIA</span><h3 class="fw-bold m-0">{{ $kamarTersedia }} Kamar</h3></div><div class="icon-box"><i class="bi bi-door-open-fill"></i></div></div></div>
                    <div class="col-md-6 col-lg-3"><div class="stat-card grad-orange d-flex align-items-center justify-content-between"><div><span class="small fw-bold">PENDAPATAN</span><h3 class="fw-bold m-0">{{ $pendapatanFormatted }}</h3></div><div class="icon-box"><i class="bi bi-wallet2"></i></div></div></div>
                </div>

                <h4 class="fw-bold mb-3"><i class="bi bi-list-stars text-primary me-2"></i>Manajer Log Transaksi Tamu</h4>
                <ul class="nav nav-tabs border-bottom mb-4" id="roomTabs" role="tablist">
                    <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#standard">Standard Room</button></li>
                    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#deluxe">Deluxe Room</button></li>
                    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#suite">Executive Suite</button></li>
                </ul>
                
                <div class="tab-content table-container">
                    <div class="tab-pane fade show active" id="standard">
                        <table class="table align-middle table-hover">
                            <thead class="table-light text-secondary small text-uppercase">
                                <tr><th>Nama Tamu</th><th>Nomor Kamar</th><th>Check In / Out</th><th>Status</th><th class="text-center">Aksi</th></tr>
                            </thead>
                            <tbody>
                                @foreach($standardBookings as $row)
                                <tr>
                                    <td><div class="fw-bold">{{ $row->nama_tamu }}</div><div class="text-muted small">{{ $row->email_tamu }}</div></td>
                                    <td><span class="badge-room">{{ $row->nomor_kamar }}</span></td>
                                    <td class="small">{{ \Carbon\Carbon::parse($row->check_in)->format('d M') }} - {{ \Carbon\Carbon::parse($row->check_out)->format('d M Y') }}</td>
                                    <td><span class="badge rounded-pill {{ $row->status_bayar == 'Lunas' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }} px-3 py-2">{{ $row->status_bayar }}</span></td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('booking.edit', $row->id) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil-square"></i></a>
                                            <form action="{{ route('booking.destroy', $row->id) }}" method="POST">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- DELUXE ROOM -->
<div class="tab-pane fade" id="deluxe">
    <table class="table align-middle table-hover">
        <thead class="table-light text-secondary small text-uppercase">
            <tr>
                <th>Nama Tamu</th>
                <th>Nomor Kamar</th>
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
                    <div class="text-muted small">{{ $row->email_tamu }}</div>
                </td>

                <td><span class="badge-room">{{ $row->nomor_kamar }}</span></td>

                <td>
                    {{ \Carbon\Carbon::parse($row->check_in)->format('d M') }}
                    -
                    {{ \Carbon\Carbon::parse($row->check_out)->format('d M Y') }}
                </td>

                <td>
                    <span class="badge rounded-pill {{ $row->status_bayar == 'Lunas' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }}">
                        {{ $row->status_bayar }}
                    </span>
                </td>

                <td class="text-center">
                    <a href="{{ route('booking.edit',$row->id) }}" class="btn btn-sm btn-outline-warning">
                        <i class="bi bi-pencil-square"></i>
                    </a>

                    <form action="{{ route('booking.destroy',$row->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data Deluxe Room.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- EXECUTIVE SUITE -->
<div class="tab-pane fade" id="suite">
    <table class="table align-middle table-hover">
        <thead class="table-light text-secondary small text-uppercase">
            <tr>
                <th>Nama Tamu</th>
                <th>Nomor Kamar</th>
                <th>Check In / Out</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($suiteBookings as $row)
            <tr>
                <td>
                    <div class="fw-bold">{{ $row->nama_tamu }}</div>
                    <div class="text-muted small">{{ $row->email_tamu }}</div>
                </td>

                <td><span class="badge-room">{{ $row->nomor_kamar }}</span></td>

                <td>
                    {{ \Carbon\Carbon::parse($row->check_in)->format('d M') }}
                    -
                    {{ \Carbon\Carbon::parse($row->check_out)->format('d M Y') }}
                </td>

                <td>
                    <span class="badge rounded-pill {{ $row->status_bayar == 'Lunas' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }}">
                        {{ $row->status_bayar }}
                    </span>
                </td>

                <td class="text-center">
                    <a href="{{ route('booking.edit',$row->id) }}" class="btn btn-sm btn-outline-warning">
                        <i class="bi bi-pencil-square"></i>
                    </a>

                    <form action="{{ route('booking.destroy',$row->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data Executive Suite.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
                    <div class="tab-pane fade" id="deluxe">
    <table class="table align-middle table-hover">
        <thead class="table-light text-secondary small text-uppercase">
            <tr>
                <th>Nama Tamu</th>
                <th>Nomor Kamar</th>
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
                    <div class="text-muted small">{{ $row->email_tamu }}</div>
                </td>

                <td><span class="badge-room">{{ $row->nomor_kamar }}</span></td>

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
                    <a href="{{ route('booking.edit',$row->id) }}" class="btn btn-sm btn-outline-warning">
                        <i class="bi bi-pencil-square"></i>
                    </a>

                    <form action="{{ route('booking.destroy',$row->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data Deluxe Room.</td>
            </tr>
        @endforelse
        </tbody>
        <div class="tab-pane fade" id="suite">
    <table class="table align-middle table-hover">
        <thead class="table-light text-secondary small text-uppercase">
            <tr>
                <th>Nama Tamu</th>
                <th>Nomor Kamar</th>
                <th>Check In / Out</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($suiteBookings as $row)
            <tr>
                <td>
                    <div class="fw-bold">{{ $row->nama_tamu }}</div>
                    <div class="text-muted small">{{ $row->email_tamu }}</div>
                </td>

                <td><span class="badge-room">{{ $row->nomor_kamar }}</span></td>

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
                    <a href="{{ route('booking.edit',$row->id) }}" class="btn btn-sm btn-outline-warning">
                        <i class="bi bi-pencil-square"></i>
                    </a>

                    <form action="{{ route('booking.destroy',$row->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data Executive Suite.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
    </table>
</div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>