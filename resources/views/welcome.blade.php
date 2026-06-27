<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Five Star Horizon Hotel - Bali Theme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Plus+Jakarta+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f7f9fa; /* Warna dasar cerah & bersih */
            color: #2A363E; /* Abu-abu kebiruan gelap */
        }
        .navbar {
            background-color: #ffffff !important;
            padding: 20px 0;
            border-bottom: 1px solid #e3e9ed;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            letter-spacing: 2px;
            color: #0E7490 !important; /* Warna Teal Biru Laut Premium */
        }
        .nav-link {
            color: #4A5568 !important;
            font-size: 14px;
            font-weight: 500;
            margin: 0 12px;
            transition: 0.3s;
        }
        .nav-link:hover {
            color: #0E7490 !important;
        }
        .btn-bali {
            background-color: #0E7490; /* Aksen Biru Kolam Resort */
            color: #ffffff !important;
            font-weight: 600;
            border-radius: 50px; /* Melengkung halus elegan */
            padding: 10px 28px;
            font-size: 14px;
            border: none;
            transition: 0.3s;
        }
        .btn-bali:hover {
            background-color: #065F46; /* Hijau toska tua saat hover */
        }
        .hero-section {
            /* Menggunakan gambar resort bintang 5 dengan kolam renang menghadap pantai */
            background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.35)), url('https://images.unsplash.com/photo-1540555700478-4be289fbecef?q=80&w=1920&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            height: 85vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero-subtitle {
            font-size: 12px;
            letter-spacing: 4px;
            color: #E0F2FE;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 15px;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.3);
        }
        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 62px;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.2;
            margin-bottom: 35px;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.4);
        }
        .btn-explore {
            background-color: #ffffff;
            color: #0E7490;
            font-weight: 600;
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .btn-explore:hover {
            background-color: #0E7490;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-water"></i>Five Star Horizon Hotel</a>
            <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('villas.index') }}">Villas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('beachclub.index') }}">Beach Club</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Wellness</a></li>
                </ul>
            </div>
            <a href="{{ route('reservasi.index') }}" class="btn btn-bali shadow-sm">Book A Stay</a>
        </div>
    </nav>

    <div class="hero-section">
        <div class="container">
            <p class="hero-subtitle">5-Star Luxury Beachfront Sanctuary</p>
            <h1 class="hero-title">Experience Paradise<br>In Tropical Bali</h1>
            <a href="{{ route('reservasi.index') }}" class="btn-explore">Discover Our Suites</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>