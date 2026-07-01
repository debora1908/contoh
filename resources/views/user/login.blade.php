<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login User</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{

height:100vh;

display:flex;

justify-content:center;

align-items:center;

background:linear-gradient(135deg,#0ea5e9,#2563eb);

font-family:'Segoe UI';

}

.card{

width:420px;

border-radius:20px;

border:none;

box-shadow:0 20px 40px rgba(0,0,0,.2);

}

.btn-login{

background:#2563eb;

color:white;

}

.btn-login:hover{

background:#1d4ed8;

color:white;

}

</style>

</head>

<body>

<div class="card">

<div class="card-body p-5">

<div class="text-center mb-4">

<i class="bi bi-person-circle display-2 text-primary"></i>

<h3 class="fw-bold mt-3">

Login User

</h3>

<p class="text-muted">

Silakan login untuk melakukan reservasi hotel.

</p>

</div>

@if($errors->any())

<div class="alert alert-danger">

{{ $errors->first() }}

</div>

@endif

<form method="POST" action="{{ route('user.login.proses') }}">

@csrf

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<button class="btn btn-login w-100">

<i class="bi bi-box-arrow-in-right"></i>

Login

</button>
<div class="text-center mt-3">
    Belum punya akun?
    <a href="{{ route('user.register') }}">
        Daftar Sekarang
    </a>
</div>

<div class="text-center mt-2">
    <a href="#">
        Lupa Password?
    </a>
</div>

</form>

</div>

</div>

</body>

</html>