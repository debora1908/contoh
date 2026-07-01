<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami | Nirwana Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Plus+Jakarta+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fcfcfc; color: #2D3748; }
        
        /* Header Styling */
        .hero-about { padding: 80px 0; background: linear-gradient(135deg, #0E7490, #155e75); color: white; border-radius: 0 0 50px 50px; }
        .section-title { font-family: 'Playfair Display', serif; color: #0E7490; font-size: 2.5rem; }
        
        /* Card Styling */
        .luxury-card { 
            background: #ffffff; 
            border: none; 
            border-radius: 20px; 
            padding: 40px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.06);
            height: 100%;
        }
        
        /* Footer Styling */
        .footer-section { background: #0F172A; color: #94a3b8; padding: 60px 0; margin-top: 80px; }
        .contact-item { margin-bottom: 15px; }
        .contact-item i { color: #22d3ee; margin-right: 15px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/" style="font-family: 'Playfair Display', serif; color: #0E7490;"><i class="bi bi-water"></i> Five Star Horizon Hotel</a>
            
            <!-- Menu Tengah yang Tetap Aktif -->
            <div class="mx-auto">
                <ul class="navbar-nav d-flex flex-row gap-4">
                  <li class="nav-item"><a class="nav-link fw-bold" href="/" style="color: #0E7490; border-bottom: 2px solid #0E7490;">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary fw-medium" href="{{ route('about_us.index') }}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary fw-medium" href="{{ route('villas.index') }}">Villas</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary fw-medium" href="{{ route('beachclub.index') }}">Beach Club</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary fw-medium" href="{{ route('wellness.index') }}">Wellness</a></li>  </ul>
            </div>

            <div>
                <a href="/reservasi" class="btn btn-sm btn-dark px-3 rounded-pill">Book A Stay</a>
            </div>
        </div>
    </nav>

    <div class="hero-about text-center">
        <div class="container">
            <h1 class="display-3 fw-bold text-white">Tentang Nirwana Hotel</h1>
            <p class="lead">Menciptakan momen tak terlupakan di jantung surga tropis Bali.</p>
        </div>
    </div>

    <div class="container my-5">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="luxury-card">
                    <h2 class="section-title mb-3">Filosofi Kami</h2>
                    <p>Di Nirwana Hotel, kami percaya bahwa perjalanan bukan sekadar destinasi, melainkan sebuah pengalaman yang menyentuh jiwa. Kami memadukan arsitektur modern yang mewah dengan keindahan alam tropis yang harmonis.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="luxury-card">
                    <h2 class="section-title mb-3">Komitmen Pelayanan</h2>
                    <p>Pelayanan bagi kami adalah seni. Staf profesional kami siap melayani sepenuh hati, memastikan setiap detail kenyamanan Anda terpenuhi—mulai dari kualitas tidur terbaik hingga pengalaman kuliner autentik.</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h4 class="text-white mb-3">Nirwana Hotel</h4>
                    <p>Pelarian sempurna bagi mereka yang mencari ketenangan dan privasi yang terjaga di Bali.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h4 class="text-white mb-3">Hubungi Kami</h4>
                    <div class="contact-item"><i class="bi bi-geo-alt"></i> Jl. Pantai Tropis No. 88, Bali</div>
                    <div class="contact-item"><i class="bi bi-telephone"></i> +62 361 999 888</div>
                    <div class="contact-item"><i class="bi bi-envelope"></i> info@nirwanahotel.com</div>
                </div>
                <div class="col-md-4">
                    <h4 class="text-white mb-3">Ikuti Sosial Media</h4>
                    <a href="#" class="text-light me-3"><i class="bi bi-instagram fs-4"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-facebook fs-4"></i></a>
                    <a href="#" class="text-light"><i class="bi bi-twitter fs-4"></i></a>
                </div>
            </div>
            <div class="text-center mt-4 border-top border-secondary pt-4">
                &copy; 2026 Nirwana Hotel Management System. All Rights Reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>