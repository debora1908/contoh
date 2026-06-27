<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Horizon Beach Club - Five Star Horizon Hotel</title>
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
        
        .gallery-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(14, 116, 144, 0.08);
        }
        .gallery-img-wrapper {
            position: relative;
            height: 260px;
            overflow: hidden;
            background-color: #cbd5e1;
        }
        .gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .gallery-card:hover .gallery-img {
            transform: scale(1.05);
        }
        .view-tag {
            position: absolute;
            bottom: 15px;
            left: 15px;
            background-color: rgba(255, 255, 255, 0.9);
            color: #0F766E;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

    <!-- NAVIGASI UTAMA KONSISTEN -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/" style="font-family: 'Playfair Display', serif; color: #0E7490;"><i class="bi bi-water"></i> Five Star Horizon Hotel</a>
            
            <!-- Menu Tengah yang Tetap Aktif -->
            <div class="mx-auto">
                <ul class="navbar-nav d-flex flex-row gap-4">
                    <li class="nav-item"><a class="nav-link text-secondary fw-medium" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary fw-medium" href="{{ route('villas.index') }}">Villas</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('beachclub.index') }}" style="color: #0E7490; border-bottom: 2px solid #0E7490;">Beach Club</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary fw-medium" href="{{ route('wellness.index') }}">Wellness</a></li>
                </ul>
            </div>

            <div>
                <a href="/reservasi" class="btn btn-sm btn-dark px-3 rounded-pill">Book A Stay</a>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="text-center mb-5">
            <h1 class="section-title">The Horizon Beach Club</h1>
            <p class="text-muted">Rasakan suasana tepi laut terbaik di Bali dengan pemandangan matahari terbenam yang memukau.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="gallery-card h-100 shadow-sm">
                    <div class="gallery-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?auto=format&fit=crop&w=600&q=80" alt="Infinity Pool View" class="gallery-img">
                        <span class="view-tag">Oceanfront Pool</span>
                    </div>
                    <div class="p-4">
                        <h5 style="font-family: 'Playfair Display', serif;" class="fw-bold text-dark">Infinity Pool View</h5>
                        <p class="text-muted small mb-0">Kolam renang tanpa batas yang menyatu langsung dengan cakrawala laut biru Samudra Hindia.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="gallery-card h-100 shadow-sm">
                    <div class="gallery-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=600&q=80" alt="Sunset Daybeds" class="gallery-img">
                        <span class="view-tag">Lounging Area</span>
                    </div>
                    <div class="p-4">
                        <h5 style="font-family: 'Playfair Display', serif;" class="fw-bold text-dark">Premium Sunset Daybeds</h5>
                        <p class="text-muted small mb-0">Tempat bersantai eksklusif di atas pasir putih, area terbaik untuk menikmati golden hour Bali.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="gallery-card h-100 shadow-sm">
                    <div class="gallery-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1543007630-9710e4a00a20?auto=format&fit=crop&w=600&q=80" alt="Beachfront Bar" class="gallery-img">
                        <span class="view-tag">Dining & Drinks</span>
                    </div>
                    <div class="p-4">
                        <h5 style="font-family: 'Playfair Display', serif;" class="fw-bold text-dark">Sunken Cocktail Bar</h5>
                        <p class="text-muted small mb-0">Nikmati racikan minuman koktail segar dan hidangan laut lokal langsung dari tepi kolam.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="gallery-card h-100 shadow-sm">
                    <div class="gallery-img-wrapper" style="height: 320px;">
                        <img src="https://images.unsplash.com/photo-1519046904884-53103b34b206?auto=format&fit=crop&w=1000&q=80" alt="Private Beach" class="gallery-img">
                        <span class="view-tag">Private Sanctuary</span>
                    </div>
                    <div class="p-4">
                        <h5 style="font-family: 'Playfair Display', serif;" class="fw-bold text-dark">Prístine White Sand Beach</h5>
                        <p class="text-muted small mb-0">Akses langsung ke area pantai privat yang bersih dan tenang, jauh dari keramaian umum untuk kenyamanan maksimal Anda.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-10 col-lg-6">
                <div class="gallery-card h-100 shadow-sm">
                    <div class="gallery-img-wrapper" style="height: 320px;">
                        <img src="https://images.unsplash.com/photo-1533105079780-92b9be482077?auto=format&fit=crop&w=1000&q=80" alt="Night Event" class="gallery-img">
                        <span class="view-tag">Evening Vibe</span>
                    </div>
                    <div class="p-4">
                        <h5 style="font-family: 'Playfair Display', serif;" class="fw-bold text-dark">Twilight Lounge & Music</h5>
                        <p class="text-muted small mb-0">Suasana malam yang hidup dengan iringan musik santai akustik dan pencahayaan obor tropis yang romantis.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('reservasi.index') }}" class="btn btn-dark px-4 py-2 shadow-sm">Pesan Kamar & Kunjungi Kami</a>
        </div>
    </div>

</body>
</html>