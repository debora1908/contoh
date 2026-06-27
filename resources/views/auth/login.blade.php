<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal - Five Star Horizon Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f4f7f9 0%, #e2e8f0 100%);
            color: #2D3748;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: #0E7490;
        }
        .card-login {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 10px 30px rgba(14, 116, 144, 0.08);
        }
        .form-control {
            background-color: #f8fafc;
            border: 1px solid #cbd5e1;
            color: #334155;
            border-radius: 8px;
            padding: 12px;
        }
        .form-control:focus {
            background-color: #ffffff;
            border-color: #0E7490;
            box-shadow: 0 0 0 0.25rem rgba(14, 116, 144, 0.15);
        }
        .btn-hotel {
            background-color: #0E7490;
            color: white;
            font-weight: 600;
            border: none;
            padding: 13px;
            border-radius: 8px;
            transition: 0.3s;
        }
        .btn-hotel:hover {
            background-color: #0F766E;
            color: white;
        }
        .back-link {
            color: #64748b;
            text-decoration: none;
            font-size: 0.9rem;
            transition: 0.2s;
        }
        .back-link:hover {
            color: #0E7490;
        }
    </style>
</head>
<body>

    <div class="card-login bg-white shadow">
        <div class="text-center mb-4">
            <h2 class="login-title mb-1"><i class="bi bi-water"></i> Horizon Hotel</h2>
            <p class="text-muted small">Internal Staff & Admin Authorization Portal</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger border-0 bg-light text-danger shadow-sm small mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.proses') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold small text-secondary">EMAIL ADMINISTRATOR</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" class="form-control border-start-0" placeholder="admin@hotel.com" required autofocus>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold small text-secondary">SECURE PASSWORD</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control border-start-0" placeholder="••••••••" required>
                </div>
            </div>

            <div class="mb-3 form-check d-flex justify-content-between align-items-center">
                <div>
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label small text-muted" for="remember">Ingat Saya</label>
                </div>
            </div>

            <button type="submit" class="btn btn-hotel w-100 mb-3 shadow-sm">MASUK KE DASHBOARD</button>
            
            <div class="text-center">
                <a href="{{ route('reservasi.index') }}" class="back-link"><i class="bi bi-arrow-left"></i> Kembali ke Halaman Reservasi</a>
            </div>
        </form>
    </div>

</body>
</html>