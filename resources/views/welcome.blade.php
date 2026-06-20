<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Five Star Horizon Hotel - Stay In The Depth</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1a1e21;
            color: #ffffff;
        }
        /* Navbar Styling */
        .navbar {
            background-color: #2a3135 !important;
            padding: 20px 0;
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            letter-spacing: 2px;
            color: #fff !important;
            font-size: 24px;
        }
        .nav-link {
            color: #b5bec5 !important;
            font-size: 14px;
            font-weight: 400;
            margin: 0 10px;
            transition: 0.3s;
        }
        .nav-link:hover {
            color: #dcb373 !important;
        }
        .btn-reservation {
            background-color: #dcb373;
            color: #1a1e21 !important;
            font-weight: 600;
            border-radius: 5px;
            padding: 8px 20px;
            font-size: 14px;
        }
        .btn-reservation:hover {
            background-color: #c9a162;
        }
        /* Hero Section Styling */
        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1920&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            height: 85vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }
        .hero-subtitle {
            font-size: 12px;
            letter-spacing: 4px;
            color: #dcb373;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 52px;
            font-weight: 400;
            letter-spacing: 3px;
            line-height: 1.2;
            margin-bottom: 30px;
        }
        .btn-rooms {
            background-color: #ffffff;
            color: #1a1e21;
            font-weight: 500;
            padding: 12px 35px;
            border-radius: 30px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }
        .btn-rooms:hover {
            background-color: #dcb373;
            color: #ffffff;
        }
        /* Floating Left Badge */
        .floating-badge {
            position: absolute;
            left: 0;
            top: 40%;
            background-color: rgba(42, 49, 53, 0.8);
            padding: 20px 10px;
            writing-mode: vertical-rl;
            text-orientation: mixed;
            transform: rotate(180deg);
            letter-spacing: 2px;
            font-size: 14px;
            border-left: 3px solid #dcb373;
        }
    </style>
</head>
<body>

    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-buildings-fill text-warning"></i> Five Star Horizon Hotel 💫
            </a>
            <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">History</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Rooms & Suites</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Photos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sustainability</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
            </div>
            <!-- Tombol yang mengarah ke Halaman Pemesanan / Manajemen Kamar -->
            <a href="{{ route('kamar.index') }}" class="btn btn-reservation">Reservation</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <!-- Floating Left Badge Text -->
        <div class="floating-badge text-muted">
            <i class="bi bi-telephone"></i> RESERVATION
        </div>

        <div class="container">
            <p class="hero-subtitle">The Ultimate Luxury Experience</p>
            <h1 class="hero-title">ENJOY THE BEST<br>MOMENTS OF LIFE</h1>
            <a href="{{ route('kamar.index') }}" class="btn-rooms shadow">Rooms & Suites</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>