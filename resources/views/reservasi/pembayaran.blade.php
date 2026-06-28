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
                            @if($booking->pilihan_kamar == 'standard') IDR 500.000
                            @elseif($booking->pilihan_kamar == 'deluxe') IDR 850.000
                            @else IDR 1.500.000
                            @endif
                        </td>
                    </tr>
                </table>
            </div>

            <div class="card payment-card p-4">
                <h5 class="fw-bold mb-3"><i class="bi bi-wallet2 text-primary me-2"></i>Metode Pembayaran</h5>
                <p class="text-muted small">Silakan lakukan transfer manual ke rekening resmi hotel di bawah ini:</p>
                
                <div class="bg-light p-3 rounded-3 mb-4 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase fw-bold text-muted small d-block">Bank BCA (Horizon Hotel)</span>
                        <strong class="fs-5 text-dark">8045-2211-99</strong>
                    </div>
                    <button class="btn btn-sm btn-outline-secondary" onclick="navigator.clipboard.writeText('8045221199')">Salin</button>
                </div>

                <form action="{{ route('booking.konfirmasi', $booking->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-3 shadow">
                        <i class="bi bi-check-circle me-2"></i>Saya Sudah Transfer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>