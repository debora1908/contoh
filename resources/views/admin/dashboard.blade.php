<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin HMS - Five Star Horizon Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: #1e293b;
        }
        /* Top Navigation Bar */
        .navbar-admin {
            background-color: #0f172a;
            padding: 15px 0;
            border-bottom: 3px solid #0e7490;
        }
        .navbar-admin .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: #38bdf8;
            font-size: 1.4rem;
        }
        /* Statistik Grid Cards */
        .stat-card {
            background: #ffffff;
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
            transition: transform 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-3px);
        }
        .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }
        /* Tab Navigasi & Tabel */
        .nav-tabs .nav-link {
            border: none;
            color: #64748b;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 8px 8px 0 0;
        }
        .nav-tabs .nav-link.active {
            color: #0e7490;
            background-color: #ffffff;
            border-bottom: 3px solid #0e7490;
        }
        .table-container {
            background: #ffffff;
            border-radius: 0 0 16px 16px;
            border: 1px solid #e2e8f0;
            border-top: none;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.02);
        }
        .table-hms th {
            background-color: #f8fafc;
            color: #475569;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 16px;
            border-bottom: 2px solid #e2e8f0;
        }
        .table-hms td {
            padding: 16px;
            font-size: 0.9rem;
            border-bottom: 1px solid #f1f5f9;
        }
    </style>
</head>
<body>

    <nav class="navbar-admin shadow-sm mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-decoration-none" href="#">
                <i class="bi bi-building-gear me-2"></i> Horizon Property Management System
            </a>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-secondary-subtle text-light px-3 py-2 border border-secondary">Role: Administrator</span>
                <a href="/" class="btn btn-sm btn-light rounded-pill px-3"><i class="bi bi-globe"></i> Lihat Web Tamu</a>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        <div class="row align-items-center mb-4">
            <div class="col">
                <h2 class="fw-bold" style="font-family: 'Playfair Display', serif;">Hotel Occupancy Overview</h2>
                <p class="text-muted small mb-0">Status real-time ketersediaan operasional dari total kamar hotel.</p>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-3">
                <div class="card stat-card p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small fw-bold text-uppercase d-block mb-1">Total Inventory</span>
                            <h3 class="fw-bold m-0 text-dark">150 Kamar</h3>
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
                            <h3 class="fw-bold m-0 text-danger">87 Kamar</h3>
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
                            <h3 class="fw-bold m-0 text-success">63 Kamar</h3>
                        </div>
                        <div class="icon-box bg-success-subtle text-success"><i class="bi bi-door-open-fill"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card stat-card p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small fw-bold text-uppercase d-block mb-1">Pendapatan Hari Ini</span>
                            <h3 class="fw-bold m-0 text-dark">IDR 42.5M</h3>
                        </div>
                        <div class="icon-box bg-warning-subtle text-warning"><i class="bi bi-wallet2"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="fw-bold mb-3" style="font-family: 'Playfair Display', serif;"><i class="bi bi-list-stars text-teal"></i> Manajer Log Transaksi Tamu</h4>
        
        <ul class="nav nav-tabs border-0" id="roomTabs" role="tablist">
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
<div class="tab-content" id="roomTabsContent">
            
            <div class="tab-pane fade show active table-container p-3" id="standard" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-hms mb-0 vertical-middle">
                        <thead>
                            <tr>
                                <th>Nama Tamu</th>
                                <th>Nomor Kamar</th>
                                <th>Tanggal Check In / Out</th>
                                <th>Status Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($standardBookings->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Belum ada tamu di tipe Standard Room.</td>
                                </tr>
                            @else
                                @foreach($standardBookings as $booking)
                                <tr>
                                    <td><strong>{{ $booking->nama_tamu }}</strong><br><span class="text-muted small">{{ $booking->email_tamu }}</span></td>
                                    <td><span class="badge bg-secondary px-3 py-2">{{ $booking->nomor_kamar }}</span></td>
                                    <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }} - {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
                                    <td>
                                        <span class="badge {{ $booking->status_bayar == 'Lunas' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }} px-3 py-2 rounded-pill">
                                            {{ $booking->status_bayar }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade table-container p-3" id="deluxe" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-hms mb-0">
                        <thead>
                            <tr>
                                <th>Nama Tamu</th>
                                <th>Nomor Kamar</th>
                                <th>Tanggal Check In / Out</th>
                                <th>Status Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($deluxeBookings->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Belum ada tamu di tipe Deluxe Room.</td>
                                </tr>
                            @else
                                @foreach($deluxeBookings as $booking)
                                <tr>
                                    <td><strong>{{ $booking->nama_tamu }}</strong><br><span class="text-muted small">{{ $booking->email_tamu }}</span></td>
                                    <td><span class="badge bg-primary px-3 py-2">{{ $booking->nomor_kamar }}</span></td>
                                    <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }} - {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
                                    <td>
                                        <span class="badge {{ $booking->status_bayar == 'Lunas' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }} px-3 py-2 rounded-pill">
                                            {{ $booking->status_bayar }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade table-container p-3" id="suite" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-hms mb-0">
                        <thead>
                            <tr>
                                <th>Nama Tamu</th>
                                <th>Nomor Kamar</th>
                                <th>Tanggal Check In / Out</th>
                                <th>Status Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($suiteBookings->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Belum ada tamu di tipe Executive Suite.</td>
                                </tr>
                            @else
                                @foreach($suiteBookings as $booking)
                                <tr>
                                    <td><strong>{{ $booking->nama_tamu }}</strong><br><span class="text-muted small">{{ $booking->email_tamu }}</span></td>
                                    <td><span class="badge bg-dark px-3 py-2">{{ $booking->nomor_kamar }}</span></td>
                                    <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }} - {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
                                    <td>
                                        <span class="badge {{ $booking->status_bayar == 'Lunas' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }} px-3 py-2 rounded-pill">
                                            {{ $booking->status_bayar }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>