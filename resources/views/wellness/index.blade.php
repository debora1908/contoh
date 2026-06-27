<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellness & Spa Sanctuary - Five Star Horizon Hotel</title>
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
        
        .wellness-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .wellness-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(15, 118, 110, 0.08);
        }
        .wellness-img-wrapper {
            position: relative;
            height: 250px;
            overflow: hidden;
            background-color: #cbd5e1;
        }
        .wellness-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .wellness-card:hover .wellness-img {
            transform: scale(1.05);
        }
        .wellness-badge {
            position: absolute;
            top: 15px;
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
            <h1 class="section-title">Holistic Wellness Sanctuary</h1>
            <p class="text-muted">Seimbangkan jiwa, raga, dan pikiran Anda dengan 6 ritual perawatan serta pemandangan penyejuk jiwa.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="wellness-card h-100 shadow-sm">
                    <div class="wellness-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&w=600&q=80" alt="Traditional Balinese Spa" class="wellness-img">
                        <span class="wellness-badge">Healing Therapy</span>
                    </div>
                    <div class="p-4">
                        <h5 style="font-family: 'Playfair Display', serif;" class="fw-bold text-dark">Traditional Balinese Spa</h5>
                        <p class="text-muted small mb-0">Manjakan tubuh Anda dengan pijatan tradisional menggunakan minyak aromaterapi alami berlatar suara gemercik air tropis.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="wellness-card h-100 shadow-sm">
                    <div class="wellness-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&w=600&q=80" alt="Ocean Yoga" class="wellness-img">
                        <span class="wellness-badge">Mindfulness</span>
                    </div>
                    <div class="p-4">
                        <h5 style="font-family: 'Playfair Display', serif;" class="fw-bold text-dark">Oceanfront Yoga & Meditation</h5>
                        <p class="text-muted small mb-0">Temukan kedamaian batin lewat kelas meditasi dan yoga harian di bawah paviliun kayu terbuka menghadap laut lepas.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="wellness-card h-100 shadow-sm">
                    <div class="wellness-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&w=600&q=80" alt="Gym" class="wellness-img">
                        <span class="wellness-badge">Fitness Center</span>
                    </div>
                    <div class="p-4">
                        <h5 style="font-family: 'Playfair Display', serif;" class="fw-bold text-dark">State-of-the-Art Gym</h5>
                        <p class="text-muted small mb-0">Tetap aktif selama liburan dengan pusat kebugaran 24 jam kami yang dilengkapi alat kardio dan angkat beban standar internasional.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="wellness-card h-100 shadow-sm">
                    <div class="wellness-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&w=600&q=80" alt="Luxury Jacuzzi" class="wellness-img">
                        <span class="wellness-badge">Hydrotherapy</span>
                    </div>
                    <div class="p-4">
                        <h5 style="font-family: 'Playfair Display', serif;" class="fw-bold text-dark">Thermal Jacuzzi Oase</h5>
                        <p class="text-muted small mb-0">Lepaskan ketegangan otot tubuh Anda di dalam kolam rendam air hangat bertabur kelopak bunga mawar segar.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="wellness-card h-100 shadow-sm">
                    <div class="wellness-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1519699047748-de8e457a634e?auto=format&fit=crop&w=600&q=80" alt="Reflexology" class="wellness-img">
                        <span class="wellness-badge">Relaxation</span>
                    </div>
                    <div class="p-4">
                        <h5 style="font-family: 'Playfair Display', serif;" class="fw-bold text-dark">Herbal Reflexology Sanctuary</h5>
                        <p class="text-muted small mb-0">Nikmati pijat refleksi kaki mendalam dikombinasikan dengan ramuan rempah hangat tradisional khas Bali.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="wellness-card h-100 shadow-sm">
                    <div class="wellness-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&fit=crop&w=600&q=80" alt="Sound Healing" class="wellness-img">
                        <span class="wellness-badge">Spiritual Sound</span>
                    </div>
                    <div class="p-4">
                        <h5 style="font-family: 'Playfair Display', serif;" class="fw-bold text-dark">Sound Healing Lounge</h5>
                        <p class="text-muted small mb-0">Terapi getaran suara menggunakan *Tibetan singing bowls* untuk menenangkan gelombang otak dan memulihkan stamina mental.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('reservasi.index') }}" class="btn btn-dark px-4 py-2 shadow-sm">Kembali ke Pemesanan Kamar</a>
        </div>
    </div>

</body>
</html>