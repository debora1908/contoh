<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - E-Hotel Mgt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
            overflow-x: hidden;
        }
        
        /* SIDEBAR STYLE (PERSIS GAMBAR 1) */
        .sidebar {
            background-color: #1e2530;
            min-height: 100vh;
            color: #cbd5e1;
            box-shadow: 4px 0 10px rgba(0,0,0,0.05);
        }
        .sidebar .brand-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 0.5px;
        }
        .sidebar .nav-link {
            color: #94a3b8;
            font-weight: 500;
            padding: 12px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .sidebar .nav-link:hover {
            color: #ffffff;
            background-color: rgba(255,255,255,0.05);
        }
        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: #ffffff;
            font-weight: 600;
        }

        /* CARD STATISTIK MODERN */
        .stat-card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.02);
            background: #ffffff;
            transition: transform 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-3px);
        }
        .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
        }

        /* CUSTOM TABS & TABLE */
        .nav-tabs .nav-link {
            border: none;
            color: #64748b;
            padding: 10px 20px;
            font-weight: 600;
            border-bottom: 3px solid transparent;
        }
        .nav-tabs .nav-link.active {
            color: #0d6efd;
            border-bottom-color: #0d6efd;
            background: transparent;
        }
        .table-container {
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.02);
            border: none;
        }
        .badge-room {
            background-color: #64748b;
            color: white;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

    <div class="container-fluid p-0">
        <div class="row g-0">
            
            <div class="col-md-3 col-lg-2 sidebar p-3 position-fixed start-0 top-0 bottom-0">
                <div class="d-flex align-items-center gap-2 mb-4 px-2 pt-2">
                    <span class="fs-4">🏢</span>
                    <span class="brand-title">E-Hotel Mgt</span>
                </div>
                <hr style="border-color: rgba(255,255,255,0.1)">
                <ul class="nav flex-column gap-2 mt-3">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <span>📊</span> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
    <a href="/admin/manajemen" class="nav-link active">
        <i class="bi bi-door-open"></i> Manajemen Kamar
    </a>
</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span>📖</span> Reservasi Tamu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span>👥</span> Pengguna
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-9 col-lg-10 offset-md-3 offset-lg-2 p-4 p-md-5">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold tracking-tight" style="font-family: 'Playfair Display', serif;">Hotel Occupancy Overview</h2>
                        <p class="text-muted small m-0">Status real-time ketersediaan operasional dari total kamar hotel.</p>
                    </div>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-6 col-lg-3">
                        <div class="card stat-card p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-muted small fw-bold text-uppercase d-block mb-1">Total Inventory</span>
                                    <h3 class="fw-bold m-0 text-dark">{{ $totalInventory }} Kamar</h3>
                                </div>
                                <div class="icon-box bg-primary-subtle text-primary"><i class="bi bi-building"></i></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3">
                        <div class="card stat-card p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-muted small fw-bold text-uppercase d-block mb-1">Kamar Terisi (Occ)</span>
                                    <h3 class="fw-bold m-0 text-danger">{{ $kamarTerisi }} Kamar</h3>
                                </div>
                                <div class="icon-box bg-danger-subtle text-danger"><i class="bi bi-door-closed-fill"></i></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3">
                        <div class="card stat-card p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-muted small fw-bold text-uppercase d-block mb-1">Kamar Tersedia (Vacant)</span>
                                    <h3 class="fw-bold m-0 text-success">{{ $kamarTersedia }} Kamar</h3>
                                </div>
                                <div class="icon-box bg-success-subtle text-success"><i class="bi bi-door-open-fill"></i></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3">
                        <div class="card stat-card p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-muted small fw-bold text-uppercase d-block mb-1">Total Pendapatan Lunas</span>
                                    <h3 class="fw-bold m-0 text-dark">{{ $pendapatanFormatted }}</h3>
                                </div>
                                <div class="icon-box bg-warning-subtle text-warning"><i class="bi bi-wallet2"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold m-0" style="font-family: 'Playfair Display', serif;">
                        <i class="bi bi-list-stars text-primary me-2"></i>Manajer Log Transaksi Tamu
                    </h4>
                </div>
                
                <ul class="nav nav-tabs border-bottom mb-4" id="roomTabs" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="standard-tab" data-bs-toggle="tab" data-bs-target="#standard" type="button" role="tab">Standard Room (Sisa: 20)</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="deluxe-tab" data-bs-toggle="tab" data-bs-target="#deluxe" type="button" role="tab">Deluxe Room (Sisa: 28)</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="suite-tab" data-bs-toggle="tab" data-bs-target="#suite" type="button" role="tab">Executive Suite (Sisa: 15)</button>
                    </li>
                </ul>
                
                <div class="tab-content table-container p-4" id="roomTabsContent">
                    
                    <div class="tab-pane fade show active" id="standard" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table align-middle table-hover">
                                <thead class="table-light text-secondary small text-uppercase">
                                    <tr>
                                        <th>Nama Tamu</th>
                                        <th>Nomor Kamar</th>
                                        <th>Tanggal Check In / Out</th>
                                        <th>Status Pembayaran</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($standardBookings as $row)
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-dark">{{ $row->nama_tamu }}</div>
                                            <div class="text-muted small">{{ $row->email_tamu }}</div>
                                        </td>
                                        <td><span class="badge-room">{{ $row->nomor_kamar }}</span></td>
                                        <td class="small text-secondary">
                                            {{ \Carbon\Carbon::parse($row->check_in)->format('d M Y') }} - {{ \Carbon\Carbon::parse($row->check_out)->format('d M Y') }}
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill {{ $row->status_bayar == 'Lunas' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }} px-3 py-2">
                                                {{ $row->status_bayar }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('booking.edit', $row->id) }}" class="btn btn-warning btn-sm fw-bold px-3"><i class="bi bi-pencil-square me-1"></i> Edit</a>
                                                <form action="{{ route('booking.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm fw-bold px-3"><i class="bi bi-trash me-1"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="deluxe" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table align-middle table-hover">
                                <thead class="table-light text-secondary small text-uppercase">
                                    <tr>
                                        <th>Nama Tamu</th>
                                        <th>Nomor Kamar</th>
                                        <th>Tanggal Check In / Out</th>
                                        <th>Status Pembayaran</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($deluxeBookings as $row)
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-dark">{{ $row->nama_tamu }}</div>
                                            <div class="text-muted small">{{ $row->email_tamu }}</div>
                                        </td>
                                        <td><span class="badge-room">{{ $row->nomor_kamar }}</span></td>
                                        <td class="small text-secondary">
                                            {{ \Carbon\Carbon::parse($row->check_in)->format('d M Y') }} - {{ \Carbon\Carbon::parse($row->check_out)->format('d M Y') }}
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill {{ $row->status_bayar == 'Lunas' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }} px-3 py-2">
                                                {{ $row->status_bayar }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('booking.edit', $row->id) }}" class="btn btn-warning btn-sm fw-bold px-3"><i class="bi bi-pencil-square me-1"></i> Edit</a>
                                                <form action="{{ route('booking.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm fw-bold px-3"><i class="bi bi-trash me-1"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="suite" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table align-middle table-hover">
                                <thead class="table-light text-secondary small text-uppercase">
                                    <tr>
                                        <th>Nama Tamu</th>
                                        <th>Nomor Kamar</th>
                                        <th>Tanggal Check In / Out</th>
                                        <th>Status Pembayaran</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($suiteBookings as $row)
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-dark">{{ $row->nama_tamu }}</div>
                                            <div class="text-muted small">{{ $row->email_tamu }}</div>
                                        </td>
                                        <td><span class="badge-room">{{ $row->nomor_kamar }}</span></td>
                                        <td class="small text-secondary">
                                            {{ \Carbon\Carbon::parse($row->check_in)->format('d M Y') }} - {{ \Carbon\Carbon::parse($row->check_out)->format('d M Y') }}
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill {{ $row->status_bayar == 'Lunas' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }} px-3 py-2">
                                                {{ $row->status_bayar }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('booking.edit', $row->id) }}" class="btn btn-warning btn-sm fw-bold px-3"><i class="bi bi-pencil-square me-1"></i> Edit</a>
                                                <form action="{{ route('booking.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm fw-bold px-3"><i class="bi bi-trash me-1"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
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