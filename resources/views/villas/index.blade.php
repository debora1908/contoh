<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Luxury Villas - Five Star Horizon Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f7f9;
            color: #2D3748;
        }
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 15px 0;
        }
        .navbar-brand, .section-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }
        .navbar-brand { color: #0E7490; }
        .section-title { color: #0F766E; }
        
        .villa-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .villa-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(14, 116, 144, 0.08);
        }
        .villa-img-wrapper {
            position: relative;
            height: 240px;
            background-color: #cbd5e1;
            overflow: hidden;
        }
        .villa-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .villa-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: rgba(14, 116, 144, 0.9);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg shadow-sm mb-5">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="bi bi-water"></i> Five Star Horizon Hotel</a>
            <div>
                <a href="/" class="text-secondary text-decoration-none small me-3"><i class="bi bi-house"></i> Beranda</a>
                <a href="{{ route('reservasi.index') }}" class="btn btn-sm btn-dark">Book A Stay</a>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="text-center mb-5">
            <h1 class="section-title">Our Private Sanctuaries</h1>
            <p class="text-muted">Temukan kemewahan tropis Bali yang sesungguhnya di kamar-kamar eksklusif kami.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="villa-card h-100 shadow-sm">
                    <div class="villa-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=600&q=80" alt="Standard Room" class="villa-img">
                        <span class="villa-badge">IDR 500k / Malam</span>
                    </div>
                    <div class="p-4">
                        <h4 style="font-family: 'Playfair Display', serif;" class="fw-bold text-dark">Standard Room</h4>
                        <p class="text-muted small mb-3">Kamar minimalis bergaya modern dengan pemandangan taman tropis yang menenangkan hati.</p>
                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <span class="small text-secondary"><i class="bi bi-fullscreen"></i> 32 m²</span>
                            <span class="small text-secondary"><i class="bi bi-people"></i> 2 Dewasa</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="villa-card h-100 shadow-sm">
                    <div class="villa-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=600&q=80" alt="Deluxe Room" class="villa-img">
                        <span class="villa-badge">IDR 850k / Malam</span>
                    </div>
                    <div class="p-4">
                        <h4 style="font-family: 'Playfair Display', serif;" class="fw-bold text-dark">Deluxe Room</h4>
                        <p class="text-muted small mb-3">Dilengkapi dengan balkon privat pribadi menghadap ke area kolam renang utama hotel.</p>
                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <span class="small text-secondary"><i class="bi bi-fullscreen"></i> 45 m²</span>
                            <span class="small text-secondary"><i class="bi bi-people"></i> 2 Dewasa</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="villa-card h-100 shadow-sm">
                    <div class="villa-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=600&q=80" alt="Executive Suite" class="villa-img">
                        <span class="villa-badge">IDR 1.5M / Malam</span>
                    </div>
                    <div class="p-4">
                        <h4 style="font-family: 'Playfair Display', serif;" class="fw-bold text-dark">Executive Suite</h4>
                        <p class="text-muted small mb-3">Kemewahan tertinggi dengan ruang tamu terpisah, bathtub pribadi, dan pemandangan laut lepas.</p>
                        <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <span class="small text-secondary"><i class="bi bi-fullscreen"></i> 80 m²</span>
                            <span class="small text-secondary"><i class="bi bi-people"></i> 3 Dewasa</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('reservasi.index') }}" class="btn btn-dark px-4 py-2 shadow-sm">Tertarik Menginap? Pesan Sekarang</a>
        </div>
    </div>

</body>
</html>