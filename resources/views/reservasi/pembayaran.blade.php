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
        .payment-card { background: #ffffff; border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .hotel-brand { font-family: 'Playfair Display', serif; font-weight: 700; color: #0f172a; }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4 text-center py-3">
                    <i class="bi bi-check-circle-fill fs-4 d-block mb-1 text-success"></i>
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif

            <div class="text-center mb-4">
                <h2 class="hotel-brand">Five Star Horizon Hotel</h2>
                <p class="text-muted small">Invois Reservasi Kamar #{{ $booking->id }}</p>
            </div>

            <div class="card payment-card p-4 mb-4">
                <h5 class="fw-bold mb-3"><i class="bi bi-receipt-cutoff text-primary me-2"></i>Ringkasan Reservasi</h5>
                
                <table class="table table-borderless small mb-0">
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
                    <tr class="border-top">
    <td class="fw-bold pt-3 px-0 fs-5">Total Bayar</td>
    <td class="text-end fw-bold pt-3 px-0 fs-5 text-primary">
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

                // Tarif dasar dikalikan berapa malam dia menginap
                $tarifDasar = $hargaPerMalam * $lamaMenginap;
                
                // 🟢 UBAH DI SINI: Kode unik ditambahkan langsung di akhir total biaya transfer, 
                // tidak terpengaruh berapa malam pun tamu menginap.
                $totalTransfer = $tarifDasar + ($booking->kode_unik ?? 0);
            @endphp

       <div class="card payment-card p-4 mb-4">
                <h5 class="fw-bold mb-3"><i class="bi bi-receipt-cutoff text-primary me-2"></i>Ringkasan Reservasi</h5>
                
                <table class="table table-borderless small mb-0">
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
                        <td class="text-end fw-semibold px-0">{{ $checkIn->format('d M') }} - {{ $checkOut->format('d M Y') }} ({{ $lamaMenginap }} Malam)</td>
                    </tr>
                    
                    @if($booking->status_bayar == 'Pending')
                        <tr class="border-top">
                            <td class="fw-bold pt-3 px-0 fs-6">Harga Dasar Kamar</td>
                            <td class="text-end fw-semibold pt-3 px-0 fs-6">IDR {{ number_format($tarifDasar, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted px-0">Kode Unik Sistem (Khusus Transfer)</td>
                            <td class="text-end fw-bold px-0 text-danger">+{{ $booking->kode_unik ?? 0 }}</td>
                        </tr>
                    @else
                        <tr class="border-top">
                            <td class="fw-bold pt-3 px-0 fs-5">Total Dibayar</td>
                            <td class="text-end fw-bold pt-3 px-0 fs-5 text-primary">
                                IDR {{ number_format($booking->metode_bayar == 'Transfer' ? $totalTransfer : $tarifDasar, 0, ',', '.') }}
                                <small class="text-muted d-block fw-normal" style="font-size: 0.75rem;">Metode: {{ $booking->metode_bayar }}</small>
                            </td>
                        </tr>
                    @endif
                </table>
            </div>

            @if($booking->status_bayar == 'Pending')
                
                <form action="{{ route('booking.konfirmasi', $booking->id) }}" method="POST">
                    @csrf
                    <div class="card payment-card p-4">
                        <h5 class="fw-bold mb-3"><i class="bi bi-wallet2 text-primary me-2"></i>Pilih Metode Pembayaran</h5>
                        
                        <div class="mb-3">
                            <label class="w-100">
                                <input type="radio" name="metode_bayar" value="Cash" class="card-input-element d-none" checked onclick="togglePaymentDetail('Cash')">
                                <div class="method-box d-flex align-items-center justify-content-between">
                                    <div>
                                        <strong class="d-block"><i class="bi bi-cash-coin text-success me-2"></i>Bayar Cash / Tunai</strong>
                                        <small class="text-muted">Bayar langsung di resepsionis saat check-in</small>
                                    </div>
                                    <div class="fw-bold text-dark">IDR {{ number_format($tarifDasar, 0, ',', '.') }}</div>
                                </div>
                            </label>
                        </div>

                        <div class="mb-4">
                            <label class="w-100">
                                <input type="radio" name="metode_bayar" value="Transfer" class="card-input-element d-none" onclick="togglePaymentDetail('Transfer')">
                                <div class="method-box d-flex align-items-center justify-content-between">
                                    <div>
                                        <strong class="d-block"><i class="bi bi-bank text-primary me-2"></i>Transfer Bank</strong>
                                        <small class="text-muted">Wajib transfer pas hingga 3 digit terakhir</small>
                                    </div>
                                    <div class="fw-bold text-primary">IDR {{ number_format($totalTransfer, 0, ',', '.') }}</div>
                                </div>
                            </label>
                        </div>

                        <div id="transferDetailPanel" class="bg-light p-3 rounded-3 mb-4 d-none">
                            <span class="text-uppercase fw-bold text-muted small d-block">Bank BCA (Horizon Hotel)</span>
                            <div class="d-flex align-items-center justify-content-between">
                                <strong class="fs-5 text-dark">8045-2211-99</strong>
                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="navigator.clipboard.writeText('8045221199')">Salin Rek</button>
                            </div>
                            <small class="text-danger d-block mt-2 fw-semibold">
                                *Harap transfer tepat sebesar: IDR {{ number_format($totalTransfer, 0, ',', '.') }}
                            </small>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-3 shadow">
                            Konfirmasi Pembayaran
                        </button>
                    </div>
                </form>

            @else
                
                <div class="card payment-card p-4 text-center border border-success bg-success bg-opacity-5">
                    <div class="mb-3">
                        <span class="badge bg-success fs-6 px-4 py-2 rounded-pill">
                            <i class="bi bi-patch-check-fill me-2"></i>KUITANSI RESMI (LUNAS)
                        </span>
                    </div>
                    
                    <div class="p-3 bg-white rounded-3 shadow-sm border mb-4">
                        <span class="text-muted small d-block mb-1">Nomor Kamar Anda:</span>
                        <h2 class="fw-bold text-primary mb-1">{{ $booking->nomor_kamar }}</h2>
                        <small class="text-muted d-block" style="font-size: 0.75rem;">
                            *Tunjukkan nomor kamar ini beserta KTP saat check-in di Front Office.
                        </small>
                    </div>

                    <p class="text-muted small mb-4">
                        Metode: <strong>{{ $booking->metode_bayar }}</strong> | Waktu: {{ \Carbon\Carbon::parse($booking->updated_at)->format('d M Y H:i') }} WIB
                    </p>

                    <hr class="text-muted opacity-25">
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary w-100 py-2.5 fw-semibold rounded-3 mt-2">
                        <i class="bi bi-arrow-left-short fs-5 align-middle me-1"></i> Kembali ke Beranda / Keluar
                    </a>
                </div>

            @endif

        </div>
    </div>
</div>

<script>
    function togglePaymentDetail(method) {
        const panel = document.getElementById('transferDetailPanel');
        if (method === 'Transfer') {
            panel.classList.remove('d-none');
        } else {
            panel.classList.add('d-none');
        }
    }
</script>

</body>
</html>