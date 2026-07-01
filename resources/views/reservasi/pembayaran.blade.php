<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selesaikan Pembayaran - Five Star Horizon Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; color: #0f172a; }
        .payment-card { background: #ffffff; border: none; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .hotel-brand { font-family: 'Playfair Display', serif; font-weight: 700; color: #0f172a; }
        
        /* Layout diperkecil secara visual */
        .container { max-width: 500px; padding-top: 20px; }
        .card { padding: 15px !important; margin-bottom: 12px !important; }
        .table-compact td { padding: 4px 0 !important; font-size: 0.85rem; }
        h5, h6 { font-size: 1rem !important; }
        .btn { padding: 8px 16px !important; font-size: 0.9rem !important; }
    </style>
</head>
<body>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-2 text-center py-2">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <div class="text-center mb-2">
        <h2 class="hotel-brand">Five Star Horizon Hotel</h2>
        <p class="text-muted small">Invois Reservasi Kamar #{{ $booking->id }}</p>
    </div>

    <div class="card payment-card">
        <h5 class="fw-bold mb-2"><i class="bi bi-receipt-cutoff text-primary me-2"></i>Ringkasan Reservasi</h5>
        <table class="table table-borderless table-compact mb-0">
            <tr>
                <td class="text-muted px-0">Nama Tamu</td>
                <td class="text-end fw-semibold px-0">{{ $booking->nama_tamu }}</td>
            </tr>
            <tr>
                <td class="text-muted px-0">Tipe Kamar</td>
                <td class="text-end fw-semibold px-0 text-capitalize">{{ $booking->pilihan_kamar }} Room</td>
            </tr>
            <tr>
                <td class="text-muted px-0">Masa Inap</td>
                <td class="text-end fw-semibold px-0">{{ \Carbon\Carbon::parse($booking->check_in)->format('d M') }} - {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
            </tr>
            
            @php
                $checkIn = \Carbon\Carbon::parse($booking->check_in);
                $checkOut = \Carbon\Carbon::parse($booking->check_out);
                $lamaMenginap = $checkIn->diffInDays($checkOut) ?: 1; 
                $hargaPerMalam = match($booking->pilihan_kamar) {
                    'standard' => 500000,
                    'deluxe'   => 850000,
                    'suite'    => 1500000,
                    default    => 0
                };
                $tarifDasar = $hargaPerMalam * $lamaMenginap;
                $totalTransfer = $tarifDasar + ($booking->kode_unik ?? 0);
            @endphp

            @if($booking->status_bayar == 'Pending')
                <tr class="border-top">
                    <td class="fw-bold pt-2 px-0">Harga Dasar</td>
                    <td class="text-end fw-semibold pt-2 px-0">IDR {{ number_format($tarifDasar, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="text-muted px-0">Kode Unik</td>
                    <td class="text-end fw-bold px-0 text-danger">+{{ $booking->kode_unik ?? 0 }}</td>
                </tr>
            @else
                <tr class="border-top">
                    <td class="fw-bold pt-2 px-0">Total Dibayar</td>
                    <td class="text-end fw-bold pt-2 px-0 text-primary">
                        IDR {{ number_format($booking->metode_bayar == 'Transfer' ? $totalTransfer : $tarifDasar, 0, ',', '.') }}
                    </td>
                </tr>
            @endif
        </table>
    </div>

    @if($booking->status_bayar == 'Pending')
        <form action="{{ route('booking.konfirmasi', $booking->id) }}" method="POST">
            @csrf
            <div class="card payment-card">
                <h5 class="fw-bold mb-3"><i class="bi bi-wallet2 text-primary me-2"></i>Pilih Metode</h5>
                
                <div class="mb-2">
                    <input type="radio" name="metode_bayar" value="Cash" id="methodCash" class="btn-check" checked onclick="togglePaymentDetail('Cash')">
                    <label class="btn btn-outline-secondary w-100 text-start" for="methodCash">Cash / Tunai</label>
                </div>
                <div class="mb-3">
                    <input type="radio" name="metode_bayar" value="Transfer" id="methodTransfer" class="btn-check" onclick="togglePaymentDetail('Transfer')">
                    <label class="btn btn-outline-secondary w-100 text-start" for="methodTransfer">Transfer Bank</label>
                </div>

                <div id="transferDetailPanel" class="bg-light p-2 rounded mb-3 d-none border text-center">
                    <small class="d-block text-muted">BCA: <strong>8045-2211-99</strong></small>
                    <b class="text-primary">IDR {{ number_format($totalTransfer, 0, ',', '.') }}</b>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold shadow-sm">KONFIRMASI PEMBAYARAN</button>
            </div>
        </form>
   @else
        <div class="card payment-card text-center border-0 shadow-sm" style="border-top: 6px solid #1e293b; border-radius: 20px;">
            <div class="p-4">
                <h2 class="hotel-brand mb-1" style="font-family: 'Playfair Display', serif;">NIRWANA HOTEL</h2>
                <p class="text-muted small">Kuitansi Resmi Pembayaran</p>
                
                <div class="divider my-3" style="border-top: 1px dashed #cbd5e1;"></div>

                <div class="text-start small mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Tamu</span>
                        <span class="fw-bold">{{ $booking->nama_tamu }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Kamar</span>
                        <span class="fw-bold text-capitalize">{{ $booking->pilihan_kamar }} Room</span>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">No. Kamar</span>
                        <span class="fw-bold text-primary">{{ $booking->nomor_kamar }}</span>
                    </div>
                </div>

                <div class="bg-light p-3 rounded-3 mb-3">
                    <small class="text-muted d-block mb-1">TOTAL DIBAYARKAN</small>
                    <h4 class="fw-bold text-dark mb-0">IDR {{ number_format($booking->metode_bayar == 'Transfer' ? $totalTransfer : $tarifDasar, 0, ',', '.') }}</h4>
                </div>

                <div class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill mb-3">
                    <i class="bi bi-patch-check-fill me-1"></i> STATUS: LUNAS
                </div>

                <p class="text-muted" style="font-size: 0.7rem;">
                    *Tunjukkan bukti ini kepada resepsionis saat check-in.
                </p>
            </div>
        </div>

        <a href="{{ url('/') }}" class="btn btn-outline-secondary w-100 mt-3 py-2 fw-semibold rounded-3">
            <i class="bi bi-house-door-fill me-1"></i> Kembali ke Beranda
        </a>
    @endif
</div>

<script>
    function togglePaymentDetail(method) {
        document.getElementById('transferDetailPanel').classList.toggle('d-none', method !== 'Transfer');
    }
</script>

</body>
</html>